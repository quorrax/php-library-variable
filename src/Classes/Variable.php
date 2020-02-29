<?php
/**
 * Copyright © 2020 Quorrax, S. L.
 *
 * This file is part of quorrax/variable.
 *
 * quorrax/variable is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * quorrax/variable is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with quorrax/variable. If not, see <https://www.gnu.org/licenses/>.
 */

namespace Quorrax\Classes;

use InvalidArgumentException;
use Quorrax\Interfaces\Variable as VariableInterface;
use UnexpectedValueException;

/**
 * @package Quorrax\Classes
 */
class Variable implements VariableInterface
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @param callable $function
     *
     * @return \Quorrax\Interfaces\Variable
     * @throws \UnexpectedValueException
     */
    private function is($function)
    {
        $result = new Variable();
        if (call_user_func($function, $this->getValue())) {
            $result->setValue(true);
        } else {
            $result->setValue(false);
        }
        return $result;
    }

    /**
     * @return mixed
     * @throws \UnexpectedValueException
     */
    public function getValue()
    {
        if (is_null($this->value)) {
            throw new UnexpectedValueException("The property {\$value} is not defined.");
        } else {
            return $this->value;
        }
    }

    /**
     * @return \Quorrax\Interfaces\Variable
     * @throws \UnexpectedValueException
     */
    public function isArray()
    {
        return $this->is("is_array");
    }

    /**
     * @return \Quorrax\Interfaces\Variable
     * @throws \UnexpectedValueException
     */
    public function isBoolean()
    {
        return $this->is("is_bool");
    }

    /**
     * @return \Quorrax\Interfaces\Variable
     * @throws \UnexpectedValueException
     */
    public function isEmpty()
    {
        $result = new Variable();
        if (empty($this->getValue())) {
            $result->setValue(true);
        } else {
            $result->setValue(false);
        }
        return $result;
    }

    /**
     * @return \Quorrax\Interfaces\Variable
     * @throws \UnexpectedValueException
     */
    public function isFloat()
    {
        return $this->is("is_float");
    }

    /**
     * @return \Quorrax\Interfaces\Variable
     * @throws \UnexpectedValueException
     */
    public function isInteger()
    {
        return $this->is("is_int");
    }

    /**
     * @return \Quorrax\Interfaces\Variable
     */
    public function isNumeric()
    {
        return $this->is("is_numeric");
    }

    /**
     * @return \Quorrax\Interfaces\Variable
     * @throws \UnexpectedValueException
     */
    public function isObject()
    {
        return $this->is("is_object");
    }

    /**
     * @return \Quorrax\Interfaces\Variable
     * @throws \UnexpectedValueException
     */
    public function isResource()
    {
        return $this->is("is_resource");
    }

    /**
     * @return \Quorrax\Interfaces\Variable
     * @throws \UnexpectedValueException
     */
    public function isScalar()
    {
        return $this->is("is_scalar");
    }

    /**
     * @return \Quorrax\Interfaces\Variable
     * @throws \UnexpectedValueException
     */
    public function isString()
    {
        return $this->is("is_string");
    }

    /**
     * @param mixed $value
     *
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setValue($value)
    {
        if (is_null($value)) {
            throw new InvalidArgumentException("The given argument for the {\$value} parameter is not valid.");
        } else {
            $this->value = $value;
        }
        return $this;
    }
}
