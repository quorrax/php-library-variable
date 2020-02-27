<?php

namespace Quorrax\Tests\Classes;

use PHPUnit_Framework_TestCase;
use Quorrax\Classes\Variable;

/**
 * @package Quorrax\Tests\Classes
 */
class VariableTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return void
     */
    public function testImplementationVariable()
    {
        $this->assertInstanceOf(\Quorrax\Interfaces\Variable::class, new Variable());
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodGetValue()
     *
     * @param mixed $givenValue
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodGetValue($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $this->assertSame($givenValue, $variable->getValue());
    }

    /**
     * @expectedException \UnexpectedValueException
     * @expectedExceptionCode 0
     * @expectedExceptionMessage The property {$value} is not defined.
     *
     * @return void
     */
    public function testMethodGetValueException()
    {
        $variable = new Variable();
        $variable->getValue();
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodSetValue()
     *
     * @param mixed $givenValue
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodSetValue($givenValue)
    {
        $variable = new Variable();
        $this->assertSame($variable, $variable->setValue($givenValue));
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodSetValueException()
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionCode 0
     * @expectedExceptionMessage The given argument for the {$value} parameter is not valid.
     *
     * @param null $givenValue
     *
     * @return void
     */
    public function testMethodSetValueException($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
    }

    /**
     * @return void
     */
    public function testPropertyValue()
    {
        $this->assertClassHasAttribute("value", Variable::class);
    }
}
