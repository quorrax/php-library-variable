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

namespace Quorrax\Interfaces\Variables;

use Quorrax\Interfaces\Variable;

/**
 * @package Quorrax\Interfaces\Variables
 */
interface Boolean extends Variable
{
    /**
     * @return bool
     */
    public function getValue();

    /**
     * @param bool $value
     *
     * @return \Quorrax\Interfaces\Variables\Boolean
     */
    public function setValue($value);

    /**
     * @param bool $value
     */
    public function __construct($value = false);
}
