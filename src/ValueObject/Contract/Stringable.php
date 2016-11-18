<?php

namespace ValueObject\Contract;

/**
 * Interface Stringable
 *
 * @package ValueObject\Contract
 */
interface Stringable
{

    /**
     * Return a string of the entity.
     *
     * @return string
     */
    public function toString();
}