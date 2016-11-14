<?php

use PHPUnit\Framework\TestCase;
use ValueObject\Gender;
use ValueObject\Exception\UnexpectedValueException;

/**
 * Class GenderTest
 */
class GenderTest extends TestCase
{


    public function testGetConstants()
    {
        $gender = new Gender(Gender::MALE);

        static::assertContains(
            "MALE",
            $gender->getConstants(),
            'Gender array did not contain "male"'
        );
    }

    public function testInitializeWithBadValue()
    {
        static::expectException(UnexpectedValueException::class);
        $gender = new Gender("MONKEY");
    }
}