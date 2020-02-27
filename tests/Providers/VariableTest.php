<?php

namespace Quorrax\Tests\Providers;

/**
 * @package Quorrax\Tests\Providers
 */
class VariableTest
{
    /**
     * @return array
     */
    public function testMethodGetValue() // IMPROVE: Add more values.
    {
        return [
            [
                "givenValue" => false,
            ],
        ];
    }

    /**
     * @return array
     */
    public function testMethodSetValue() // IMPROVE: Add more values.
    {
        return [
            [
                "givenValue" => false,
            ],
        ];
    }

    /**
     * @return array
     */
    public function testMethodSetValueException()
    {
        return [
            [
                "givenValue" => null,
            ],
        ];
    }
}
