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
use Quorrax\Interfaces\Variables\Integer as IntegerInterface;
use Quorrax\Traits\Variable;

/**
 * @package Quorrax\Classes\Variables
 */
class Integer implements IntegerInterface
{
    use Variable;

    /**
     * @var int
     */
    private $value;

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     *
     * @return \Quorrax\Interfaces\Variables\Integer
     * @throws \Exception()
     */
    public function setValue($value)
    {
        if (is_int($value)) {
            $this->value = $value;
        } else {
            throw new Exception("The given argument for the {\$value} property is not an integer.");
        }
        return $this;
    }

    /**
     * @param int $value
     *
     * @throws \Exception
     */
    public function __construct($value = 0)
    {
        $this->setValue($value);
    }
}
