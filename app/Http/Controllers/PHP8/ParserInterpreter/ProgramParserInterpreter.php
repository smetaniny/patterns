<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter;

use App\Http\Controllers\PHP8\ParserInterpreter\Markers\MarkParse;
use Exception;

class ProgramParserInterpreter
{
    /**
     * @throws Exception
     */
    public function index() {
        $input = 'five';
        $statement = "( \$input equals 'five')";
        $engine = new MarkParse($statement);
        $result = $engine->evaluate($input);
        print "Ввод: $input Вычисление: $statement\n";
        if ($result) {
            print "Истинно!\n";
        } else {
            print "Ложно!\n";
        }
    }
}
