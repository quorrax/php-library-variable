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
use Quorrax\Interfaces\Variables\Double as DoubleInterface;

/**
 * @package Quorrax\Tests\Classes
 */
class DoubleTest extends PHPUnit_Framework_TestCase
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
                "givenValue" => 0.0,
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
                "givenValue" => 0.1,
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
                "givenValue" => 0.0,
                "givenReturn" => Character::class,
            ],
            [
                "givenValue" => 0.1,
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
                "givenValue" => 0.0,
                "givenReturn" => Boolean::class,
            ],
            [
                "givenValue" => 0.0,
                "givenReturn" => Double::class,
            ],
            [
                "givenValue" => 0.0,
                "givenReturn" => Integer::class,
            ],
            [
                "givenValue" => 0.1,
                "givenReturn" => Boolean::class,
            ],
            [
                "givenValue" => 0.1,
                "givenReturn" => Double::class,
            ],
            [
                "givenValue" => 0.1,
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
        $this->assertInstanceOf(DoubleInterface::class, new Double());
    }

    /**
     * @return void
     */
    public function testImplementationVariable()
    {
        $this->assertInstanceOf(VariableInterface::class, new Double());
    }

    /**
     * @dataProvider provideTestMethodConstruct
     *
     * @param float $givenValue
     *
     * @return void
     */
    public function testMethodConstruct($givenValue)
    {
        try {
            $this->assertInstanceOf(Double::class, new Double($givenValue));
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
            $this->assertInstanceOf(Double::class, new Double());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider \Quorrax\Tests\Classes\BooleanTest::provideTestMethodConstruct()
     * @dataProvider \Quorrax\Tests\Classes\CharacterTest::provideTestMethodConstruct()
     * @dataProvider \Quorrax\Tests\Classes\IntegerTest::provideTestMethodConstruct()
     *
     * @expectedException \Exception
     * @expectedExceptionCode 0
     * @expectedExceptionMessage The given argument for the {$value} parameter is not a float.
     *
     * @param mixed $givenValue
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodConstructException($givenValue)
    {
        new Double($givenValue);
    }

    /**
     * @dataProvider provideTestMethodGetTypeCustomReturnCustom
     *
     * @param float $givenValue
     * @param string $givenReturn
     *
     * @return void
     */
    public function testMethodGetTypeCustomReturnCustom($givenValue, $givenReturn)
    {
        try {
            $boolean = new Double($givenValue);
            $type = $boolean->getType($givenReturn);
            $this->assertInstanceOf($givenReturn, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("double", $type->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider provideTestMethodGetTypeCustomReturnCustomException
     *
     * @param float $givenValue
     * @param string $givenReturn
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodGetTypeCustomReturnCustomException($givenValue, $givenReturn)
    {
        $boolean = new Double($givenValue);
        $this->expectException(Exception::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage("The given argument for the {\$return} parameter must implement the Quorrax\\Interfaces\\Variables\\Character interface.");
        $boolean->getType($givenReturn);
    }

    /**
     * @dataProvider provideTestMethodGetTypeCustomReturnDefault
     *
     * @param float $givenValue
     *
     * @return void
     */
    public function testMethodGetTypeCustomReturnDefault($givenValue)
    {
        try {
            $boolean = new Double($givenValue);
            $type = $boolean->getType();
            $this->assertInstanceOf(Character::class, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("double", $type->getValue());
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
            $boolean = new Double();
            $type = $boolean->getType($givenReturn);
            $this->assertInstanceOf($givenReturn, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("double", $type->getValue());
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
        $boolean = new Double();
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
            $boolean = new Double();
            $type = $boolean->getType();
            $this->assertInstanceOf(Character::class, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("double", $type->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider provideTestMethodGetValue
     *
     * @param float $givenValue
     *
     * @return void
     */
    public function testMethodGetValue($givenValue)
    {
        try {
            $boolean = new Double($givenValue);
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
            $boolean = new Double();
            $this->assertSame(0.0, $boolean->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider provideTestMethodSetValue
     *
     * @param float $givenValue
     *
     * @return void
     */
    public function testMethodSetValue($givenValue)
    {
        try {
            $boolean = new Double();
            $this->assertSame($boolean, $boolean->setValue($givenValue));
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider \Quorrax\Tests\Classes\BooleanTest::provideTestMethodSetValue()
     * @dataProvider \Quorrax\Tests\Classes\CharacterTest::provideTestMethodSetValue()
     * @dataProvider \Quorrax\Tests\Classes\IntegerTest::provideTestMethodSetValue()
     *
     * @expectedException \Exception
     * @expectedExceptionCode 0
     * @expectedExceptionMessage The given argument for the {$value} parameter is not a float.
     *
     * @param mixed $givenValue
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodSetValueException($givenValue)
    {
        $boolean = new Double();
        $boolean->setValue($givenValue);
    }

    /**
     * @return void
     */
    public function testPropertyValue()
    {
        $this->assertClassHasAttribute("value", Double::class);
    }
}
