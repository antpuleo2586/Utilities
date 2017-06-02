<?php

namespace Ant\Utilities;

class Arrays
{

    /**
     * Takes values from $array2 which have the same key as $array1 and stores them in $to array
     * If a key is not present in $array2, but present in $array1, will take the value from $array1
     *
     * Works recursively for multidimensional associative arrays
     *
     * @param array $array1
     * @param array $array2
     * @param array $to
     * @return array
     */
    public static function merge(array $array1, array $array2, array $to = []) : array
    {

        // Loop $array1
        foreach ($array1 as $key => $value) {

            // If the key exists in $array2
            if (isset($array2[$key])) {
                // If we have an array
                if (is_array($value)) {
                    // If the array is empty, set the data
                    if (count($value) == 0) {
                        $to[$key] = $array2[$key];
                    } else {
                        // Otherwise, call this function again with the array
                        $to[$key] = self::merge($value, $array2[$key]);
                    }

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

    /**
     * Implode an array to receive all values in the array
     *
     * Works recursively for multidimensional associative arrays
     *
     * @param array $pieces
     * @param string $glue
     * @param array $to
     * @return string
     */
    public static function implodeMulti(array $pieces, string $glue = '', array $to = []) : string
    {

        // Loop $pieces
        foreach ($pieces as $key => $value) {
            // If array, call recursively
            if (is_array($value)) {
                $to[] = self::implodeMulti($value, $glue);
            } else {
                try {
                    if ((string) $value && $value !== '') {
                        // Otherwise append, using glue
                        $to[] = $value;

                    }
                } catch (\Exception $e) {
                    // Not able to cast as string
                }

            }
        }

        // Return flattened array imploded
        return implode($to, $glue);
    }
}
