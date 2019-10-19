
<?php

if(isset($_POST['submit'])){

    require '../Assignment/database.php';

    $username =$_POST['username'];
    $password =$_POST['password'];

    if(empty($username || empty($password))){
        header("Location:../Assignment/login1.php?error=emptyfields");
        exit();

    }
    else{
        $sql ="SELECT * FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../Assignment/login1.php?error=sqlerror");
            exit();

        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
             $pwdCheck = password_verify($password, $row['users_pwd']);
            //  if($pwdCheck == false){
            //     header("Location: ../Assignment/login1.php?error=wrongpassword");
                
            //     exit();
            //  }
            //  else 
            if($pwdCheck == true){
                session_start();
                $_SESSION['users_ID'] = $row['users_ID'];
                $_SESSION['username'] =$row['username'];

                header("Location: ../Assignment/HOMEPAGE.html?login=success");
                exit();

             }
             else{
                header("Location: ../Assignment/HOMEPAGE.html?login=success");
                exit();

             }

            }
            else{
                header("Location: ../Assignment/login1.php?error=nouser");
                 exit();

            }
                
        }


    }



}

else {
    header("Location:../login1.php");
    exit();
}

