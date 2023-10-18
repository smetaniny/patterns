<?php

namespace app\Http\Controllers\PHP8\Parser;

class Scanner
{
    // Константы, представляющие типы токенов
    public const WORD = 1;
    public const QUOTE = 2;
    public const APOS = 3;
    public const WHITESPACE = 6;
    public const EOL = 8;
    public const CHAR = 9;
    public const EOF = 0;
    public const SOF = -1;

    protected int $line_no = 1; // Номер текущей строки
    protected int $char_no = 0; // Номер текущего символа
    protected ?string $token = null; // Текущий токен
    protected int $token_type = -1; // Тип текущего токена


    /**
     * Конструктор класса Scanner.
     *
     * @param Reader $r Объект Reader для доступа к исходным данным.
     * @param Context $context Объект Context для хранения данных сканирования.
     */
    public function __construct(
        private Reader  $r,
        private Context $context
    )
    {
    }


    /**
     * Возвращает объект Context, содержащий информацию о сканировании.
     *
     * @return Context Объект Context.
     */
    public function getContext(): Context
    {
        return $this->context;
    }

    // Далее идут методы, предназначенные для работы со сканированными токенами, их типами и состоянием сканера.
    // Каждый метод возвращается соответствующий результат или информацию о текущем состоянии сканера.

    /**
     * Пропускает пробельные символы и символы конца строки, подсчитывая количество пропущенных символов.
     *
     * @return int Количество пропущенных пробельных символов и символов конца строки.
     */
    public function eatWhiteSpace(): int
    {
        $ret = 0;

        // Проверяем, если текущий токен не является пробельным или символом конца строки (EOL), то возвращаем ноль.
        if (
            $this->token_type != self::WHITESPACE &&
            $this->token_type != self::EOL
        ) {
            return $ret;
        }

        // В цикле пропускаем пробельные символы и символы конца строки, увеличивая счетчик $ret.
        while (
            $this->nextToken() == self::WHITESPACE ||
            $this->token_type == self::EOL
        ) {
            $ret++;
        }

        // Возвращаем количество пропущенных символов.
        return $ret;
    }


    /**
     * Получает строковое представление типа токена по его целочисленному значению.
     *
     * @param int $int (необязательный) Целочисленное значение типа токена.
     *
     * @return string|null Строковое представление типа токена или null, если переданное значение некорректно.
     */
    public function getTypeString(int $int = -1): ?string
    {
        if ($int < 0) {
            $int = $this->tokenType();
        }

        // Если переданное значение меньше нуля, возвращаем null.
        if ($int < 0) {
            return null;
        }

        // Определяем соответствие между целочисленными значениями типов токенов и их строковыми представлениями.
        $resolve = [
            self::WORD => 'WORD',
            self::QUOTE => 'QUOTE',
            self::APOS => 'APOS',
            self::WHITESPACE => 'WHITESPACE',
            self::EOL => 'EOL',
            self::CHAR => 'CHAR',
            self::EOF => 'EOF'
        ];

        // Возвращаем строковое представление типа токена.
        return $resolve[$int];
    }


    /**
     * Возвращает целочисленное значение типа текущего токена.
     *
     * @return int Целочисленное значение, представляющее тип текущего токена.
     */
    public function tokenType(): int
    {
        return $this->token_type;
    }

    /**
     * Получает содержимое текущего токена.
     *
     * @return string|null Содержимое текущего токена, или null, если токен пуст.
     */
    public function token(): ?string
    {
        return $this->token;
    }

    /**
     * Проверяет, является ли текущий токен словом.
     *
     * @return bool true, если текущий токен - слово, иначе false.
     */
    public function isWord(): bool
    {
        return ($this->token_type == self::WORD);
    }

    /**
     * Проверяет, является ли текущий токен символом кавычек.
     *
     * @return bool true, если текущий токен - символ кавычек, иначе false.
     */
    public function isQuote(): bool
    {
        return ($this->token_type == self::APOS ||
            $this->token_type == self::QUOTE);
    }

    /**
     * Возвращает номер текущей строки в исходном тексте.
     *
     * @return int Номер текущей строки.
     */
    public function lineNo(): int
    {
        return $this->line_no;
    }

    /**
     * Возвращает номер текущего символа в исходном тексте.
     *
     * @return int Номер текущего символа.
     */
    public function charNo(): int
    {
        return $this->char_no;
    }

    /**
     * Клонирует данный объект Scanner.
     */
    public function clone(): void
    {
        $this->r = clone($this->r);
    }

    /**
     * Переход к следующему токену в исходном файле.
     * Устанавливает текущий токен и отслеживает номер строки и номер символа.
     *
     * @return int Тип текущего токена после перехода.
     */
    public function nextToken(): int
    {
        $this->token = null;
        $type = -1;

        while (!is_bool($char = $this->getChar())) {
            if ($this->isEolChar($char)) {
                // Если символ - конец строки, обрабатываем его
                $this->token = $this->manageEolChars($char);
                $this->line_no++;
                $this->char_no = 0;
                // Устанавливаем тип токена как конец строки
                return ($this->token_type = self::EOL);
            } elseif ($this->isWordChar($char)) {
                // Если символ - часть слова, обрабатываем его
                $this->token = $this->eatWordChars($char);
                $type = self::WORD;
            } elseif ($this->isSpaceChar($char)) {
                // Если символ - пробельный, устанавливаем его как текущий токен
                $this->token = $char;
                $type = self::WHITESPACE;
            } elseif ($char == "'") {
                // Если символ - апостроф, устанавливаем его как текущий токен
                $this->token = $char;
                $type = self::APOS;
            } elseif ($char == '"') {
                // Если символ - кавычки, устанавливаем их как текущий токен
                $this->token = $char;
                $type = self::QUOTE;
            } else {
                // В остальных случаях считаем символ обычным
                $type = self::CHAR;
                $this->token = $char;
            }
            $this->char_no += strlen($this->token());
            // Устанавливаем тип текущего токена после обработки
            return ($this->token_type = $type);
        }

        // Устанавливаем тип токена как конец файла, если достигнут конец файла
        return ($this->token_type = self::EOF);
    }

    /**
     * Возвращает массив, содержащий тип и содержимое следующего токена.
     *
     * @return array[int, string] Массив, в котором первый элемент - тип токена, второй - его содержимое.
     */
    public function peekToken(): array
    {
        $state = $this->getState();
        $type = $this->nextToken();
        $token = $this->token();
        $this->setState($state);
        return [$type, $token];
    }

    /**
     * Получает объект типа ScannerState, содержащий текущую позицию сканера в исходном файле и сведения о текущем токене.
     *
     * @return ScannerState Объект ScannerState с текущим состоянием сканера.
     */
    public function getState(): ScannerState
    {
        $state = new ScannerState();
        $state->line_no = $this->line_no;
        $state->char_no = $this->char_no;
        $state->token = $this->token;
        $state->token_type = $this->token_type;
        $state->r = clone($this->r);
        $state->context = clone($this->context);
        return $state;
    }

    /**
     * Использует объект ScannerState для восстановления состояния сканера.
     *
     * @param ScannerState $state Объект ScannerState, содержащий сохраненное состояние сканера.
     */
    public function setState(ScannerState $state): void
    {
        $this->line_no = $state->line_no;
        $this->char_no = $state->char_no;
        $this->token = $state->token;
        $this->token_type = $state->token_type;
        $this->r = $state->r;
        $this->context = $state->context;
    }

    /**
     * Возвращает следующий символ из исходного файла.
     *
     * @return string|bool Следующий символ, либо логическое значение true, если достигнут конец файла.
     */
    private function getChar(): string|bool
    {
        return $this->r->getChar();
    }

    /**
     * Возвращает все символы, составляющие слово.
     *
     * @param string $char Символ, с которого начинается слово.
     *
     * @return string Строка, содержащая все символы слова.
     */
    private function eatWordChars(string $char): string
    {
        $val = $char;
        while ($this->isWordChar($char = $this->getChar())) {
            $val .= $char;
        }
        if ($char) {
            $this->pushBackChar();
        }
        return $val;
    }

    /**
     * Перемещение в исходном тексте на один символ назад.
     */
    private function pushBackChar(): void
    {
        $this->r->pushBackChar();
    }

    /**
     * Проверяет, является ли аргумент символом слова.
     *
     * @param mixed $char Символ для проверки.
     *
     * @return bool true, если символ является символом слова, иначе false.
     */
    private function isWordChar($char): bool
    {
        if (is_bool($char)) {
            return false;
        }
        return (preg_match("/[A-Za-z0-9_\-]/", $char) === 1);
    }

    /**
     * Проверяет, является ли аргумент пробельным символом.
     *
     * @param string $char Символ для проверки.
     *
     * @return bool true, если символ является пробельным символом, иначе false.
     */
    private function isSpaceChar(string $char): bool
    {
        return (preg_match("/\t|/", $char) === 1);
    }

    /**
     * Проверяет, является ли аргумент символом конца строки.
     *
     * @param string $char Символ для проверки.
     *
     * @return bool true, если символ является символом конца строки, иначе false.
     */
    private function isEolChar(string $char): bool
    {
        $check = preg_match("/\n|\r/", $char);
        return ($check === 1);
    }

    /**
     * Поглощает символы \n, \r или \r\n и возвращает соответствующую строку.
     *
     * @param string $char Символ для обработки.
     *
     * @return string Строка, содержащая один или два символа, в зависимости от типа символов.
     */
    private function manageEolChars(string $char): string
    {
        if ($char == "\r") {
            $next_char = $this->getChar();
            if ($next_char == "\n") {
                return "{$char}{$next_char}";
            } else {
                $this->pushBackChar();
            }
        }
        return $char;
    }

    /**
     * Возвращает текущую позицию в исходном файле.
     *
     * @return int Текущая позиция в файле.
     */
    public function getPos(): int
    {
        return $this->r->getPos();
    }

}
