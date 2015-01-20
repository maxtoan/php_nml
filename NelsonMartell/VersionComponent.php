<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * PHP class «VersionComponent»
 *
 * Copyright © 2015 Nelson Martell (http://fb.me/nelson6e65)
 *
 * Licensed under The MIT License (MIT)
 * For full copyright and license information, please see the LICENSE
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright	Copyright © 2015 Nelson Martell
 * @link		https://github.com/nelson6e65/NelsonMartell
 * @package  	NelsonMartell
 * @license  	http://www.opensource.org/licenses/mit-license.php The MIT License (MIT)
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

namespace NelsonMartell {
	use \InvalidArgumentException;

	$_class = "VersionComponent";
	$_constant = implode('_', explode('\\', __NAMESPACE__)) . '_' . $_class;

	if (!defined($_constant)):
		define($_constant, true);

	include('IntString.php');

	/* *
	 * Representa un componente de un número de Version.
	 * Extiende la clase IntString, pero restringe los valores que puede tomar.
	 *
	 * @package  NelsonMartell
	 * @author   Nelson Martell (@yahoo.es: nelson6e65-dev)
	 * */
	class VersionComponent extends IntString implements IEquatable {

		function __construct($intValue = 0, $stringValue = '') {
			parent::__construct($intValue, $stringValue);

			//Validaciones:
			if ($this->IntValue < 0) {
				throw new InvalidArgumentException(sprintf(_('Invalid argument value. "%s" (argument %s) must be positive; "%s" given.'), '$intValue', 1, $intValue));
			}

			if ($this->StringValue != '') {
				if ($this->IntValue == 0) {
					throw new InvalidArgumentException(sprintf(_('Invalid argument value. "%s" (argument %s) has invalid format: "%s". VersionComponent can not be a text-only value. $intValue must be > 0 to append it text.'), '$stringValue', 2, $stringValue));
				}

				$pattern = '~^([a-z])$~'; // 1 char

				if (strlen($this->StringValue) > 1) {
					$start = '~^([a-z]|-)';
					$middle = '([a-z]|[0-9]|-)*';
					$end = '([a-z]|[0-9])$~';

					$pattern = $start . $middle . $end;
				}

				$correct = (boolean) preg_match($pattern, $this->StringValue);

				if ($correct) {
					//Último chequeo: que no hayan 2 '-' consecutivos.
					$correct = strpos($this->StringValue, '--') == false ? true : false;
				}

				if (!$correct) {
					throw new InvalidArgumentException(sprintf(_('Invalid argument value. "%s" (argument %s) has invalid chars: "%s".'), '$stringValue', 2, $stringValue));
				}

			}

		}

		public static function Parse($value) {
			if ($value instanceof VersionComponent) {
				return $value;
			}

			$s = parent::Parse($value);

			$r = new VersionComponent($s->IntValue, $s->StringValue);

			return $r;
		}

	}

	endif;
}