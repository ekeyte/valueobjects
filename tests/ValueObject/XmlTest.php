<?php

use PHPUnit\Framework\TestCase;
use ValueObject\Xml;

/**
 * Created by PhpStorm.
 * User: ekeyte
 * Date: 11/18/16
 * Time: 02:59
 */
class XmlTest extends TestCase
{
    const SIMPLE_XML_DOCUMENT_PATH = "tests/files/XmlSimple.xml";

    /**
     * @var Xml
     */
    protected $simpleXmlDocument;

    public function setUp()
    {
        static::assertIsReadable(
            self::SIMPLE_XML_DOCUMENT_PATH,
            'XML is not readable.'
        );

        static::assertInstanceOf(
            ValueObject\Xml::class,
            $this->simpleXmlDocument = new Xml(file_get_contents(self::SIMPLE_XML_DOCUMENT_PATH)),
            'Simple XML was not instantiable.'
        );
    }

    public function testXmlToString()
    {
        static::assertStringStartsWith(
            '<?xml version="1.0" encoding="utf-8" ?>',
            $this->simpleXmlDocument->toString(),
            'Simple XML to string does not start with "House"'
        );
    }

    public function testXmlToArray()
    {
        static::assertArrayHasKey(
            'Windows',
            $this->simpleXmlDocument->toArray(),
            'Simple XML array does not have "Windows" key'
        );
    }

}