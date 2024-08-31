<?php
declare(strict_types=1);

function menor_faturamento_diario_mes(Array $faturamento): float
{
    $menorFaturamento = $faturamento[0]['faturamento'];

    foreach($faturamento as $f) {
        if($f['faturamento'] && $f['faturamento'] < $menorFaturamento)
            $menorFaturamento = $f['faturamento'];
    }

    return $menorFaturamento? $menorFaturamento : 0;
}

function maior_faturamento_diario_mes(Array $faturamento): float
{
    $maiorFaturamento = $faturamento[0]['faturamento'];

    foreach($faturamento as $f) {
        if($f['faturamento'] && $f['faturamento'] > $maiorFaturamento)
            $maiorFaturamento = $f['faturamento'];
    }

    return $maiorFaturamento? $maiorFaturamento : 0;
}

function qtd_dias_faturamento_acima_media(Array $faturamento): int
{
    $dias = 0;

    foreach($faturamento as $f) {
        if($f['faturamento'] > media_faturamento_mensal($faturamento))
            $dias++;
    }

    return $dias;
}

function media_faturamento_mensal(Array $faturamento): float
{
    $media = 0;
    $dias = 0;

    foreach($faturamento as $f) {
        if(!$f['faturamento']) continue;

        $media += $f['faturamento'];
        $dias++;
    }

    $media /= $dias;

    return $media;
}

$faturamento = json_decode(file_get_contents('faturamentoMensal.json'), true)['janeiro'];

printf("Menor faturamento ocorrido em um dia do mes: R$%.2f\n", menor_faturamento_diario_mes($faturamento));
printf("Maior faturamento ocorrido em um dia do mes: R$%.2f\n", maior_faturamento_diario_mes($faturamento));
printf("Quantidade de dias com faturamento acima da media: %d\n", qtd_dias_faturamento_acima_media($faturamento));