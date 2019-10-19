<?php

if(isset($_POST['submit'])){

    require '../Assignment/database.php';

    $username =$_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        header("Location:../Assignment/signup.php?error=emptyfields&username=".$username); 
        exit();
    }

    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location:../Assignment/signup.php?error=invalidUsername"); 
        exit();
    }

    // if users want to sign up with a username that alrd exists
    else{
        // prepare statement is a way for us to run sql in the database without 
        //ANY person coming into website and destroy the databse by writing code in the input field
        $sql ="SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        // check for error first
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location:../Assignment/signup.php?error=sqlerror"); 
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck= mysqli_stmt_num_rows($stmt);

            if($resultCheck >0){
                header("Location:../Assignment/signup.php?error=usertaken"); 
                exit(); 
            }
            else{


            $sql= "INSERT INTO users(username , users_pwd) VALUES(?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../Assignment/signup.php?error=sqlerror"); 
                exit();

            }

            else{
                // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ss", $username, $password);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                header("Location: ../Assignment/login1.php?signup=success"); 
                exit();
            }


        }
    }
    
}

mysqli_stmt_close($stmt);
mysqli_close($conn);



}

else{

    header("Location:signup.php"); 
    exit();
     }

?>

