<?php

namespace Quorrax\Tests\Classes;

use PHPUnit_Framework_TestCase;
use Quorrax\Classes\Variable;
use Quorrax\Interfaces\Variable as VariableInterface;

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
        $this->assertInstanceOf(VariableInterface::class, new Variable());
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
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage The property {$value} is not defined.
     *
     * @return void
     */
    public function testMethodIsArrayException()
    {
        $variable = new Variable();
        $variable->isArray();
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsArrayFalse()
     *
     * @param mixed $givenValue
     *
     * @return void
     */
    public function testMethodIsArrayFalse($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isArray = $variable->isArray();
        $this->assertInstanceOf(VariableInterface::class, $isArray);
        $this->assertFalse($isArray->getValue());
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsArrayTrue()
     *
     * @param array $givenValue
     *
     * @return void
     */
    public function testMethodIsArrayTrue($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isArray = $variable->isArray();
        $this->assertInstanceOf(VariableInterface::class, $isArray);
        $this->assertTrue($isArray->getValue());
    }

    /**
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage The property {$value} is not defined.
     *
     * @return void
     */
    public function testMethodIsBooleanException()
    {
        $variable = new Variable();
        $variable->isBoolean();
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsBooleanFalse()
     *
     * @param mixed $givenValue
     *
     * @return void
     */
    public function testMethodIsBooleanFalse($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isBoolean = $variable->isBoolean();
        $this->assertInstanceOf(VariableInterface::class, $isBoolean);
        $this->assertFalse($isBoolean->getValue());
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsBooleanTrue()
     *
     * @param bool $givenValue
     *
     * @return void
     */
    public function testMethodIsBooleanTrue($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isBoolean = $variable->isBoolean();
        $this->assertInstanceOf(VariableInterface::class, $isBoolean);
        $this->assertTrue($isBoolean->getValue());
    }

    /**
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage The property {$value} is not defined.
     *
     * @return void
     */
    public function testMethodIsFloatException()
    {
        $variable = new Variable();
        $variable->isFloat();
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsFloatFalse()
     *
     * @param mixed $givenValue
     *
     * @return void
     */
    public function testMethodIsFloatFalse($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isFloat = $variable->isFloat();
        $this->assertInstanceOf(VariableInterface::class, $isFloat);
        $this->assertFalse($isFloat->getValue());
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsFloatTrue()
     *
     * @param bool $givenValue
     *
     * @return void
     */
    public function testMethodIsFloatTrue($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isFloat = $variable->isFloat();
        $this->assertInstanceOf(VariableInterface::class, $isFloat);
        $this->assertTrue($isFloat->getValue());
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
