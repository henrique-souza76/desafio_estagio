<?php
declare(strict_types=1);

function inverte_string(string $string, ?int $indice = null): string
{
    if(is_null($indice))
        $indice = strlen($string) - 1;

    if($indice == -1) return '';

    return $string[$indice--] . inverte_string($string, $indice);
}

echo "Digite uma string:\n";
$string = readline(">> ");

printf("String invertida: %s\n", inverte_string($string));