<?php

namespace Tests\Feature\Services\Content;

use App\Services\Content\Parser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_parses_hashtags_1(): void
    {
        $parser = new Parser();
        $result = $parser->parse('hello world #wyd');
        dump($result);
    }

    public function test_parses_mention_1(): void
    {
        $parser = new Parser();
        $result = $parser->parse('hello @jinx_lol what are you doing');
        dump($result);
    }
}
