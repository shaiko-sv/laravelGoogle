<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Services\XMLParserService;

class ParserController extends Controller
{
    public function index(XMLParserService $parserService)
    {
        $start = date('c');
        $rssLinks = [
            'http://rss.cnn.com/rss/edition.rss',
            'http://rss.cnn.com/rss/edition_world.rss',
            'http://rss.cnn.com/rss/edition_africa.rss',
            'http://rss.cnn.com/rss/edition_americas.rss',
            'http://feeds.bbci.co.uk/news/world/rss.xml',
            'http://www.cbn.com/cbnnews/world/feed/',
            'http://feeds.reuters.com/Reuters/worldNews',
            'https://www.nasa.gov/rss/dyn/breaking_news.rss',
        ];

        $newsAddedCounter = 0;

        foreach ($rssLinks as $link) {
            NewsParsing::dispatch($link);
        }
//        if ($newsAddedCounter) {
            return redirect()->route('admin.news.index')->with('success', "Successfully parsed news.");
//        }
//        return redirect()->route('admin.news.index')->with('success', "There is no new news parsed.");
    }
}
