<?php

namespace Quorrax\Tests\Classes;

use Exception;
use PHPUnit_Framework_TestCase;
use Quorrax\Classes\Character;
use Quorrax\Interfaces\Variable as VariableInterface;
use Quorrax\Interfaces\Variables\Character as CharacterInterface;

/**
 * @package Quorrax\Tests\Classes
 */
class CharacterTest extends PHPUnit_Framework_TestCase
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
    private function getValuesEmptyNot()
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
    public function testImplementationCharacter()
    {
        $this->assertInstanceOf(CharacterInterface::class, new Character());
    }

    /**
     * @return void
     */
    public function testImplementationVariable()
    {
        $this->assertInstanceOf(VariableInterface::class, new Character());
    }

    /**
     * @dataProvider provideTestMethodGetType
     *
     * @param string $givenValue
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    public function testMethodGetType($givenValue)
    {
        $character = new Character($givenValue);
        $type = $character->getType();
        $this->assertInstanceOf(CharacterInterface::class, $type);
        $this->assertInstanceOf(VariableInterface::class, $type);
        $this->assertSame("string", $type->getValue());
    }

    /**
     * @return void
     * @throws \InvalidArgumentException
     */
    public function testMethodGetTypeDefault()
    {
        $character = new Character();
        $type = $character->getType();
        $this->assertInstanceOf(CharacterInterface::class, $type);
        $this->assertInstanceOf(VariableInterface::class, $type);
        $this->assertSame("string", $type->getValue());
    }

    /**
     * @dataProvider provideTestMethodGetValue
     *
     * @param string $givenValue
     *
     * @return void
     */
    public function testMethodGetValue($givenValue)
    {
        try {
            $character = new Character($givenValue);
            $this->assertSame($givenValue, $character->getValue());
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
            $character = new Character();
            $this->assertSame("", $character->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider provideTestMethodSetValue
     *
     * @param string $givenValue
     *
     * @return void
     */
    public function testMethodSetValue($givenValue)
    {
        try {
            $character = new Character();
            $this->assertSame($character, $character->setValue($givenValue));
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider \Quorrax\Tests\Classes\BooleanTest::provideTestMethodSetValue()
     *
     * @expectedException \Exception
     * @expectedExceptionCode 0
     * @expectedExceptionMessage The given argument for the {$value} parameter is not a string.
     *
     * @param mixed $givenValue
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodSetValueException($givenValue)
    {
        $character = new Character();
        $character->setValue($givenValue);
    }

    /**
     * @return void
     */
    public function testPropertyValue()
    {
        $this->assertClassHasAttribute("value", Character::class);
    }
}
