<?php

namespace Quorrax\Tests\Classes;

use Exception;
use PHPUnit_Framework_TestCase;
use Quorrax\Classes\Boolean;
use Quorrax\Classes\Character;
use Quorrax\Classes\Double;
use Quorrax\Classes\Integer;
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
                "givenValue" => "",
            ],
            [
                "givenValue" => "0",
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
                "givenValue" => "string",
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
    public function provideTestMethodGetTypeCustomReturnCustom()
    {
        return [
            [
                "givenValue" => "",
                "givenReturn" => Character::class,
            ],
        ];
    }

    /**
     * @return array
     */
    public function provideTestMethodGetTypeCustomReturnCustomException()
    {
        return [
            [
                "givenValue" => "",
                "givenReturn" => Boolean::class,
            ],
        ];
    }

    /**
     * @return array
     */
    public function provideTestMethodGetTypeCustomReturnDefault()
    {
        return $this->getValues();
    }

    /**
     * @return array
     */
    public function provideTestMethodGetTypeDefaultReturnCustom()
    {
        return [
            [
                "givenReturn" => Character::class,
            ],
        ];
    }

    /**
     * @return array
     */
    public function provideTestMethodGetTypeDefaultReturnCustomException()
    {
        return [
            [
                "givenReturn" => Boolean::class,
            ],
            [
                "givenReturn" => Double::class,
            ],
            [
                "givenReturn" => Integer::class,
            ],
        ];
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
     * @dataProvider provideTestMethodConstruct
     *
     * @param string $givenValue
     *
     * @return void
     */
    public function testMethodConstruct($givenValue)
    {
        try {
            $this->assertInstanceOf(Character::class, new Character($givenValue));
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @return void
     */
    public function testMethodConstructDefault()
    {
        try {
            $this->assertInstanceOf(Character::class, new Character());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider \Quorrax\Tests\Classes\BooleanTest::provideTestMethodConstruct()
     * @dataProvider \Quorrax\Tests\Classes\DoubleTest::provideTestMethodConstruct()
     * @dataProvider \Quorrax\Tests\Classes\IntegerTest::provideTestMethodConstruct()
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
    public function testMethodConstructException($givenValue)
    {
        new Character($givenValue);
    }

    /**
     * @dataProvider provideTestMethodGetTypeCustomReturnCustom
     *
     * @param string $givenValue
     * @param string $givenReturn
     *
     * @return void
     */
    public function testMethodGetTypeCustomReturnCustom($givenValue, $givenReturn)
    {
        try {
            $character = new Character($givenValue);
            $type = $character->getType($givenReturn);
            $this->assertInstanceOf($givenReturn, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("string", $type->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider provideTestMethodGetTypeCustomReturnCustomException
     *
     * @expectedException \Exception
     * @expectedExceptionCode 0
     * @expectedExceptionMessage TODO: Add some description here.
     *
     * @param string $givenValue
     * @param string $givenReturn
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodGetTypeCustomReturnCustomException($givenValue, $givenReturn)
    {
        $character = new Character($givenValue);
        $character->getType($givenReturn);
    }

    /**
     * @dataProvider provideTestMethodGetTypeCustomReturnDefault
     *
     * @param string $givenValue
     *
     * @return void
     */
    public function testMethodGetTypeCustomReturnDefault($givenValue)
    {
        try {
            $character = new Character($givenValue);
            $type = $character->getType();
            $this->assertInstanceOf(Character::class, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("string", $type->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider provideTestMethodGetTypeDefaultReturnCustom
     *
     * @param string $givenReturn
     *
     * @return void
     */
    public function testMethodGetTypeDefaultReturnCustom($givenReturn)
    {
        try {
            $character = new Character();
            $type = $character->getType($givenReturn);
            $this->assertInstanceOf($givenReturn, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("string", $type->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider provideTestMethodGetTypeDefaultReturnCustomException
     *
     * @expectedException \Exception
     * @expectedExceptionCode 0
     * @expectedExceptionMessage TODO: Add some description here.
     *
     * @param string $givenReturn
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodGetTypeDefaultReturnCustomException($givenReturn)
    {
        $character = new Character();
        $character->getType($givenReturn);
    }

    /**
     * @return void
     */
    public function testMethodGetTypeDefaultReturnDefault()
    {
        try {
            $character = new Character();
            $type = $character->getType();
            $this->assertInstanceOf(Character::class, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("string", $type->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
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
     * @dataProvider \Quorrax\Tests\Classes\DoubleTest::provideTestMethodSetValue()
     * @dataProvider \Quorrax\Tests\Classes\IntegerTest::provideTestMethodSetValue()
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
