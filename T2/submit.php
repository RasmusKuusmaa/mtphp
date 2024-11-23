<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $text = $_POST['text'];
    $stmt = $pdo->prepare("insert into text (data) values (:text_content)");
    $stmt->execute(['text_content' => $text]);
    echo "text submitted";
    
}