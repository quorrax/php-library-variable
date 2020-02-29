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
    public function testMethodIsEmptyException()
    {
        $variable = new Variable();
        $variable->isEmpty();
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsEmptyFalse()
     *
     * @param mixed $givenValue
     *
     * @return void
     */
    public function testMethodIsEmptyFalse($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isEmpty = $variable->isEmpty();
        $this->assertInstanceOf(VariableInterface::class, $isEmpty);
        $this->assertFalse($isEmpty->getValue());
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsEmptyTrue()
     *
     * @param mixed $givenValue
     *
     * @return void
     */
    public function testMethodIsEmptyTrue($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isEmpty = $variable->isEmpty();
        $this->assertInstanceOf(VariableInterface::class, $isEmpty);
        $this->assertTrue($isEmpty->getValue());
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
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage The property {$value} is not defined.
     *
     * @return void
     */
    public function testMethodIsIntegerException()
    {
        $variable = new Variable();
        $variable->isInteger();
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsIntegerFalse()
     *
     * @param mixed $givenValue
     *
     * @return void
     */
    public function testMethodIsIntegerFalse($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isInteger = $variable->isInteger();
        $this->assertInstanceOf(VariableInterface::class, $isInteger);
        $this->assertFalse($isInteger->getValue());
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsIntegerTrue()
     *
     * @param bool $givenValue
     *
     * @return void
     */
    public function testMethodIsIntegerTrue($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isInteger = $variable->isInteger();
        $this->assertInstanceOf(VariableInterface::class, $isInteger);
        $this->assertTrue($isInteger->getValue());
    }

    /**
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage The property {$value} is not defined.
     *
     * @return void
     */
    public function testMethodIsNumericException()
    {
        $variable = new Variable();
        $variable->isNumeric();
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsNumericFalse()
     *
     * @param mixed $givenValue
     *
     * @return void
     */
    public function testMethodIsNumericFalse($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isNumeric = $variable->isNumeric();
        $this->assertInstanceOf(VariableInterface::class, $isNumeric);
        $this->assertFalse($isNumeric->getValue());
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsNumericTrue()
     *
     * @param mixed $givenValue
     *
     * @return void
     */
    public function testMethodIsNumericTrue($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isNumeric = $variable->isNumeric();
        $this->assertInstanceOf(VariableInterface::class, $isNumeric);
        $this->assertTrue($isNumeric->getValue());
    }

    /**
     * @expectedException \UnexpectedValueException
     * @expectedExceptionCode 0
     * @expectedExceptionMessage The property {$value} is not defined.
     *
     * @return void
     */
    public function testMethodIsObjectException()
    {
        $variable = new Variable();
        $variable->isObject();
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsObjectFalse()
     *
     * @param mixed $givenValue
     *
     * @return void
     */
    public function testMethodIsObjectFalse($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isObject = $variable->isObject();
        $this->assertInstanceOf(VariableInterface::class, $isObject);
        $this->assertFalse($isObject->getValue());
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsObjectTrue()
     *
     * @param object $givenValue
     *
     * @return void
     */
    public function testMethodIsObjectTrue($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isObject = $variable->isObject();
        $this->assertInstanceOf(VariableInterface::class, $isObject);
        $this->assertTrue($isObject->getValue());
    }

    /**
     * @expectedException \UnexpectedValueException
     * @expectedExceptionCode 0
     * @expectedExceptionMessage The property {$value} is not defined.
     *
     * @return void
     */
    public function testMethodIsResourceException()
    {
        $variable = new Variable();
        $variable->isResource();
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsResourceFalse()
     *
     * @param mixed $givenValue
     *
     * @return void
     */
    public function testMethodIsResourceFalse($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isResource = $variable->isResource();
        $this->assertInstanceOf(VariableInterface::class, $isResource);
        $this->assertFalse($isResource->getValue());
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsResourceTrue()
     *
     * @param resource $givenValue
     *
     * @return void
     */
    public function testMethodIsResourceTrue($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isResource = $variable->isResource();
        $this->assertInstanceOf(VariableInterface::class, $isResource);
        $this->assertTrue($isResource->getValue());
    }

    /**
     * @expectedException \UnexpectedValueException
     * @expectedExceptionCode 0
     * @expectedExceptionMessage The property {$value} is not defined.
     *
     * @return void
     */
    public function testMethodIsScalarException()
    {
        $variable = new Variable();
        $variable->isScalar();
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsScalarFalse()
     *
     * @param mixed $givenValue
     *
     * @return void
     */
    public function testMethodIsScalarFalse($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isScalar = $variable->isScalar();
        $this->assertInstanceOf(VariableInterface::class, $isScalar);
        $this->assertFalse($isScalar->getValue());
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsScalarTrue()
     *
     * @param mixed $givenValue
     *
     * @return void
     */
    public function testMethodIsScalarTrue($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isScalar = $variable->isScalar();
        $this->assertInstanceOf(VariableInterface::class, $isScalar);
        $this->assertTrue($isScalar->getValue());
    }

    /**
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage The property {$value} is not defined.
     *
     * @return void
     */
    public function testMethodIsStringException()
    {
        $variable = new Variable();
        $variable->isString();
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsStringFalse()
     *
     * @param mixed $givenValue
     *
     * @return void
     */
    public function testMethodIsStringFalse($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isString = $variable->isString();
        $this->assertInstanceOf(VariableInterface::class, $isString);
        $this->assertFalse($isString->getValue());
    }

    /**
     * @dataProvider \Quorrax\Tests\Providers\VariableTest::testMethodIsStringTrue()
     *
     * @param bool $givenValue
     *
     * @return void
     */
    public function testMethodIsStringTrue($givenValue)
    {
        $variable = new Variable();
        $variable->setValue($givenValue);
        $isString = $variable->isString();
        $this->assertInstanceOf(VariableInterface::class, $isString);
        $this->assertTrue($isString->getValue());
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
