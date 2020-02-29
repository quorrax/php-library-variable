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
    private function getValuesArray() // IMPROVE: Add more values.
    {
        return [
            [
                [],
            ],
        ];
    }

    /**
     * @return array
     */
    private function getValuesBoolean()
    {
        return [
            [
                false,
            ],
            [
                true,
            ],
        ];
    }

    /**
     * @return array
     */
    private function getValuesFloat() // IMPROVE: Add more values.
    {
        return [
            [
                0.0,
            ],
        ];
    }

    /**
     * @return array
     */
    private function getValuesInteger() // IMPROVE: Add more values.
    {
        return [
            [
                0,
            ],
        ];
    }

    /**
     * @return array
     */
    private function getValuesString() // IMPROVE: Add more values.
    {
        return [
            [
                "",
            ],
        ];
    }

    /**
     * @return array
     */
    public function testMethodGetValue() // IMPROVE: Add more values.
    {
        return $this->testMethodSetValue();
    }

    /**
     * @return array
     */
    public function testMethodIsArrayFalse()
    {
        return array_merge(
            $this->getValuesBoolean(),
            $this->getValuesFloat(),
            $this->getValuesInteger(),
            $this->getValuesString()
        );
    }

    /**
     * @return array
     */
    public function testMethodIsArrayTrue()
    {
        return $this->getValuesArray();
    }

    /**
     * @return array
     */
    public function testMethodIsBooleanFalse() // IMPROVE: Add more values.
    {
        return array_merge(
            $this->getValuesArray(),
            $this->getValuesFloat(),
            $this->getValuesInteger(),
            $this->getValuesString()
        );
    }

    /**
     * @return array
     */
    public function testMethodIsBooleanTrue()
    {
        return $this->getValuesBoolean();
    }

    /**
     * @return array
     */
    public function testMethodIsFloatFalse()
    {
        return array_merge(
            $this->getValuesArray(),
            $this->getValuesBoolean(),
            $this->getValuesInteger(),
            $this->getValuesString()
        );
    }

    /**
     * @return array
     */
    public function testMethodIsFloatTrue()
    {
        return $this->getValuesFloat();
    }

    /**
     * @return array
     */
    public function testMethodIsIntegerFalse()
    {
        return array_merge(
            $this->getValuesArray(),
            $this->getValuesBoolean(),
            $this->getValuesFloat(),
            $this->getValuesString()
        );
    }

    /**
     * @return array
     */
    public function testMethodIsIntegerTrue()
    {
        return $this->getValuesInteger();
    }

    /**
     * @return array
     */
    public function testMethodIsStringFalse()
    {
        return array_merge(
            $this->getValuesArray(),
            $this->getValuesBoolean(),
            $this->getValuesFloat(),
            $this->getValuesInteger()
        );
    }

    /**
     * @return array
     */
    public function testMethodIsStringTrue()
    {
        return $this->getValuesString();
    }

    /**
     * @return array
     */
    public function testMethodSetValue() // IMPROVE: Add more values.
    {
        return array_merge(
            $this->getValuesArray(),
            $this->getValuesBoolean(),
            $this->getValuesFloat(),
            $this->getValuesInteger(),
            $this->getValuesString()
        );
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
