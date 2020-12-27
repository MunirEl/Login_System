<?php

$servidor = "127.0.0.1";
$username = "root";
$password = "";
$dbName   = "registro";

$conn = mysqli_connect($servidor, $username, $password, $dbName);

if(!$conn)
{
    die("Connection Failed: ". mysqli_connect_error());
}