<?php
declare(strict_types=1);

function menor_faturamento_diario_mes(Array $faturamento): float
{
    $menorFaturamento = $faturamento[0]['valor'];

    foreach($faturamento as $f) {
        if($f['valor'] && $f['valor'] < $menorFaturamento)
            $menorFaturamento = $f['valor'];
    }

    return $menorFaturamento? $menorFaturamento : 0;
}

function maior_faturamento_diario_mes(Array $faturamento): float
{
    $maiorFaturamento = $faturamento[0]['valor'];

    foreach($faturamento as $f) {
        if($f['valor'] && $f['valor'] > $maiorFaturamento)
            $maiorFaturamento = $f['valor'];
    }

    return $maiorFaturamento? $maiorFaturamento : 0;
}

function qtd_dias_faturamento_acima_media(Array $faturamento): int
{
    $dias = 0;

    foreach($faturamento as $f) {
        if($f['valor'] > media_faturamento_mensal($faturamento))
            $dias++;
    }

    return $dias;
}

function media_faturamento_mensal(Array $faturamento): float
{
    $media = 0;
    $dias = 0;

    foreach($faturamento as $f) {
        if(!$f['valor']) continue;

        $media += $f['valor'];
        $dias++;
    }

    $media /= $dias;

    return $media;
}

$faturamento = json_decode(file_get_contents('dados.json'), true);

printf("Menor faturamento ocorrido em um dia do mes: R$%.4f\n", menor_faturamento_diario_mes($faturamento));
printf("Maior faturamento ocorrido em um dia do mes: R$%.4f\n", maior_faturamento_diario_mes($faturamento));
printf("Quantidade de dias com faturamento acima da media: %d\n", qtd_dias_faturamento_acima_media($faturamento));