<?php

namespace ValueObject;

use ValueObject\Enum\Enum;

/**
 * Class Gender
 *
 * @package ValueObject\Enum
 */
class Gender extends Enum
{
    const MALE = "MALE";
    const FEMALE = "FEMALE";
    const OTHER = "OTHER";
}