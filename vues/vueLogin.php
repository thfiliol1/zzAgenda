<!DOCTYPE HTML>
<html>
  <head>
    <title>Log in</title>
    <meta charset ="UTF-8">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/myStyle.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/auth.js"></script>
    
  </head>
  <body>

    <!--top Banner-->
    <?php require_once("header.php");?>

    <!--content-->
    <div id="message" class="message"></div>
    <div class="login">
        <div class="login-triangle"></div>

        <h2 class="login-header">Log in</h2>

        <div class="login-container">
            <p><input id="field_email" type="email" placeholder="Email"></p>
            <p><input id="field_password" type="password" placeholder="Password"></p>
            <p class="text-center"><button class="btn btn-primary" id="buttonAuth">Let me in</button>
            </p>
            <div id="result"></div>
        </div>

    </div>


  </body>

</html>

