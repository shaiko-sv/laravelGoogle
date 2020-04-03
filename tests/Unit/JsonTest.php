<?php

namespace Tests\Unit;

use App\Json;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JsonTest extends TestCase
{
    /**
     * @return void
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function testAddRecordToJsonFile()
    {
        if(\Storage::exists('public/test.txt')){
            \Storage::delete('public/test.txt');
        }
        for($id=1; $id < 5; $id++) {
            $this->assertEquals($id, Json::addRecordToJsonFile('public/test.txt', []));
        }
        dump(\Storage::get('public/test.txt'));
        \Storage::delete('public/test.txt');
    }
}
