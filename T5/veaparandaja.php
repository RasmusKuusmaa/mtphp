<?php

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $parandatud_tekst = $_POST['tekst'];
    $parandatud_tekst .= " > Parandatud";
    
    header("Location: index.php?parandatud_tekst=" . urlencode($parandatud_tekst));
    exit();
}