<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Resources;
use App\Services\XMLParserService;

class ParserController extends Controller
{
    public function index(XMLParserService $parserService, Resources $resources)
    {
        $start = date('c');

        $newsAddedCounter = 0;

        foreach ($resources::all() as $resource) {
            NewsParsing::dispatch($resource->link);
        }
//        if ($newsAddedCounter) {
            return redirect()->route('admin.news.index')->with('success', "Successfully parsed news.");
//        }
//        return redirect()->route('admin.news.index')->with('success', "There is no new news parsed.");
    }
}
