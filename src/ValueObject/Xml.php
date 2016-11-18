<?php

namespace ValueObject;

use ValueObject\Contract\Arrayable;
use ValueObject\Contract\Stringable;
use ValueObject\Exception\UnexpectedFormatException;

/**
 * Class Xml
 *
 * @package ValueObject
 */
class Xml implements Arrayable, Stringable
{

    /**
     * @var string
     */
    private $data;

    /**
     * Xml constructor.
     *
     * @param $data
     *
     * @throws UnexpectedFormatException
     */
    public function __construct($data)
    {
        if (simplexml_load_string($data)) {
            $this->data = $data;
        } else {
            throw new UnexpectedFormatException('Unexpected XML format.');
        }
    }


    /**
     * Return the XML as a string.
     *
     * @return string
     */
    public function toString()
    {

        return (string) $this->data;
    }

    /**
     * Return the XML as an array.
     *
     * @return mixed
     */
    public function toArray()
    {

        return json_decode(json_encode(simplexml_load_string($this->data)), true);
    }

    /**
     * Return the Xml as a SimpleXmlElement.
     *
     * @return \SimpleXMLElement
     */
    public function toSimpleXml()
    {

        return simplexml_load_string($this->data);
    }

    /**
     * Return a SimpleXmlElement with options.
     *
     * @param      $options
     * @param      $namespace
     * @param bool $isPrefix
     *
     * @return \SimpleXMLElement
     */
    public function toSimpleXmlWithOptions($options, $namespace, $isPrefix = false)
    {

        return simplexml_load_string($this->data, $options, $namespace, $isPrefix);
    }
}