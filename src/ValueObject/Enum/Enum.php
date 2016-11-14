<?php

namespace ValueObject\Enum;

use ValueObject\Exception\UnexpectedValueException;

/**
 * Class Enum
 *
 * @package ValueObject\Enum
 */
abstract class Enum
{

    /**
     * @var string
     */
    protected $value;

    /**
     * Enum constructor.
     *
     * @param $value
     *
     * @throws UnexpectedValueException
     */
    public function __construct($value)
    {
        if (!in_array($value, $this->getConstants())) {
            throw new UnexpectedValueException("Unexpected value");
        }

        $this->value = $value;
    }

    /**
     * @return array
     */
    public function getConstants()
    {
        $constants = new \ReflectionClass($this);

        return $constants->getConstants();
    }

    /**
     * @return mixed
     */
    public function getValue() {

        return $this->value;
    }

}