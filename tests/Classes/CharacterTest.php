<?php

namespace Quorrax\Tests\Classes;

use PHPUnit_Framework_TestCase;
use Quorrax\Classes\Character;
use Quorrax\Interfaces\Variable as VariableInterface;
use Quorrax\Interfaces\Variables\Character as CharacterInterface;

/**
 * @package Quorrax\Tests\Classes
 */
class CharacterTest extends PHPUnit_Framework_TestCase
{
    private function getValues()
    {
        return array_merge(
            $this->getValuesEmpty(),
            $this->getValuesEmptyNot()
        );
    }

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
    public function provideTestMethodGetValue()
    {
        return $this->provideTestMethodSetValue();
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
     * @dataProvider provideTestMethodGetValue
     *
     * @param string $givenValue
     *
     * @return void
     */
    public function testMethodGetValue($givenValue)
    {
        $character = new Character($givenValue);
        $this->assertSame($givenValue, $character->getValue());
    }

    /**
     * @return void
     */
    public function testMethodGetValueDefault()
    {
        $character = new Character();
        $this->assertSame("", $character->getValue());
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
        $character = new Character();
        $this->assertSame($character, $character->setValue($givenValue));
    }

    /**
     * @return void
     */
    public function testPropertyValue()
    {
        $this->assertClassHasAttribute("value", Character::class);
    }
}
