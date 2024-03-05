<?php

function angkaKeRupiah($angka): string
{
    $formatted = 'Rp ' . number_format($angka, 0, '', '.');
    return $formatted;
}

function rupiahKeAngka($rupiah): int
{
    $cleanString = preg_replace('/([^0-9\.,])/i', '', $rupiah);
    $onlyNumbersString = preg_replace('/([^0-9])/i', '', $rupiah);

    $separatorsCountToBeErased = strlen($cleanString) - strlen($onlyNumbersString) - 1;

    $stringWithCommaOrDot = preg_replace('/([,\.])/', '', $cleanString, $separatorsCountToBeErased);
    $removedThousandSeparator = preg_replace('/(\.|,)(?=[0-9]{3,}$)/', '',  $stringWithCommaOrDot);

    return (int) str_replace(',', '.', $removedThousandSeparator);
}
