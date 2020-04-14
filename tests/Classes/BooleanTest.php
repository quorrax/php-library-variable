<?php

namespace Quorrax\Tests\Classes;

use Exception;
use PHPUnit_Framework_TestCase;
use Quorrax\Classes\Boolean;
use Quorrax\Interfaces\Variable as VariableInterface;
use Quorrax\Interfaces\Variables\Boolean as BooleanInterface;
use Quorrax\Interfaces\Variables\Character as CharacterInterface;

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
    public function provideTestMethodConstruct()
    {
        return $this->getValues();
    }

    /**
     * @return array
     */
    public function provideTestMethodGetType()
    {
        return $this->getValues();
    }

    /**
     * @return array
     */
    public function provideTestMethodGetValue()
    {
        return $this->getValues();
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
     * @dataProvider provideTestMethodConstruct
     *
     * @param bool $givenValue
     *
     * @return void
     */
    public function testMethodConstruct($givenValue)
    {
        $this->assertInstanceOf(Boolean::class, new Boolean($givenValue));
    }

    /**
     * @return void
     */
    public function testMethodConstructDefault()
    {
        $this->assertInstanceOf(Boolean::class, new Boolean());
    }

    /**
     * @dataProvider \Quorrax\Tests\Classes\CharacterTest::provideTestMethodConstruct
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionCode 0
     * @expectedExceptionMessage The given argument for the {$value} parameter is not a boolean.
     *
     * @param mixed $givenValue
     *
     * @return void
     */
    public function testMethodConstructException($givenValue)
    {
        new Boolean($givenValue);
    }

    /**
     * @dataProvider provideTestMethodGetType
     *
     * @param bool $givenValue
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    public function testMethodGetType($givenValue)
    {
        $boolean = new Boolean($givenValue);
        $type = $boolean->getType();
        $this->assertInstanceOf(CharacterInterface::class, $type);
        $this->assertInstanceOf(VariableInterface::class, $type);
        $this->assertSame("boolean", $type->getValue());
    }

    /**
     * @return void
     * @throws \InvalidArgumentException
     */
    public function testMethodGetTypeDefault()
    {
        $boolean = new Boolean();
        $type = $boolean->getType();
        $this->assertInstanceOf(CharacterInterface::class, $type);
        $this->assertInstanceOf(VariableInterface::class, $type);
        $this->assertSame("boolean", $type->getValue());
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
        try {
            $boolean = new Boolean($givenValue);
            $this->assertSame($givenValue, $boolean->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @return void
     */
    public function testMethodGetValueDefault()
    {
        try {
            $boolean = new Boolean();
            $this->assertFalse($boolean->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
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
        try {
            $boolean = new Boolean();
            $this->assertSame($boolean, $boolean->setValue($givenValue));
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider \Quorrax\Tests\Classes\CharacterTest::provideTestMethodSetValue()
     *
     * @expectedException \Exception
     * @expectedExceptionCode 0
     * @expectedExceptionMessage The given argument for the {$value} parameter is not a boolean.
     *
     * @param mixed $givenValue
     *
     * @return void
     */
    public function testMethodSetValueException($givenValue)
    {
        $boolean = new Boolean();
        $boolean->setValue($givenValue);
    }

    /**
     * @return void
     */
    public function testPropertyValue()
    {
        $this->assertClassHasAttribute("value", Boolean::class);
    }
}
