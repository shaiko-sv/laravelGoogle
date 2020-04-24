<?php


namespace App\Services;

use App\Category;
use App\News;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class XMLParserService
{
    public function loadNewsSource($link)
    {
        $xml = XmlParser::load($link);
        return $this->parseNews($xml);
    }

    public function parseNews($xml)
    {
        return $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,description,category,thumbnail,enclosure::url,link,guid,pubDate]'],
        ]);
    }

    /**
     * @param $link
     * @return int
     */
    public function storeParsedNews($link)
    {
        $xml = $this->loadNewsSource($link);
        $image = $xml['image']; //Картинка по умолчанию, берется с канала
        $newsAddedCounter = 0; //Счетчик добавленных новостей
        foreach ($xml['news'] as $item) {

            // Проверяме если новость уже существует в базе данных
            $news = News::query()->firstOrNew(['title' => $item['title']]);
            // Если да, то следующая
            if ($news->id) {
                continue;
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

                $slug='';
                $url = $item['guid'];
                $parsedUrl = explode('/', parse_url($url)['path']);
//                    dump('storeParsedNew - $url ' . $url, $parsedUrl);
//                    dd('storeParsedNew - $url ' . $url, $parsedUrl);
                if(count($parsedUrl) >= 6 ) {
                    $year = $parsedUrl[1];
                    if ($year == now()->format('Y') || $year == 2019 ) {
                        $slug = $parsedUrl[4];
                    }
                    $word = $parsedUrl[2];
                    if ($word == 'article') {
                        $slug = $parsedUrl[1];
                    }
                    $year = $parsedUrl[3];
                    if ($year == now()->format('Y') || $year == 2019) {
                        $slug = $parsedUrl[2];
                    }
                    $year = $parsedUrl[5];
                    if ($year == now()->format('Y') || $year == 2019 ) {
                        $slug = $parsedUrl[4];
                    }
                }

                if($slug){
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
                    $category = Category::query()->firstOrNew(['slug' => $slug]);
                    if (!$category->id) { // Если категория не существует, то создаем новую
                        $category->fill($categoryData)->save();
                    }
                    // Добавляем код категории к новости
                    $item['category_id'] = $category->getKey();
                    //                dump($categoryData, $category->getKey());
                }
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
        \Storage::disk('publicLogs')->append('log.txt', date('c') . ' ' . $link . ' ' . $newsAddedCounter);

        dd($newsAddedCounter);
        return $newsAddedCounter;
    }
}

