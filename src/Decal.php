<?php declare(strict_types=1);

class Decal
{
    static function print(array $array, string $name = 'decal'): void
    {
        static::variable($name);
        static::array($array);
        static::semicolon();
    }

    private static function array(array $array, int $level = 0): void
    {
        $isAssociative = static::isAssociative($array);
        $count = count($array);
        static::output('[' . PHP_EOL);

        $i = 0;
        foreach ($array as $key => $value) {
            static::space($level + 1);

            if ($isAssociative) {
                static::key($key);
            }
            is_array($value) ? static::array($value, $level + 1) : static::value($value);

            if (++$i < $count) {
                static::output(',');
            }

            static::output(PHP_EOL);
        }

        static::space($level);
        static::output( ']');
    }

    private static function isAssociative(array $array): bool
    {
        return array_keys($array) !== range(0, count($array) - 1);
    }

    private static function key($key)
    {
        static::value($key);
        static::output(' => ');
    }

    private static function space(int $level): void
    {
        static::output(str_repeat(' ', 4 * $level));
    }

    private static function value($value): void
    {
        if (is_null($value)) {
            static::null();
        } else {
            $output = is_string($value) ? static::quote($value) : $value;
            static::output((string) $output);
        }
    }

    private static function null(): void
    {
        static::output('null');
    }

    private static function quote(string $value): string
    {
        return '\'' . $value . '\'';
    }

    private static function variable(string $name): void
    {
        static::output('$' . $name . ' = ');
    }

    private static function semicolon()
    {
        static::output(';' . PHP_EOL);
    }

    private static function output(string $output): void
    {
        echo $output;
    }
}