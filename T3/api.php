<?php
include 'db.php';

$input = json_decode(file_get_contents('php://input'), true);

$hind = $input['hind'] ?? null;
$tube = $input['tube'] ?? null;

$query = "select * from real_estate where hind < (:hind) and tube > (:tube)";
$stmt = $pdo->prepare($query);
$stmt->execute(['hind' => $hind, 'tube'=>$tube]);
$res = $stmt->fetch(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($res);