<?php
define("VERSION","1.0.1");

/**
 * Converts a string of a key to a input name.
 *
 * @param  string $key A string of a key
 * @return string  Returns a converted string
 */
if (!function_exists('convert_input_name')) {
    function convert_input_name($key)
    {
        $parts = explode('.', $key);
        $name = array_shift($parts);
        return $name . (count($parts) > 0 ? '[' . implode('][', $parts) . ']' : '');
    }
}
if (!function_exists('unicode_str_filter')) {
    function unicode_str_filter($str)
    {
        if (!$str) {
            return false;
        }
        $unicode = array(
            'a' => array('á', 'à', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ặ', 'ằ', 'ẳ', 'ẵ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ'),
            'A' => array('Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ặ', 'Ằ', 'Ẳ', 'Ẵ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ'),
            'd' => array('đ'),
            'D' => array('Đ'),
            'e' => array('é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ'),
            'E' => array('É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ'),
            'i' => array('í', 'ì', 'ỉ', 'ĩ', 'ị'),
            'I' => array('Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị'),
            'o' => array('ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ'),
            'O' => array('Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ'),
            'u' => array('ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự'),
            'U' => array('Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự'),
            'y' => array('ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ'),
            'Y' => array('Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ'),
            '-' => array(' ', '&quot;', '.', '-–-')
        );
        foreach ($unicode as $nonUnicode => $uni) {
            foreach ($uni as $value) {
                $str = @str_replace($value, $nonUnicode, $str);
            }
            $str = preg_replace("/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/", "-",
                $str);
            $str = preg_replace("/-+-/", "-", $str);
            $str = preg_replace("/^\-+|\-+$/", "", $str);
            $str = str_replace("\\", "-", $str);
        }
        return strtolower($str);
    }
}
if (!function_exists('convert_to_string')) {
    /***
     * Convert array to string
     * Ex: [1, 2, 3] => 1|2|3
     *
     * @param $value
     * @return string
     */
    function convert_to_string($value)
    {
        if (isset($value) && is_array($value)) {
            $value = implode('|', $value);
        }
        return $value;
    }
}
if (!function_exists('convert_to_array')) {
    /***
     * Convert string to array
     * Ex: 1|2|3 => [1, 2, 3]
     *
     * @param $value
     * @return array|string
     */
    function convert_to_array($value)
    {
        if (!empty($value)) {
            $value = explode('|', $value);
        }
        return $value;
    }
}

/**
 * Formats a date.
 *
 * @param  string  $time   A date/time string
 * @param  string  $format A format parameter string
 * @return string  Returns a string formatted according format using the given timestamp
 *
 *
 **/

if (!function_exists('format_date')) {

    function format_date($time, $format = '%d/%m/%Y %H:%M:%S')
    {
        if ($time !== false and $time !== null and $time !== '' and $time !== [] and $time != '0000-00-00 00:00:00') {
            $timestamp = is_numeric($time) ? $time : strtotime($time);
            if ($timestamp !== false) {
                return strftime($format, $timestamp);
            }
        }

        return false;
    }
}

if (!function_exists('format_price')) {

    function format_price($price, $symbol ='&nbsp;vnđ')
    {
        if ($price !== false and $price !== null and $price !== '' and $price !== []) {
            $price = is_numeric($price) ? $price : 0;
            if ($price !== false) {
                return number_format($price, 0,',','.').$symbol;
            }
        }

        return false;
    }
}