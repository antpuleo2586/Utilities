<?php

namespace Ant\Utilities;

class Arrays
{

    /**
     * Helper function
     * Takes any values from $array2 which have the same key as $array1
     * And stores them in the $to array
     * If a key is not present in $array2, but present in $array1, will take the
     * value from $array1
     *
     * Works recursively for multidimensional associative arrays
     *
     * @param array $array1
     * @param array $array2
     * @param array $to
     * @return array
     */
    public static function mergeArrays(array $array1, array $array2, array $to) : array
    {

        // Loop $array1
        foreach ($array1 as $key => $value) {

            // If the key exists in $array2
            if (isset($array2[$key])) {
                // If we have an array, call this function again with the array
                if (is_array($value)) {
                    $to[$key] = self::mergeArrays($value, $array2[$key], []);
                } else {
                    // Otherwise set the value for this key from $array2
                    $to[$key] = $array2[$key];
                }
            } else {
                // Otherwise set the value from $array1
                $to[$key] = $value;
            }
        }

        return $to;
    }
}
