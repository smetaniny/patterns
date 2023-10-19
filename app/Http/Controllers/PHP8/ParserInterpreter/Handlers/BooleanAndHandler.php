<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter\Handlers;

use App\Http\Controllers\PHP8\ParserInterpreter\Expressions\BooleanAndExpression;
use App\Http\Controllers\PHP8\ParserInterpreter\Interface\Handler;
use App\Http\Controllers\PHP8\ParserInterpreter\Parsers\Parser;
use App\Http\Controllers\PHP8\ParserInterpreter\Scanner\Scanner;

class BooleanAndHandler implements Handler
{

    public function handleMatch(Parser $parser, Scanner $scanner): void
    {
        $compl = $scanner->getContext()->popResult();
        $comp2 = $scanner->getContext()->popResult();
        $scanner->getContext()->pushResult(
            new BooleanAndExpression($compl, $comp2));
    }
}
