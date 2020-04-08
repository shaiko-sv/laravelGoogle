<?php

namespace App\Console\Commands;

use App\News;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class savejson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        File::put(storage_path() . "/news.json",
                    json_encode(News::getNews(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK));
        File::put(base_path() . "/storage/app/public/categories.json",
                    json_encode(News::getNews(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK));
    }
}
