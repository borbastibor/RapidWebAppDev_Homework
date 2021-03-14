<?php

namespace App\Enums;

use ReflectionClass;

abstract class BaseEnum {

    private static $constCacheArray = NULL;

    /**
     * retrieve all constants from class
     * 
     * @return array array of constants registered in the class
     */
    public static function getConstants() {
        if (self::$constCacheArray == NULL) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$constCacheArray[$calledClass];
    }

    /**
     * validates name against class constant namespace
     * 
     * @param string $name constant name
     * @param boolean $strict if true validation is done in case sensitive manner
     * @return boolean
     */
    public static function isValidName(string $name, bool $strict = false): bool {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }

    /**
     * validates value against class constant Values
     * 
     * @param mixed $value constant value
     * @param boolean $strict if true then validation checks type of needle in haystack
     * @return boolean
     */
    public static function isValidValue($value, bool $strict = true): bool {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict);
    }
}