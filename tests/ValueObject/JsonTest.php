<?php

use PHPUnit\Framework\TestCase;
use ValueObject\Json;

/**
 * Class JsonTest
 */
class JsonTest extends TestCase
{
    /**
     * Test Creating JSON
     */
    public function testJsonCreate()
    {
        $json = Json::create(['hello' => 'hi']);
        $arr = json_decode($json, true);

        static::assertTrue(
            $arr['hello'] == 'hi',
            'Json element missing from array.'
        );
    }

    /**
     * Test toArray
     */
    public function testToArray()
    {
        $json = Json::create(['hello' => 'hi']);

        static::assertTrue(
            $json->toArray()['hello'] == 'hi',
            'Json toArray failed.'
        );
    }
}