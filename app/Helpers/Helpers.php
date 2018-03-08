<?php
define("VERSION", "1.0.1");

/**
 * Converts a string of a key to a input name.
 *
 * @param  string $key A string of a key
 * @return string  Returns a converted string
 */
if (!function_exists('convert_input_name')) {
    function convert_input_name($key)
    {
        if (empty($key)) {
            return false;
        }
        $parts = explode('.', $key);
        $name = array_shift($parts);
        return $name . (count($parts) > 0 ? '[' . implode('][', $parts) . ']' : '');
    }
}

if (!function_exists('get_name_convert_input')) {
    function get_name_convert_input($key)
    {
        if (empty($key)) {
            return false;
        }
        $parts = explode('.', $key);
        $name = end($parts);

        return (!empty($name)) ? $name : false;
    }
}

if (!function_exists('unicode_str_filter')) {
    function unicode_str_filter($str)
    {
        if (!$str) {
            return false;
        }
        $unicode = [
            'a' => ['á', 'à', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ặ', 'ằ', 'ẳ', 'ẵ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ'],
            'A' => ['Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ặ', 'Ằ', 'Ẳ', 'Ẵ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ'],
            'd' => ['đ'],
            'D' => ['Đ'],
            'e' => ['é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ'],
            'E' => ['É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ'],
            'i' => ['í', 'ì', 'ỉ', 'ĩ', 'ị'],
            'I' => ['Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị'],
            'o' => ['ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ'],
            'O' => ['Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ'],
            'u' => ['ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự'],
            'U' => ['Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự'],
            'y' => ['ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ'],
            'Y' => ['Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ'],
            '-' => [' ', '&quot;', '.', '-–-']
        ];
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
     * Ex: [1, 2, 3] => |1|2|3|
     *
     * @param $datas
     * @return string
     */
    function convert_to_string(array $datas)
    {
        if (isset($datas) && is_array($datas) && count($datas) > 0) {
            $result = '';
            foreach($datas as $value){
                $result .= '|'.$value;
            }
            $result .= '|';
            return $result;
        }
        return false;
    }
}
if (!function_exists('convert_to_array')) {
    /***
     * Convert string to array
     * Ex: |1|2|3| => [1, 2, 3]
     *
     * @param $strings
     * @return array|string
     */
    function convert_to_array($strings)
    {
        if (!empty($strings)) {
            $value = explode('|', rtrim(ltrim($strings, '|'), '|'));
        }
        return $value;
    }
}

/**
 * Formats a date.
 *
 * @param  string $time A date/time string
 * @param  string $format A format parameter string
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

    function format_price($price, $symbol = '&nbsp;vnđ')
    {
        if ($price !== false and $price !== null and $price !== '' and $price !== []) {
            $price = is_numeric($price) ? $price : 0;
            if ($price !== false) {
                return number_format($price, 0, ',', '.') . $symbol;
            }
        }

        return false;
    }
}

if (!function_exists('limit_words')) {

    function limit_words($string, $word_limit = 20)
    {
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }
}

if (!function_exists('addParamsUrl')) {

    function addParamsUrl(array $params)
    {
        $parameters = request()->input();
        if(is_array($params) && !empty($params)){
            foreach ($params as $key => $val)
            {
                $parameters[$key] = $val;
            }
        }

        return $parameters;
    }
}