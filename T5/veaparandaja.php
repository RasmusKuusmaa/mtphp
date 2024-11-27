<?php

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $parandatud_tekst = $_POST['tekst'];
    $words = ['et', 'sets', 'aga', 'kui', 'vaid', 'ent', 'nagu', 'kuni'];

    foreach ($words as $word){
        $parandatud_tekst = str_replace(' '. $word . ' ', ', '. $word . ' ', $parandatud_tekst);
    }
    header("Location: index.php?parandatud_tekst=" . urlencode($parandatud_tekst));
    exit();
}