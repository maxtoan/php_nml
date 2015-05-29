<?php
/**
 * PHP: Nelson Martell Library file
 *
 * Content:
 * - Class definition:  [NelsonMartell\Extensions]  String
 *
 * Copyright © 2015 Nelson Martell (http://nelson6e65.github.io)
 *
 * Licensed under The MIT License (MIT)
 * For full copyright and license information, please see the LICENSE
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright  Copyright © 2015 Nelson Martell
 * @link       http://nelson6e65.github.io/php_nml/
 * @since      v0.4.1
 * @license    http://www.opensource.org/licenses/mit-license.php The MIT License (MIT)
 * */
namespace NelsonMartell\Extensions;

/**
 * Provides extension methods to handle strings.
 *
 *
 * @copyright  This class is based on Cake\Utility\String of CakePHP(tm) class.
 * @see  Original DOC of String based on: http://book.cakephp.org/3.0/en/core-libraries/string.html
 * */
class String extends \Cake\Utility\Text
{

    /**
     * Replaces format elements in a string with the string representation of an object matching the
     * list of arguments specified. You can give as many params as you need, or an array with values.
     *
     * ##Usage
     * Using numbers as placeholders (encloses between `{` and `}`), you can get the matching string
     * representation of each object given. Use `{0}` for the fist object, `{1}` for the second,
     *  and so on.
     * Example: `String::Format('{0} is {1} years old, and have {2} cats.', 'Bob', 65, 101);`
     * Returns: 'Bob is 65 years old, and have 101 cats.'
     *
     * You can also use an array to give objects values.
     * Example: `String::Format('{0} is {1} years old.', ['Bob', 65, 101]);`
     * Returns: 'Bob is 65 years old, and have 101 cats.'
     *
     * If give an key => value array, each key stands for a placeholder variable name to be replaced
     * with value key. In this case, order of keys do not matter.
     * Example:
     * `$arg0 = ['name' => 'Bob', 'n' => 101, 'age' => 65];`
     * `$format = '{name} is {age} years old, and have {n} cats.';`
     * `String::Format($format, $arg0);`
     * Returns: 'Bob is 65 years old, and have 101 cats.'
     *
     *
     * @param   string       $format  A string containing variable placeholders.
     * @param   array|mixed  $args  Object(s) to be replaced into $format placeholders.
     * @return  string
     * @todo  Implement php.net/functions.arguments.html#functions.variable-arg-list.new for PHP 5.6+
     * @todo  Implement formatting, like IFormatProvider or something like that.
     * @author  Nelson Martell <nelson6e65-dev@yahoo.es>
     */
    public static function format($format, $args)
    {
        static $options = [
            'before'  => '{',
            'after'   => '}',
        ];

        $data = func_num_args() === 2 ? (array) $args : array_slice(func_get_args(), 1);

        return static::insert($format, $data, $options);
    }

    /**
     * Ensures that object given is not null. If is `null`, throws and exception.
     *
     * @param  mixed $obj Object to validate
     * @throws InvalidArgumentException if object is `null`.
     * @return mixed         Same object
     */
    public static function ensureIsNotNull($obj)
    {
        if (is_null($obj)) {
            $msg = nml_msg('Provided object must not be NULL.');
            throw new InvalidArgumentException($msg);
        }

        return $obj;
    }

    /**
     * Ensures that object given is an string. Else, thows an exception
     *
     * @param  mixed $obj Object to validate.
     * @return string     Same object given, but ensured that is an string.
     * @throws InvalidArgumentException if object is not an `string`.
     */
    public static function ensureIsString($obj)
    {
        if (is_null($obj)) {
            $msg = nml_msg('Provided object must to be an string; "{0}" given.', typeof($obj));
            throw new InvalidArgumentException($msg);
        }

        return $obj;
    }

    /**
     * Ensures that given string is not empty.
     *
     * @param  string $string String to validate.
     * @return string         Same string given, but ensured that is not empty.
     * @throws InvalidArgumentException if string is null or empty.
     */
    public static function ensureIsNotEmpty($string)
    {
        if (static::ensureIsString($string) === '') {
            $msg = nml_msg('Provided string must not be empty.');
            throw new InvalidArgumentException($msg);
        }

        return $string;
    }

    /**
     * Ensures that given string is not empty or whitespaces.
     *
     * @param  string $string String to validate.
     * @return string          Same string given, but ensured that is not whitespaces.
     * @see    trim
     */
    public static function ensureIsNotWhiteSpaces($string)
    {
        if (trim(static::ensureIsString($string)) === '') {
            $msg = nml_msg('Provided string must not be white spaces.');
            throw new InvalidArgumentException($msg);
        }

        return $string;
    }
}
