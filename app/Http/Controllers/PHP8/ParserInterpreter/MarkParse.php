<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter;


use Exception;

class MarkParse
{
    // Парсер для выражения
    private Parser $expression;
    // Парсер для операнда
    private Parser $operand;
    // Интерпретатор
    private Expression $interpreter;

    /**
     * Конструктор класса MarkParse.
     *
     * @param string $statement Входное выражение для компиляции.
     *
     * @throws Exception
     */
    public function __construct(string $statement)
    {
        $this->compile($statement);
    }

    /**
     * Вычисляет скомпилированное выражение, используя предоставленный ввод.
     *
     * @param mixed $input Входные данные.
     *
     * @return mixed Результат вычисления.
     */
    public function evaluate(mixed $input): mixed
    {
        $icontext = new InterpreterContext();
        $prefab = new VariableExpression('input', $input);
        // Добавление входной переменной в Context
        $prefab->interpret($icontext);
        $this->interpreter->interpret($icontext);
        return $icontext->lookup($this->interpreter);
    }

    /**
     * Компилирует входное выражение в дерево выражения.
     *
     * @param string $statementStr Входное выражение для компиляции.
     *
     * @throws Exception Если произошли ошибки в процессе разбора или сканирования.
     */
    public function compile($statementStr): void
    {
        // Создание контекста для разбора и сканирования.
        $context = new Context();
        $scanner = new Scanner(new StringReader($statementStr), $context);
        $statement = $this->expression();
        $scanresult = $statement->scan($scanner);

        // Проверка на наличие ошибок разбора или оставшихся токенов.
        if (!$scanresult || $scanner->tokenType() != Scanner::EOF) {
            $msg = " строка: {$scanner->lineNo()} ";
            $msg .= " символ: {$scanner->charNo()}";
            $msg .= " токен: {$scanner->token()}\n";
            throw new Exception($msg);
        }
        $this->interpreter = $scanner->getContext()->popResult();
    }

    /**
     * Создает и возвращает парсер выражения.
     *
     * @return Parser Парсер выражения.
     * @throws Exception
     */
    public function expression(): Parser
    {
        if (!isset($this->expression)) {
            $this->expression = new SequenceParse();
            $this->expression->add($this->operand());
            $bools = new RepetitionParse();
            $whichbool = new AlternationParse();
            $whichbool->add($this->orExpr());
            $whichbool->add($this->andExpr());
            $bools->add($whichbool);
            $this->expression->add($bools);
        }
        return $this->expression;
    }

    /**
     * Создает и возвращает парсер для оператора OR.
     *
     * @return Parser Парсер для оператора OR.
     * @throws Exception
     */
    public function orExpr(): Parser
    {
        $or = new SequenceParse();
        $or->add(new WordParse('or'))->discard();
        $or->add($this->operand());
        $or->setHandler(new BooleanOrHandler());
        return $or;
    }


    /**
     * Создает и возвращает парсер для оператора AND.
     *
     * @return Parser Парсер для оператора AND.
     * @throws Exception
     */
    public function andExpr(): Parser
    {
        $and = new SequenceParse();
        $and->add(new WordParse('and'))->discard();
        $and->add($this->operand());
        $and->setHandler(new BooleanAndHandler());
        return $and;
    }

    /**
     * Создает и возвращает парсер операнда.
     *
     * @return Parser Парсер операнда.
     * @throws Exception
     */
    public function operand(): Parser
    {
        if (!isset($this->operand)) {
            $this->operand = new SequenceParse();
            $comp = new AlternationParse();
            $exp = new SequenceParse();
            $exp->add(new CharacterParse('('))->discard();
            $exp->add($this->expression());
            $exp->add(new CharacterParse(')'))->discard();
            $comp->add($exp);
            $comp->add(new StringLiteralParse())
                ->setHandler(new StringLiteralHandler());
            $comp->add($this->variable());
            $this->operand->add($comp);
            $this->operand->add(
                new RepetitionParse())->add($this->eqExpr());
        }
        return $this->operand;
    }

    /**
     * Создает и возвращает парсер для оператора "equals".
     *
     * @return Parser Парсер для оператора "equals".
     * @throws Exception
     */
    public function eqExpr(): Parser
    {
        $equals = new SequenceParse();
        $equals->add(new WordParse('equals'))->discard();
        $equals->add($this->operand());
        $equals->setHandler(new EqualsHandler());
        return $equals;
    }

    /**
     * Создает и возвращает парсер для переменных.
     *
     * @return Parser Парсер для переменных.
     * @throws Exception
     */
    public function variable(): Parser
    {
        $variable = new SequenceParse();
        $variable->add(new CharacterParse('$'))->discard();
        $variable->add(new WordParse());
        $variable->setHandler(new VariableHandler());
        return $variable;
    }

}
