<?php

namespace Quorrax\Tests\Classes;

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
}
