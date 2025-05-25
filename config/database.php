<?php

$db_server = "localhost"; 
$db_username = "root";
$db_password = "";
$db_name = "SkillsTest";

try {
    $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

    if(!$conn) {
        throw new Exception("Connection Failed: " .mysqli_connect_error());
    }

} catch (Exception $e) {
    echo "Database not connected" . $e->getMessage();
}

?>