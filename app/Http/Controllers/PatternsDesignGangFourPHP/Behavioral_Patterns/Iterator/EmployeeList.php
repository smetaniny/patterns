<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Iterator;

// Создание коллекции сотрудников
class EmployeeList implements AbstractList {
    private $employees = [];

    public function add(Employee $employee) {
        $this->employees[] = $employee;
    }

    public function count() {
        return count($this->employees);
    }

    public function get($index) {
        return $this->employees[$index];
    }
}
