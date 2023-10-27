<?php

namespace App\Http\Controllers\PHP8\P313Singleton;

class ProgramP313Singleton
{
    public function index() {
        $pref = Preferences::getInstance();
        $pref->setProperty("name", "Серега");
        unset($pref); // Удаление ссылки

        // Демонстрация, что значение не потеряно:
        $pref2 = Preferences::getInstance();
        print $pref2->getProperty("name") . "<br />";
    }
}
