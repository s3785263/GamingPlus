
<!DOCTYPE html>
<html lang='en'>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Assignment 2</title>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link rel="stylesheet" type="text/css" href="style.css">


</head>

<body>
  <a id="home"></a>
  <header>
    <div><h1><span style="color:#D30E18" style='font-family:GALACTIC VANGUARDIAN NCV;'>G</span><span style="color:#EED802">a</span><span style="color:#41A136">m</span><span style="color:#3262AA">e</span>Plus
    <img src='Img/Logo.png' id="Logo" alt='website Logo' height="40" float="left"/>
         </h1>
    </div>
  </header>

  <nav id="navbar">
    <a href="#home">Home</a>
    <a href="#Games">Games</a>
    <a href="#GameGuide">GameGuide</a>
    <a href="#Video">Video</a>
  </nav>

  <div class="loginbox">
    <img src="../Assignment/media/avatar.png" class="avatar" alt="">
    <h1>Login Here</h1>
    <?php
    if(isset($_GET['error'])){
      if($_GET['error'] == "emptyfields"){
        echo '<p class ="signuperror"> PLEASE FILL IN ALL FIELDS!</p>';
      }
    }
    ?>
    <form method="POST" action='../Assignment/login.php' class="login-form"> 
      <p>Username</p>
      <input type="text" name="username" placeholder="Enter Username">
      <p>Password</p>
      <input type="password" name="password" placeholder="Enter Password">
      <input type="submit" name="submit" value="LogIn">
      <a href="../Assignment/signup.php">Don't have an account?</a>
      <br><br>
      <a>or connect with</a>
      <img src="../Assignment/media/facebook.png" class="facebook" alt="">
      <img src="../Assignment/media/google.png" class="google" alt="">

    </form>
    </div>

  <main>

   
    

  </main>

  

  <script src="script.js"></script>
  <script>
    window.onscroll = function () {
      scrollFunction();
    };
  </script>

</body>

</html>