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
use Quorrax\Interfaces\Variables\Integer as IntegerInterface;

/**
 * @package Quorrax\Tests\Classes
 */
class IntegerTest extends PHPUnit_Framework_TestCase
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
                "givenValue" => 0,
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
                "givenValue" => 1,
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
                "givenValue" => 0,
                "givenReturn" => Character::class,
            ],
            [
                "givenValue" => 1,
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
                "givenValue" => 0,
                "givenReturn" => Boolean::class,
            ],
            [
                "givenValue" => 0,
                "givenReturn" => Double::class,
            ],
            [
                "givenValue" => 0,
                "givenReturn" => Integer::class,
            ],
            [
                "givenValue" => 1,
                "givenReturn" => Boolean::class,
            ],
            [
                "givenValue" => 1,
                "givenReturn" => Double::class,
            ],
            [
                "givenValue" => 1,
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
        $this->assertInstanceOf(IntegerInterface::class, new Integer());
    }

    /**
     * @return void
     */
    public function testImplementationVariable()
    {
        $this->assertInstanceOf(VariableInterface::class, new Integer());
    }

    /**
     * @dataProvider provideTestMethodConstruct
     *
     * @param int $givenValue
     *
     * @return void
     */
    public function testMethodConstruct($givenValue)
    {
        try {
            $this->assertInstanceOf(Integer::class, new Integer($givenValue));
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
            $this->assertInstanceOf(Integer::class, new Integer());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider \Quorrax\Tests\Classes\BooleanTest::provideTestMethodConstruct()
     * @dataProvider \Quorrax\Tests\Classes\CharacterTest::provideTestMethodConstruct()
     * @dataProvider \Quorrax\Tests\Classes\DoubleTest::provideTestMethodConstruct()
     *
     * @expectedException \Exception
     * @expectedExceptionCode 0
     * @expectedExceptionMessage The given argument for the {$value} parameter is not an integer.
     *
     * @param mixed $givenValue
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodConstructException($givenValue)
    {
        new Integer($givenValue);
    }

    /**
     * @dataProvider provideTestMethodGetTypeCustomReturnCustom
     *
     * @param int $givenValue
     * @param string $givenReturn
     *
     * @return void
     */
    public function testMethodGetTypeCustomReturnCustom($givenValue, $givenReturn)
    {
        try {
            $integer = new Integer($givenValue);
            $type = $integer->getType($givenReturn);
            $this->assertInstanceOf($givenReturn, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("integer", $type->getValue());
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
     * @param int $givenValue
     * @param string $givenReturn
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodGetTypeCustomReturnCustomException($givenValue, $givenReturn)
    {
        $integer = new Integer($givenValue);
        $integer->getType($givenReturn);
    }

    /**
     * @dataProvider provideTestMethodGetTypeCustomReturnDefault
     *
     * @param int $givenValue
     *
     * @return void
     */
    public function testMethodGetTypeCustomReturnDefault($givenValue)
    {
        try {
            $integer = new Integer($givenValue);
            $type = $integer->getType();
            $this->assertInstanceOf(Character::class, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("integer", $type->getValue());
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
            $integer = new Integer();
            $type = $integer->getType($givenReturn);
            $this->assertInstanceOf($givenReturn, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("integer", $type->getValue());
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
        $integer = new Integer();
        $integer->getType($givenReturn);
    }

    /**
     * @return void
     */
    public function testMethodGetTypeDefaultReturnDefault()
    {
        try {
            $integer = new Integer();
            $type = $integer->getType();
            $this->assertInstanceOf(Character::class, $type);
            $this->assertInstanceOf(CharacterInterface::class, $type);
            $this->assertInstanceOf(VariableInterface::class, $type);
            $this->assertSame("integer", $type->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider provideTestMethodGetValue
     *
     * @param int $givenValue
     *
     * @return void
     */
    public function testMethodGetValue($givenValue)
    {
        try {
            $integer = new Integer($givenValue);
            $this->assertSame($givenValue, $integer->getValue());
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
            $integer = new Integer();
            $this->assertSame(0, $integer->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider provideTestMethodSetValue
     *
     * @param int $givenValue
     *
     * @return void
     */
    public function testMethodSetValue($givenValue)
    {
        try {
            $integer = new Integer();
            $this->assertSame($integer, $integer->setValue($givenValue));
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider \Quorrax\Tests\Classes\BooleanTest::provideTestMethodSetValue()
     * @dataProvider \Quorrax\Tests\Classes\CharacterTest::provideTestMethodSetValue()
     * @dataProvider \Quorrax\Tests\Classes\DoubleTest::provideTestMethodSetValue()
     *
     * @expectedException \Exception
     * @expectedExceptionCode 0
     * @expectedExceptionMessage The given argument for the {$value} parameter is not an integer.
     *
     * @param mixed $givenValue
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodSetValueException($givenValue)
    {
        $integer = new Integer();
        $integer->setValue($givenValue);
    }

    /**
     * @return void
     */
    public function testPropertyValue()
    {
        $this->assertClassHasAttribute("value", Integer::class);
    }
}
