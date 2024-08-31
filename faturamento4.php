<?php
declare(strict_types=1);

define("SP", 67836.43);
define("RJ", 36678.66);
define("MG", 29229.88);
define("ES", 27165.48);
define("OUTROS", 19849.53);
define("TOTAL", SP + RJ + MG + ES + OUTROS);

function percentual_representacao(float $faturamento): float
{
    $percentual = $faturamento / TOTAL * 100;

    return $percentual;
}

echo "Participacao dos estados no faturamento total:\n";

printf("SP: %.2f%%\n", percentual_representacao(SP));
printf("RJ: %.2f%%\n", percentual_representacao(RJ));
printf("MG: %.2f%%\n", percentual_representacao(MG));
printf("ES: %.2f%%\n", percentual_representacao(ES));
printf("OUTROS: %.2f%%\n", percentual_representacao(OUTROS));