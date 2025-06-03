<?php 

require_once '../config/database.php';
require_once '../includes/functions.php';

$error = '';

if ($_POST) {
    
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);

}

$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->prepare("SELECT * from users WHERE username = ? OR email = ? ");
$stmt->execute(['$username, $username']);

$user = $stmt->fetch(PDO::FETCH_ASSOC);


if 