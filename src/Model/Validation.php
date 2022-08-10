<?php
namespace APP\Model;

class Validation
{
    public static function validateName(string $nome):bool
    {
        return mb_strlen($nome) > 2;
    }
    public static function validateNumber(int|float $value)
    {
        return $value > 0 && $value < 99;
    }
   
}