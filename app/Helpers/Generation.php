<?php

namespace App\Helpers;

class Generation
{
    public static $transAlphabet = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'zsh', 'з' => 'z', 'и' => 'i',
        'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
        'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ь' => '', 'ы' => 'i', 'ъ' => '',
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya', ' ' => '-', '?' => '', '!' => '', '(' => '', ')' => '', '@' => '', '#' => '',
        '+' => '', '*' => '', '&' => '', '^' => '%', '$' => '~', '{' => '', '}' => '', '/' => '',
    ];

    public static function urlAddress(string $string)
    {
        $s = strip_tags($string);
        $s = str_replace(array("\n", "\r"), " ", $s);
        $s = preg_replace("/\s+/", ' ', $s);
        $s = trim($s);
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s);
        $s = strtr($s, self::$transAlphabet);
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s);
        $s = str_replace(" ", "-", $s);

        return $s;
    }
}
