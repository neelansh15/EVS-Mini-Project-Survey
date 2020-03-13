<?php

require_once('config.php');
$conn = new mysqli($host, $username, $password, $db);

if($conn->connect_error){
    die("Connection to database failed: <br />" . $conn->connect_error);
}

echo "Connected Successfully";

?>