<?php

namespace Quorrax\Tests\Classes;

use Exception;
use PHPUnit_Framework_TestCase;
use Quorrax\Classes\Boolean;
use Quorrax\Classes\Character;
use Quorrax\Classes\Double;
use Quorrax\Classes\Integer;
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
                "givenValue" => false,
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
                "givenValue" => true,
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
                "givenValue" => false,
                "givenReturn" => Character::class,
            ],
            [
                "givenValue" => true,
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
                "givenValue" => false,
                "givenReturn" => Boolean::class,
            ],
            [
                "givenValue" => false,
                "givenReturn" => Double::class,
            ],
            [
                "givenValue" => false,
                "givenReturn" => Integer::class,
            ],
            [
                "givenValue" => true,
                "givenReturn" => Boolean::class,
            ],
            [
                "givenValue" => true,
                "givenReturn" => Double::class,
            ],
            [
                "givenValue" => true,
                "givenReturn" => Integer::class,
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
        try {
            $this->assertInstanceOf(Boolean::class, new Boolean($givenValue));
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
            $this->assertInstanceOf(Boolean::class, new Boolean());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider \Quorrax\Tests\Classes\CharacterTest::provideTestMethodConstruct()
     * @dataProvider \Quorrax\Tests\Classes\DoubleTest::provideTestMethodConstruct()
     * @dataProvider \Quorrax\Tests\Classes\IntegerTest::provideTestMethodConstruct()
     *
     * @expectedException \Exception
     * @expectedExceptionCode 0
     * @expectedExceptionMessage The given argument for the {$value} parameter is not a boolean.
     *
     * @param mixed $givenValue
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodConstructException($givenValue)
    {
        new Boolean($givenValue);
    }

    /**
     * @dataProvider provideTestMethodGetTypeCustomReturnCustom
     *
     * @param bool $givenValue
     * @param string $givenReturn
     *
     * @return void
     */
    public function testMethodGetTypeCustomReturnCustom($givenValue, $givenReturn)
    {
        try {
            $boolean = new Boolean($givenValue);
            $type = $boolean->getType($givenReturn);
            $this->assertInstanceOf($givenReturn, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("boolean", $type->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider provideTestMethodGetTypeCustomReturnCustomException
     *
     * @param bool $givenValue
     * @param string $givenReturn
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodGetTypeCustomReturnCustomException($givenValue, $givenReturn)
    {
        $boolean = new Boolean($givenValue);
        $this->expectException(Exception::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage("The given argument for the {\$return} parameter must implement the Quorrax\\Interfaces\\Variables\\Character interface.");
        $boolean->getType($givenReturn);
    }

    /**
     * @dataProvider provideTestMethodGetTypeCustomReturnDefault
     *
     * @param bool $givenValue
     *
     * @return void
     */
    public function testMethodGetTypeCustomReturnDefault($givenValue)
    {
        try {
            $boolean = new Boolean($givenValue);
            $type = $boolean->getType();
            $this->assertInstanceOf(Character::class, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("boolean", $type->getValue());
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
            $boolean = new Boolean();
            $type = $boolean->getType($givenReturn);
            $this->assertInstanceOf($givenReturn, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("boolean", $type->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider provideTestMethodGetTypeDefaultReturnCustomException
     *
     * @param string $givenReturn
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodGetTypeDefaultReturnCustomException($givenReturn)
    {
        $boolean = new Boolean();
        $this->expectException(Exception::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage("The given argument for the {\$return} parameter must implement the Quorrax\\Interfaces\\Variables\\Character interface.");
        $boolean->getType($givenReturn);
    }

    /**
     * @return void
     */
    public function testMethodGetTypeDefaultReturnDefault()
    {
        try {
            $boolean = new Boolean();
            $type = $boolean->getType();
            $this->assertInstanceOf(Character::class, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("boolean", $type->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
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
     * @dataProvider \Quorrax\Tests\Classes\DoubleTest::provideTestMethodSetValue()
     * @dataProvider \Quorrax\Tests\Classes\IntegerTest::provideTestMethodSetValue()
     *
     * @expectedException \Exception
     * @expectedExceptionCode 0
     * @expectedExceptionMessage The given argument for the {$value} parameter is not a boolean.
     *
     * @param mixed $givenValue
     *
     * @return void
     * @throws \Exception
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
