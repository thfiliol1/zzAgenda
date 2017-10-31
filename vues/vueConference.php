<!DOCTYPE HTML>
<html>
  <head>
    <title>Home</title>
    <meta charset ="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/myStyle.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/auth.js"></script>
  </head>
  <body>

    <!--top Banner-->
    <?php require_once("header.php");?>
    <?php foreach ($tabConferences as $conferenceInfo) {?>
    <div class="container scheduleContent ">
      <div class="row ">
        <div class="col-2" style="height: 100%">
            <div class="">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span class="align-middle"><?= date("d/m/Y",$conferenceInfo["conference"]->getDate()) ?></span>
            </div>
            <div class="">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <span class="align-middle"><?= date("H:i",$conferenceInfo["conference"]->getDate()) ?></span>
            </div>            
        </div>
          <div class="col-8" style="margin:0px auto">
          <h2><?= $conferenceInfo["conference"]->getTitre()?></h2>
          <p><?= $conferenceInfo["conference"]->getDescription()?></p>
          <img style="float: left" class="iconTop" src="images/landmark.png" width="25" height="25" alt="">
          <p><?= $conferenceInfo["conference"]->getAdresse()?></p>
          <img style="float: left" class="iconTop" src="images/micro.png" width="25" height="25" alt="">
          <p><?= $conferenceInfo["speaker"]->getPrenom()." ".$conferenceInfo["speaker"]->getNom() ?></p>
        </div>
        <div class="col-2" >          
          <img style="float: right" src="images/heart.png" width="25" height="25" alt="">
          <span style="float: right">10</span>
        </div>
      </div>
    </div>
    <?php } ?>
    



    <!--footer-->
    <?php require_once("footer.php"); ?>
    
  </body>

</html>

