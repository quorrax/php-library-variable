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
    public function isBoolean()
    {
        $result = new Variable();
        if (is_bool($this->getValue())) {
            $result->setValue(true);
        } else {
            $result->setValue(false);
        }
        return $result;
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
