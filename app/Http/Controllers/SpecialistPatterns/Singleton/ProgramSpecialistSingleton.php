<?php

namespace App\Http\Controllers\SpecialistPatterns\Singleton;

class ProgramSpecialistSingleton
{
    public static function index() {
        {
            // Создаем экземпляры Singleton1 и получаем их
            $s1 = Singleton1::getInstance();
            $s2 = Singleton1::getInstance();
            echo $s1 . "<br />";
            echo $s2 . "<br />";
        }
        {
            // Создаем экземпляры Singleton2 и получаем их
            $s1 = Singleton2::getInstance();
            $s2 = Singleton2::getInstance();
            echo $s1 . "<br />";
            echo $s2 . "<br />";
        }
        {
            // Создаем экземпляры Singleton3 и получаем их
            $s1 = Singleton3::getInstance();
            $s2 = Singleton3::getInstance();
            echo $s1 . "<br />";
            echo $s2 . "<br />";
        }
    }
}
