<?php

namespace ValueObject;

/**
 * Class Json
 *
 * @package ValueObject
 */
class Json
{
    /**
     * The JSON value.
     *
     * @var mixed
     */
    private $value;

    /**
     * @param $value
     *
     * @return Json
     */
    public static function create($value)
    {

        return new Json($value);
    }

    /**
     * @return mixed
     */
    public function toArray()
    {

        return json_decode($this->value, true);
    }

    /**
     * @return mixed|string
     */
    public function toString()
    {

        return $this->value;
    }

    /**
     * @return mixed|string
     */
    public function __toString()
    {

        return $this->toString();
    }

    /**
     * Json constructor.
     */
    private function __construct($value)
    {
        if ($this->isAlready($value)) {
            $this->value = json_encode(json_decode($value, true));
        } else {
            $this->value = json_encode($value);
        }
    }


    /**
     * Is the value already Json?
     *
     * @param mixed $value the value we are checking.
     *
     * @return bool
     */
    public function isAlready($value)
    {
        if (!is_string($value)) {
            return false;
        }

        // Is the value already JSON?
        if ($decoded = json_decode($value, true)) {
            if (is_array($decoded) || is_string($decoded)) {
                return true;
            }
        }

        return false;
    }
}