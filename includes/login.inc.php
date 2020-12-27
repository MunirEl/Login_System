<?php

if(isset($_POST["submit"]))
{
    $email    = $_POST["email"];
    $pwd = $_POST["password"];

    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__.'/includes/dbConection.inc.php');
    //require_once(__ROOT__.'/functions.inc.php');
    //require_once("dbConnection.inc.php");
    require_once(__ROOT__.'/includes/functions.inc.php');


    if(emptyInputLogin($email, $pwd) !== false)
    {
        header("location: ../login.php?error=emptyInput");
        exit();
    }

    if(invalidEmail($email) !== false)
    {
        header("location: ../login.php?error=invalidEmail");
        exit();
    }
    loginUser($conn, $email, $pwd);
}
else
{   
    header("location: ../login.php");
}