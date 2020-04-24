<?php

use Illuminate\Database\Seeder;

class ResourcesSeeder extends Seeder
{
    private $rssLinks = [
        'http://rss.cnn.com/rss/edition.rss',
        'http://rss.cnn.com/rss/edition_world.rss',
        'http://rss.cnn.com/rss/edition_africa.rss',
        'http://rss.cnn.com/rss/edition_americas.rss',
        'http://feeds.bbci.co.uk/news/world/rss.xml',
        'http://www.cbn.com/cbnnews/world/feed/',
        'http://feeds.reuters.com/Reuters/worldNews',
        'https://www.nasa.gov/rss/dyn/breaking_news.rss',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->rssLinks as $link) {
            \App\Resources::query()->firstOrCreate(['link' => $link]);
        }
    }
}
