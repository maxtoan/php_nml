<?php
/**
 * PHP: Nelson Martell Library file
 *
 * Content:
 * - Interface definition
 *
 * Copyright © 2016-2017 Nelson Martell (http://nelson6e65.github.io)
 *
 * Licensed under The MIT License (MIT)
 * For full copyright and license information, please see the LICENSE
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright 2016-2017 Nelson Martell
 * @link      http://nelson6e65.github.io/php_nml/
 * @since     v0.6.1
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License (MIT)
 * */

namespace NelsonMartell;

/**
 * Provides methods to convert objets into string representations.
 *
 * @author Nelson Martell <nelson6e65@gmail.com>
 * @since  v0.6.1
 * */
interface IConvertibleToString
{
    /**
     * Gets the string representation of this instance.
     *
     * @return string
     */
    public function toString();

    /**
     * Gets the implicit string representation of this instance.
     *
     * @return string
     */
    public function __toString();
}
