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

use Exception;
use Quorrax\Interfaces\Variable as VariableInterface;
use Quorrax\Interfaces\Variables\Collection as CollectionInterface;
use Quorrax\Traits\Variable;

/**
 * @package Quorrax\Classes
 */
class Collection implements CollectionInterface
{
    use Variable;

    /**
     * @var array
     */
    private $value = [];

    /**
     * @param mixed $value
     *
     * @return VariableInterface
     * @throws \Exception
     */
    private function cast($value)
    {
        switch (gettype($value)) {
            case "array":
                $class = Collection::class;
                break;
            case "boolean":
                $class = Boolean::class;
                break;
            case "double":
                $class = Double::class;
                break;
            case "integer":
                $class = Integer::class;
                break;
            case "string":
                $class = Character::class;
                break;
            default:
                throw new Exception("TODO: Add some description here.");
        }
        return new $class($value);
    }

    /**
     * @return array
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param array
     *
     * @return \Quorrax\Interfaces\Variables\Collection
     * @throws \Exception
     */
    public function setValue($value)
    {
        if (is_array($value)) {
            foreach ($value as $item) {
                if ($item instanceof VariableInterface) {
                    array_push($this->value, $item);
                } else {
                    array_push($this->value, $this->cast($item));
                }
            }
        } else {
            throw new Exception("The given argument for the {\$value} parameter is not an array.");
        }
        return $this;
    }

    /**
     * @param array $value
     *
     * @throws \Exception
     */
    public function __construct($value = [])
    {
        $this->setValue($value);
    }
}
