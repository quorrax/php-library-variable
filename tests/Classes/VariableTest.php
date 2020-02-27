<?php

namespace Quorrax\Tests\Classes;

use Exception;
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
     * @return void
     */
    public function testMethodGetValueException()
    {
        try {
            $variable = new Variable();
            $variable->getValue();
        } catch (Exception $exception) { // IMPROVE: Use a proper exception.
            $this->assertSame("", $exception->getMessage());
            $this->assertSame(0, $exception->getCode());
        }
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
     * @param null $givenValue
     *
     * @return void
     */
    public function testMethodSetValueException($givenValue)
    {
        try {
            $variable = new Variable();
            $variable->setValue($givenValue);
        } catch (Exception $exception) { // IMPROVE: Use a proper exception.
            $this->assertSame("", $exception->getMessage());
            $this->assertSame(0, $exception->getCode());
        }
    }
}
