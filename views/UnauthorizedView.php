<!DOCTYPE HTML>
<html>
  <head>
    <title><?=$language["unAuthorizedTitle"]?></title>
    <meta charset ="UTF-8">
    <link rel="icon" href="images/zzAgenda.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/myStyle.css">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </head>
  <body>

    <!--top Banner-->
    <?php require_once("header.php");?>

    <!--content-->
    <div class="container">
      <img style="float:left" src="images/attention.png" width="300" height="250"/>
      <h1> <?=$language["unAuthorizedContent"]?> </h1>
    </div>



  </body>

</html>

