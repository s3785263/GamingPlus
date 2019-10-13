<?php

if(isset($_POST['submit'])){

    require '../Assignment/database.php';

    $username =$_POST['username'];
    $password =$_POST['password'];

    if(empty($username || empty($password))){
        header("Location:../login.html?error=emptyfields");
        exit();

    }
    else{
        $sql ="SELECT * FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../login.html?error=sqlerror");
            exit();

        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
             $pwdCheck = password_verify($password, $row['users_pwd']);
             if($pwdCheck == false){
                header("Location: ../login.html?error=wrongpassword");
                exit();
             }
             else if($pwdCheck == true){
                session_start();
                $_SESSION['users_ID'] = $row['users_ID'];
                $_SESSION['username'] =$row['username'];

                header("Location: ../homepage.html?login=success");
                exit();

             }
             else{
                header("Location: ../login.html?error=wrongpassword");
                exit();

             }

            }
            else{
                header("Location: ../login.html?error=nouser");
                 exit();

            }
                
        }


    }



}

else {
    header("Location:../homepage.html");
    exit();
}