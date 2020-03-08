<?php

namespace Quorrax\Tests\Classes;

use PHPUnit_Framework_TestCase;
use Quorrax\Classes\Boolean;
use Quorrax\Interfaces\Variable as VariableInterface;
use Quorrax\Interfaces\Variables\Boolean as BooleanInterface;

/**
 * @package Quorrax\Tests\Classes
 */
class BooleanTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    private function getValues()
    {
        return array_merge(
            $this->getValuesEmpty(),
            $this->getValuesEmptyNot()
        );
    }

    /**
     * @return array
     */
    private function getValuesEmpty()
    {
        return [
            [
                false,
            ],
        ];
    }

    /**
     * @return array
     */
    private function getValuesEmptyNot()
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
    public function provideTestMethodGetValue()
    {
        return $this->provideTestMethodSetValue();
    }

    /**
     * @return array
     */
    public function provideTestMethodSetValue()
    {
        return $this->getValues();
    }

    /**
     * @return void
     */
    public function testImplementationBoolean()
    {
        $this->assertInstanceOf(BooleanInterface::class, new Boolean());
    }

    /**
     * @return void
     */
    public function testImplementationVariable()
    {
        $this->assertInstanceOf(VariableInterface::class, new Boolean());
    }

    /**
     * @dataProvider provideTestMethodGetValue
     *
     * @param bool $givenValue
     *
     * @return void
     */
    public function testMethodGetValue($givenValue)
    {
        $boolean = new Boolean($givenValue);
        $this->assertSame($givenValue, $boolean->getValue());
    }

    /**
     * @return void
     */
    public function testMethodGetValueDefault()
    {
        $boolean = new Boolean();
        $this->assertFalse($boolean->getValue());
    }

    /**
     * @dataProvider provideTestMethodSetValue
     *
     * @param bool $givenValue
     *
     * @return void
     */
    public function testMethodSetValue($givenValue)
    {
        $boolean = new Boolean();
        $this->assertSame($boolean, $boolean->setValue($givenValue));
    }

    /**
     * @return void
     */
    public function testPropertyValue()
    {
        $this->assertClassHasAttribute("value", Boolean::class);
    }
}
