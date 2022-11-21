<?php
$host = "localhost";
$username=  "root";
$password= "";
$db_name= "pokeloja";

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
    echo "conexão falhada!";
}
?>