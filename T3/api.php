<?php

include 'db.php'; 

$requestPayload = file_get_contents("php://input");
$request = json_decode($requestPayload, true);

if (!$request) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid JSON"]);
    exit;
}

$filters = $request['filters'] ?? [];
$hindFilter = $filters['hind']['lessThan'] ?? null;
$tubeFilter = $filters['tube']['greaterThan'] ?? null;
$query = "SELECT COUNT(*) as recordCount FROM real_estate WHERE 1=1";
$params = [];

if (!is_null($hindFilter)) {
    $query .= " AND hind < :hind";
    $params[':hind'] = $hindFilter;
}

if (!is_null($tubeFilter)) {
    $query .= " AND tube > :tube";
    $params[':tube'] = $tubeFilter;
}

try {
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode(["recordCount" => $result['recordCount']]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Query failed: " . $e->getMessage()]);
}
