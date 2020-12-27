<?php

if(isset($_POST["submit"]))
{
    $fullname = $_POST["name"];
    $email    = $_POST["email"];
    $pwd = $_POST["password"];
    $passwordRepeated = $_POST["pwdRepeated"];

    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__.'/includes/dbConection.inc.php');
    //require_once(__ROOT__.'/functions.inc.php');
    //require_once("dbConnection.inc.php");
    require_once(__ROOT__.'/includes/functions.inc.php');

    if(emptyInputSignup($fullname, $email, $pwd, $passwordRepeated) !== false)
    {
        header("location: ../signup.php?error=emptyInput");
        exit();
    }

    if(invalidEmail($email) !== false)
    {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }

    if(pwdMatch($pwd, $passwordRepeated) !== false)
    {
        
        $result = pwdMatch($pwd, $passwordRepeated);
        //header("location: ../signup.php?error=".$pwd);
        header("location: ../signup.php?error=passwordsDontMatch");
        exit();
    }

    if(emailExists($conn, $email) !== false)
    {
        header("location: ../signup.php?error=userAlreadyExists");
        exit();
    }

    createUser($conn, $fullname, $email, $password);
}
else
{   
    print_r($_POST["password"]);
    //header("location: ../signup.php");
    header("location: ../index.php");
}