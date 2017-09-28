<?php

/**
 * Converts a string of a key to a input name.
 *
 * @param  string  $key A string of a key
 * @return string  Returns a converted string
 */
if ( ! function_exists('convert_input_name'))
{
    function convert_input_name($key)
    {
        $parts = explode('.', $key);
        $name  = array_shift($parts);

        return $name.(count($parts) > 0 ? '['.implode('][', $parts).']' : '');
    }
}
