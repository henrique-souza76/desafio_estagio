<?php
declare(strict_types=1);

function pertence_fibonacci(int $numero): bool
{
    $atual = 0;
    $proximo = 1;

    while($numero > $atual) {
        $temp = $proximo;
        $proximo += $atual;
        $atual = $temp;
    }

    return $numero == $atual? true : false;
}

echo "Digite um numero para verificar se ele faz parte da sequencia de fibonacci:\n";
$numero = intval(readline(">> "));

if(pertence_fibonacci($numero))
    printf("%d pertence a sequencia de fibonacci!\n", $numero);
else
    printf("%d nao pertence a sequencia de fibonacci!\n", $numero);