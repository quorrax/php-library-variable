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
    private function getValuesArray()
    {
        return array_merge(
            $this->getValuesArrayEmpty(),
            $this->getValuesArrayEmptyNot()
        );
    }

    /**
     * @return array
     */
    private function getValuesArrayEmpty()
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
    private function getValuesArrayEmptyNot()
    {
        return [
            [
                [null],
            ],
        ];
    }

    /**
     * @return array
     */
    private function getValuesBoolean()
    {
        return array_merge(
            $this->getValuesBooleanEmpty(),
            $this->getValuesBooleanEmptyNot()
        );
    }

    /**
     * @return array
     */
    private function getValuesBooleanEmpty()
    {
        return [
            [
                false,
            ],
        ];
    }

    private function getValuesBooleanEmptyNot()
    {
        return [
            [
                true,
            ],
        ];
    }

    /**
     * @return array
     */
    private function getValuesFloat()
    {
        return array_merge(
            $this->getValuesFloatEmpty(),
            $this->getValuesFloatEmptyNot()
        );
    }

    /**
     * @return array
     */
    private function getValuesFloatEmpty()
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
    private function getValuesFloatEmptyNot()
    {
        return [
            [
                0.1,
            ],
        ];
    }

    /**
     * @return array
     */
    private function getValuesInteger()
    {
        return array_merge(
            $this->getValuesIntegerEmpty(),
            $this->getValuesIntegerEmptyNot()
        );
    }

    /**
     * @return array
     */
    private function getValuesIntegerEmpty()
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
    private function getValuesIntegerEmptyNot()
    {
        return [
            [
                1,
            ],
        ];
    }

    /**
     * @return array
     */
    private function getValuesString()
    {
        return array_merge(
            $this->getValuesStringEmpty(),
            $this->getValuesStringEmptyNot()
        );
    }

    /**
     * @return array
     */
    private function getValuesStringEmpty()
    {
        return [
            [
                "",
            ],
            [
                "0",
            ],
        ];
    }

    /**
     * @return array
     */
    private function getValuesStringEmptyNot()
    {
        return [
            [
                "string",
            ],
        ];
    }

    /**
     * @return array
     */
    public function testMethodGetValue()
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
    public function testMethodIsBooleanFalse()
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
    public function testMethodIsEmptyFalse()
    {
        return array_merge(
            $this->getValuesArrayEmptyNot(),
            $this->getValuesBooleanEmptyNot(),
            $this->getValuesFloatEmptyNot(),
            $this->getValuesIntegerEmptyNot(),
            $this->getValuesStringEmptyNot()
        );
    }

    /**
     * @return array
     */
    public function testMethodIsEmptyTrue()
    {
        return array_merge(
            $this->getValuesArrayEmpty(),
            $this->getValuesBooleanEmpty(),
            $this->getValuesFloatEmpty(),
            $this->getValuesIntegerEmpty(),
            $this->getValuesStringEmpty()
        );
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
    public function testMethodSetValue()
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
