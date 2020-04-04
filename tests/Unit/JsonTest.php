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
        if(\Storage::disk('public')->exists('test.txt')){
            \Storage::disk('public')->delete('test.txt');
        }
        for($id=1; $id < 5; $id++) {
            $this->assertEquals($id, Json::addRecordToJsonFile('test.txt', []));
        }
        dump(\Storage::disk('public')->get('test.txt'));
        \Storage::disk('public')->delete('test.txt');
    }
}
