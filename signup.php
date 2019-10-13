
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
    <div>GamePlus</div>
  </header>

  <nav id="navbar">
    <a href="#home">Home</a>
    <a href="#Games">Games</a>
    <a href="#GameGuide">GameGuide</a>
    <a href="#Video">Video</a>
  </nav>

  <div class="loginbox">
    <img src="../Assignment/media/avatar.png" class="avatar" alt="">
    <h1>Sign Up</h1>
    <?php
    if(isset($_GET['error'])){
      if($_GET['error'] == "emptyfields"){
        echo '<p class ="signuperror"> PLEASE FILL IN ALL FIELDS!</p>';
      }
    }
    ?>

    <form method="POST" action='../Assignment/register.php' class="register-form">
      <p>Username</p>
      <input type="text" name="username" placeholder="Enter Username">
      <p>Password</p>
      <input type="password" name="password" placeholder="Enter Password">
      <input type="submit" name="submit" value="SignUp">
      <a href="../Assignment/login.html">Already have an account?</a>
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