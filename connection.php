<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname_kassa = "kassa";
$dbname_users = "users";

$db_kassa = mysqli_connect($servername, $username, $password, $dbname_kassa);
$db_users = mysqli_connect($servername, $username, $password, $dbname_users);
