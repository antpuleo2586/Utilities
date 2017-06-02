<?php

namespace Ant\Utilities;

class Strings
{

    /**
     * Check if a string contains emoji
     *
     * Altered from: https://stackoverflow.com/questions/12807176/php-writing-a-simple-removeemoji-function
     *
     * @param string $string
     * @return bool
     */
    public static function containsEmoji(string $string) : bool
    {
        // Match Emoticons
        $regexEmoticons = '/[\x{1F600}-\x{1F64F}]/u';
        if (preg_match($regexEmoticons, $string)) {
            return true;
        }

        // Match Miscellaneous Symbols and Pictographs
        $regexSymbols = '/[\x{1F300}-\x{1F5FF}]/u';
        if (preg_match($regexSymbols, $string)) {
            return true;
        }

        // Match Transport And Map Symbols
        $regexTransport = '/[\x{1F680}-\x{1F6FF}]/u';
        if (preg_match($regexTransport, $string)) {
            return true;
        }

        // Match Miscellaneous Symbols
        $regexMisc = '/[\x{2600}-\x{26FF}]/u';
        if (preg_match($regexMisc, $string)) {
            return true;
        }

        // Match Dingbats
        $regexDingbats = '/[\x{2700}-\x{27BF}]/u';
        if (preg_match($regexDingbats, $string)) {
            return true;
        }

        // Match Flags
        $regexDingbats = '/[\x{1F1E6}-\x{1F1FF}]/u';
        if (preg_match($regexDingbats, $string)) {
            return true;
        }

        // Others
        $regexDingbats = '/[\x{1F910}-\x{1F95E}]/u';
        if (preg_match($regexDingbats, $string)) {
            return true;
        }
        $regexDingbats = '/[\x{1F980}-\x{1F991}]/u';
        if (preg_match($regexDingbats, $string)) {
            return true;
        }

        $regexDingbats = '/[\x{1F9C0}]/u';
        if (preg_match($regexDingbats, $string)) {
            return true;
        }

        $regexDingbats = '/[\x{1F9F9}]/u';
        if (preg_match($regexDingbats, $string)) {
            return true;
        }

        return false;

    }

    /**
     * Check if a string contains HTML (< or >)
     *
     * @param string $string
     * @return bool
     */
    public static function containsHtml(string $string) : bool
    {
        return preg_match('/<|>/', $string) !== 0;
    }
}
