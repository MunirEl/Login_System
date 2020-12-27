<?php

function emptyInputSignup($fullname, $email, $pwd, $passwordRepeated)
    {
        if(empty($fullname) || empty($email) || empty($pwd) || empty( $passwordRepeated))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        return $result;
    }

    function pwdMatch($pwd, $passwordRepeated)
    {
        if($pwd !== $passwordRepeated)
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        return $result;
    }

    function emailExists($conn, $email)
    {
        $sql = "SELECT * FROM registro.users WHERE email = ?;";
        $statement = mysqli_stmt_init($conn);        
        if(!mysqli_stmt_prepare($statement, $sql))
        {
            header("location: ../signup.php?error=StatementFailed");
            exit();
        }
        mysqli_stmt_bind_param($statement, "s", $email);
        mysqli_stmt_execute($statement);

        $resultData = mysqli_stmt_get_result($statement);
        if ($row = mysqli_fetch_assoc($resultData)) 
        {
            return $row;
        }
        else
        {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($statement);
    }

    function createUser($conn, $fullname, $email, $pwd)
    {
        $sql = "INSERT INTO registro.users (fullName, email, userPassword) VALUES (?, ?, ?);";
        $statement = mysqli_stmt_init($conn);        
        if(!mysqli_stmt_prepare($statement, $sql))
        {
            header("location: ../signup.php?error=StatementFailed");
            exit();
        }
        $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($statement, "sss", $fullname, $email, $hashedPassword);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
        header("location: ../signup.php?error=none");
        exit();
    }

    function emptyInputLogin($email, $pwd)
    {
        if(empty($email) || empty($pwd))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $email, $pwd)
    {
        $userExists = emailExists($conn, $email);

        if ($userExists === false) 
        {
            header("location: ../login.php?error=UserDoesntExist");
            exit();
        }

        $pwd_hashed = $userExists['userPassword'];
        $checkPwd = password_verify($pwd, $pwd_hashed);
        
        //($checkPwd === false) 
        if ($checkPwd === false) 
        {
            header("location: ../login.php?error=$checkPwd");
            //header("location: ../login.php?error=passwordsDontMatch");
            exit();
            //($checkPwd === true)
        }elseif ($checkPwd === true)
        {
            session_start();
            $_SESSION['user_id'] = $userExists['id'];
            $_SESSION['name'] = $userExists['fullName'];
            header("location: ../index.php");
            exit();
        }
    }