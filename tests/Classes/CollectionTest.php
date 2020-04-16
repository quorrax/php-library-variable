<?php

namespace Quorrax\Tests\Classes;

use Exception;
use PHPUnit_Framework_TestCase;
use Quorrax\Classes\Boolean;
use Quorrax\Classes\Character;
use Quorrax\Classes\Collection;
use Quorrax\Classes\Double;
use Quorrax\Classes\Integer;
use Quorrax\Interfaces\Variable as VariableInterface;
use Quorrax\Interfaces\Variables\Collection as CollectionInterface;

/**
 * @package Quorrax\Tests\Classes
 */
class CollectionTest extends PHPUnit_Framework_TestCase
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
                "givenValue" => [],
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
                "givenValue" => [[]],
            ],
            [
                "givenValue" => [new Collection()],
            ],
            [
                "givenValue" => [false],
            ],
            [
                "givenValue" => [new Boolean()],
            ],
            [
                "givenValue" => [0.0],
            ],
            [
                "givenValue" => [new Double()],
            ],
            [
                "givenValue" => [0],
            ],
            [
                "givenValue" => [new Integer()],
            ],
            [
                "givenValue" => [""],
            ],
            [
                "givenValue" => [new Character()],
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
    public function provideTestMethodGetValue()
    {
        return [
            [
                "givenValue" => [[]],
                "expectedValue" => [new Collection()],
            ],
            [
                "givenValue" => [new Collection()],
                "expectedValue" => [new Collection()],
            ],
            [
                "givenValue" => [false],
                "expectedValue" => [new Boolean()],
            ],
            [
                "givenValue" => [0.0],
                "expectedValue" => [new Double()],
            ],
            [
                "givenValue" => [new Double()],
                "expectedValue" => [new Double()],
            ],
            [
                "givenValue" => [0],
                "expectedValue" => [new Integer()],
            ],
            [
                "givenValue" => [new Integer()],
                "expectedValue" => [new Integer()],
            ],
            [
                "givenValue" => [""],
                "expectedValue" => [new Character()],
            ],
            [
                "givenValue" => [new Character()],
                "expectedValue" => [new Character()],
            ],
        ];
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
    public function testImplementationCollection()
    {
        try {
            $this->assertInstanceOf(CollectionInterface::class, new Collection());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @return void
     */
    public function testImplementationVariable()
    {
        try {
            $this->assertInstanceOf(VariableInterface::class, new Collection());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider provideTestMethodConstruct
     *
     * @param array $givenValue
     *
     * @return void
     */
    public function testMethodConstruct($givenValue)
    {
        try {
            $this->assertInstanceOf(Collection::class, new Collection($givenValue));
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
            $this->assertInstanceOf(Collection::class, new Collection());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider \Quorrax\Tests\Classes\BooleanTest::provideTestMethodConstruct()
     * @dataProvider \Quorrax\Tests\Classes\CharacterTest::provideTestMethodConstruct()
     * @dataProvider \Quorrax\Tests\Classes\DoubleTest::provideTestMethodConstruct()
     * @dataProvider \Quorrax\Tests\Classes\IntegerTest::provideTestMethodConstruct()
     *
     * @param mixed $givenValue
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodConstructException($givenValue)
    {
        $this->expectExceptionCode(0);
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("The given argument for the {\$value} parameter is not an array.");
        new Collection($givenValue);
    }

    /**
     * @dataProvider provideTestMethodGetValue
     *
     * @param array $givenValue
     * @param array $expectedValue
     *
     * @return void
     */
    public function testMethodGetValue($givenValue, $expectedValue)
    {
        try {
            $collection = new Collection($givenValue);
            $this->assertEquals($expectedValue, $collection->getValue());
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
            $collection = new Collection();
            $this->assertSame([], $collection->getValue());
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider provideTestMethodSetValue
     *
     * @param array $givenValue
     *
     * @return void
     */
    public function testMethodSetValue($givenValue)
    {
        try {
            $collection = new Collection();
            $this->assertSame($collection, $collection->setValue($givenValue));
        } catch (Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider \Quorrax\Tests\Classes\BooleanTest::provideTestMethodSetValue()
     * @dataProvider \Quorrax\Tests\Classes\CharacterTest::provideTestMethodSetValue()
     * @dataProvider \Quorrax\Tests\Classes\DoubleTest::provideTestMethodSetValue()
     * @dataProvider \Quorrax\Tests\Classes\IntegerTest::provideTestMethodSetValue()
     *
     * @param mixed $givenValue
     *
     * @return void
     * @throws \Exception
     */
    public function testMethodSetValueException($givenValue)
    {
        $collection = new Collection();
        $this->expectException(Exception::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage("The given argument for the {\$value} parameter is not an array.");
        $collection->setValue($givenValue);
    }

    /**
     * @return void
     */
    public function testPropertyValue()
    {
        $this->assertClassHasAttribute("value", Collection::class);
    }
}
