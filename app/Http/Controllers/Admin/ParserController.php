<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Response;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class ParserController extends Controller
{
    public function index()
    {
        $urls = ['http://rss.cnn.com/rss/edition.rss'];
        $links = [
            ['url' => 'http://rss.cnn.com/rss/edition.rss', 'source'=>'cnn'],
            ['url' => 'http://rss.cnn.com/rss/edition_world.rss', 'source'=>'cnn'],
            ['url' => 'http://rss.cnn.com/rss/edition_africa.rss', 'source'=>'cnn'],
            ['url' => 'http://rss.cnn.com/rss/edition_americas.rss', 'source'=>'cnn'],
            ['url' => 'http://feeds.bbci.co.uk/news/world/rss.xml', 'source'=>'bbc'],
            ['url' => 'http://www.cbn.com/cbnnews/world/feed/', 'source'=>'cbn'],
            ['url' => 'http://feeds.reuters.com/Reuters/worldNews', 'source'=>'reuters'],
            ['url' => 'https://www.nasa.gov/rss/dyn/breaking_news.rss', 'source'=>'nasa'],

        ];

        $newsAddedCounter = 0;
        $sources = $this->loadNewsSource($links);
        foreach ($sources as $channel){
//            dump('index - channel', $channel);
            $newsAddedCounter += $this->storeParsedNews($channel);
//            dump('index - counter', $newsAddedCounter);
        }
//        dd('index - end');
        if($newsAddedCounter){
            return redirect()->route('admin.news.index')->with('success', "Successfully parsed $newsAddedCounter news.");
        }
        return redirect()->route('admin.news.index')->with('success', "There is no new news parsed.");
    }

    public function loadNewsSource($links)
    {
        $data = [];
        foreach ($links as $link) {
            $xml = XmlParser::load($link['url']);
            $data[] = $this->parseNewsDefault($xml, $link['source']);
            }
        return $data;
    }

    public function parseNewsDefault($xml, $source)
    {
        return $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,description,category,thumbnail,enclosure::url,link,guid,pubDate]'],
            'source' => $source,
        ]);
    }

    /**
     * @param $channel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeParsedNews($channel)
    {
        $image = $channel['image']; //Картинка по умолчанию, берется с канала
        $categoryDefaultSlug = $channel['source']; //Категория по умолчанию берется с имени источника
        $newsAddedCounter = 0; //Счетчик добавленных новостей

        foreach ($channel['news'] as $item) {

            // Проверяме если новость уже существует в базе данных
            $newsExist = News::query()->where('title', $item['title'])->first();
            // Если да, то следующая
            if ($newsExist) {
                continue;
            } else {
                // Если нет, то создаем новость
                $news = new News();
//                dump($item, $news);
            }
            $timestamp = $item['pubDate'];
//            dump($timestamp);
//            dd(\DateTime::createFromFormat('D, d M Y H:i:s e', $timestamp));
            // Преобразование и добавление даты публикации
            if (is_null($timestamp)) {
                $item['pubDate'] = now()
                    ->format('Y-m-d H:i:s');
            } elseif ($timestamp = \DateTime::createFromFormat('D, d M Y H:i:s e', $timestamp)){
                $item['pubDate'] = $timestamp
                    ->format('Y-m-d H:i:s');
            } else {
                $item['pubDate'] = now()
                    ->format('Y-m-d H:i:s');
            }

            //Добавление категории
            if(is_null($item['category'])){ // Есил категория пустая

                //Пытамемся олучить категории из url новости для CNN
                if($channel['source'] == 'cnn'){
                    $url = $item['guid'];
                    $parsedUrl = explode('/', parse_url($url)['path']);
//                    dump('storeParsedNew - $url ' . $url, $parsedUrl);
//                    dd('storeParsedNew - $url ' . $url, $parsedUrl);
                    if(count($parsedUrl) >= 5 ) {
                        $year = $parsedUrl[1];
                        if ($year == now()->format('Y') || $year == 2019 ) {
                            $slug = $parsedUrl[4];
                        }
                        $year = $parsedUrl[3];
                        if ($year == now()->format('Y') || $year == 2019) {
                            $slug = $parsedUrl[2];
                        }
                        $word = $parsedUrl[2];
                        if ($word == 'article') {
                            $slug = $parsedUrl[1];
                        }
                    } else {
                        $slug = $categoryDefaultSlug; // Берется категория по умолчанию источника
                    }
                } elseif($channel['source'] == 'cbn'){
                    $url = $item['link'];
                    $parsedUrl = explode('/', parse_url($url, PHP_URL_QUERY));
//                    dump('storeParsedNew - $url ' . $url, $parsedUrl);
//                    dd('storeParsedNew - $url ' . $url, $parsedUrl);
                    if(count($parsedUrl) >= 5 ) {
                        $year = $parsedUrl[5];
                        if ($year == now()->format('Y') || $year == 2019 ) {
                            $slug = $parsedUrl[4];
                        }
                    } else {
                        $slug = $categoryDefaultSlug; // Берется категория по умолчанию источника
                    }
                }
                else {
                    $slug = $categoryDefaultSlug; // Берется категория по умолчанию источника
                }

                $slug = Str::lower($slug); //Преобразуем полученную категорию в маленькие буквы

                if(Str::length($slug) <= 3){ // Если категория меньше чем из 3 букв
                    $name = Str::upper($slug); //Все буквы заглавные
                } else {
                    $name = Str::ucfirst($slug); //Иначе только первая буква заглавная
                }
                // Создаем дынные для категории
                $categoryData = [
                    'name' => $name,
                    'slug' => $slug,
                    ];

                // Пытамеся получить категорию из базы данных
                $categoryExist = Category::query()->where('slug', $slug)->first();

                if (!$categoryExist) { // Если категория не существует, то создаем новую
                    $category = new Category();
                    $category->fill($categoryData)->save();
                } else { // Иначе назначаем имеющуюся категорию
                    $category = $categoryExist;
                }
                // Добавляем код категории к новости
                $item['category_id'] = $category->getKey();
//                dump($categoryData, $category->getKey());
            }

            // Добавляем случайным образом приватность новости
            $item['isPrivate'] = (bool)rand(0,1);

            // Добавляем картинку канала, если нет картинки новости
            if(!is_null($item['enclosure::url'])){
                $item['image'] = $item['enclosure::url'];
            } elseif (!is_null($item['thumbnail'])) {
                $item['image'] = $item['thumbnail'];
            } else {
                $item['image'] = $image; //Если картинки не нашлось, берем по умолчанию
            };

//            dd(\Arr::except($item, ['guid', 'thumbnail', 'enclosure::url', 'category']));
            $news->fill(\Arr::except($item, ['guid', 'thumbnail', 'enclosure::url', 'category']))
                    ->save();
            $newsAddedCounter++;
//            dd($news, $newsAddedCounter);

        }
        return $newsAddedCounter;
    }
}
