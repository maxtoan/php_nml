<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'functions.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'nml.php';

bindtextdomain(NML_GETTEXT_DOMAIN, __DIR__.DIRECTORY_SEPARATOR.'Locale');

/**
 * Custom autoloader for non-composer installations.
 * This function only load classes under 'NelsonMartell' namespace and skips in any other case.
 * If NML class file is not found, throws and exception.
 *
 * Note: If you are using "NelsonMartell" as main namespace in a file that not belongs to NML, you
 * should include it before to load "NML/autoload.php" or, using SPL autoload features, register
 * autoload function for that class(es) using "prepend" argument set to TRUE.
 * Example, if your autoload function is named "no_NML_autoload_function", you can use something
 * like:
 * spl_autoload_register("no_NML_autoload_function", true, TRUE).
 *
 *
 * @param   string  $class  NML class name (full name).
 * @return  void
 */
function autoload_NML($class)
{
    if ($class[0] == '\\') {
        $class = substr($class, 1);
    }

    $classArray = explode('\\', $class);

    if ($classArray[0] == 'NelsonMartell') {
        $classArray[0] = 'src';
    } else {
        return; // Only checks for NelsonMartell namespace.
    }

    $path = sprintf('%s'.DIRECTORY_SEPARATOR.'%s', __DIR__, implode(DIRECTORY_SEPARATOR, $classArray));

    if (is_file($path.'.php')) {
        $path .= '.php';
    } elseif (is_file($path.'.inc')) {
        $path .= '.inc';
    } else {
        throw new Exception(sprintf(dgettext('nml', 'Unable to auto-load "%s" class in Nelson Martell Library (NML): "%s" file was not found. You can see the API documentation (http://nelson6e65.github.io/php_nml/api) in order to check availability of all classes/namespaces in NML. Note: If you are using "NelsonMartell" as main namespace in a file that not belongs to NML, you should include it before to load "NML/autoload.php" or, using SPL autoload features, register autoload function for that class(es) using "prepend" argument for spl_autoload_register function set to TRUE.'), $class, $path));
    }

    require_once($path);
}

spl_autoload_register('autoload_NML');

require_once('vendor/autoload.php');
