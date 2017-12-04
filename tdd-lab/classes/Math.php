<?php
/**
 * Created by PhpStorm.
 * User: sheldonlynn
 * Date: 2017-11-23
 * Time: 5:02 PM
 */

class Math {
    public static function getSquareArea($num) {
        if (!is_numeric($num)) {
            throw new InvalidArgumentException($num . ' is not a valid square side value...must be numeric');
        }
        return $num * $num;
    }

    public static function getCircleArea($radius) {
        return 3.14159 * $radius * $radius;
    }

    public static function getSum($a, $b) {
        return $a + $b;
    }

    public static function getMd5Hash($str) {
        return md5($str);
    }
}