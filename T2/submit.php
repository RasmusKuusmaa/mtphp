<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $text = $_POST['text'];
    $text = trim($text);
    $text = strip_tags($text);
    $text = htmlentities($text, ENT_QUOTES, 'UTF-8');
    $stmt = $pdo->prepare("insert into text (data) values (:text_content)");
    $stmt->execute(['text_content' => $text]);
    echo htmlspecialchars($text, ENT_QUOTES, 'UTF-8');   
}