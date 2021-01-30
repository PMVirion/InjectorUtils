<?php

namespace skh6075\injectorutils;

function makeRandomPercent(float $min, float $max, float $needPercent): bool{
    return mt_rand($min, $max) <= $needPercent;
}

class InjectorMathUtils{

    public static function makeRandomPercent(float $min, float $max, float $needPercent): bool{
        return makeRandomPercent($min, $max, $needPercent);
    }
}