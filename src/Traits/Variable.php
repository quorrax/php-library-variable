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

namespace Quorrax\Traits;

use Exception;
use Quorrax\Classes\Boolean;
use Quorrax\Classes\Character;
use Quorrax\Interfaces\Variables\Character as CharacterInterface;

/**
 * @package Quorrax\Traits
 */
trait Variable
{
    /**
     * @param callable $function
     *
     * @return \Quorrax\Interfaces\Variables\Boolean
     */
    private function is($function)
    {
        return new Boolean(call_user_func($function, $this->getValue()));
    }

    /**
     * @param string $return
     *
     * @return \Quorrax\Interfaces\Variables\Character
     * @throws \Exception
     */
    public function getType($return = Character::class)
    {
        if (is_a($return, CharacterInterface::class, true)) {
            return new $return(gettype($this->getValue()));
        } else {
            throw new Exception("The given argument for the {\$return} parameter is not a valid class.");
        }
    }

    /**
     * @return \Quorrax\Interfaces\Variables\Boolean
     */
    public function isArray()
    {
        return $this->is("is_array");
    }

    /**
     * @return \Quorrax\Interfaces\Variables\Boolean
     */
    public function isBoolean()
    {
        return $this->is("is_bool");
    }

    /**
     * @return \Quorrax\Interfaces\Variables\Boolean
     */
    public function isEmpty()
    {
        return new Boolean(empty($this->getValue()));
    }

    /**
     * @return \Quorrax\Interfaces\Variables\Boolean
     */
    public function isFloat()
    {
        return $this->is("is_float");
    }

    /**
     * @return \Quorrax\Interfaces\Variables\Boolean
     */
    public function isInteger()
    {
        return $this->is("is_int");
    }

    /**
     * @return \Quorrax\Interfaces\Variables\Boolean
     */
    public function isNumeric()
    {
        return $this->is("is_numeric");
    }

    /**
     * @return \Quorrax\Interfaces\Variables\Boolean
     */
    public function isObject()
    {
        return $this->is("is_object");
    }

    /**
     * @return \Quorrax\Interfaces\Variables\Boolean
     */
    public function isResource()
    {
        return $this->is("is_resource");
    }

    /**
     * @return \Quorrax\Interfaces\Variables\Boolean
     */
    public function isScalar()
    {
        return $this->is("is_scalar");
    }

    /**
     * @return \Quorrax\Interfaces\Variables\Boolean
     */
    public function isString()
    {
        return $this->is("is_string");
    }
}
