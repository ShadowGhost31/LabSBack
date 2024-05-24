<?php

function generatePetName($syllablesOrSymbols) {

    if (!is_array($syllablesOrSymbols)) {
        throw new Exception('Потрібно масив складів або символів');
    }


    $numSyllables = rand(2, 4);


    $name = '';
    for ($i = 0; $i < $numSyllables; $i++) {
        $name .= $syllablesOrSymbols[array_rand($syllablesOrSymbols)];
    }


    $suffixes = ['чик', 'ка', 'ся', 'ля', 'ок', 'а'];
    $name .= $suffixes[array_rand($suffixes)];


    return $name;
}


$syllables = ['ки', 'ся', 'ми', 'ша', 'ло', 'га'];
$petName = generatePetName($syllables);
echo "Ім'я тваринки: $petName";
