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
use Quorrax\Interfaces\Variables\Character as CharacterInterface;
use Quorrax\Traits\Variable;

/**
 * @package Quorrax\Classes
 */
class Character implements CharacterInterface
{
    use Variable;

    /**
     * @var string
     */
    private $value;

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return \Quorrax\Interfaces\Variables\Character
     * @throws \InvalidArgumentException
     */
    public function setValue($value)
    {
        if (is_string($value)) {
            $this->value = $value;
        } else {
            throw new InvalidArgumentException("The given argument for the {\$value} parameter is not a string.");
        }
        return $this;
    }

    /**
     * @param string $value
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($value = "")
    {
        $this->setValue($value);
    }
}
