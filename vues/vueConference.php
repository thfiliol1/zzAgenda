<!DOCTYPE HTML>
<html>
  <head>
    <title><?=$language['schedules']?></title>
    <meta charset ="UTF-8">
    <link rel="icon" href="images/zzAgenda.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/myStyle.css">
    

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/auth.js"></script>
    <script src="js/conference.js"></script>
    
  </head>
  <body>

    <!--top Banner-->
    <?php require_once("header.php");
    $i=0;
    foreach ($tabConferences as $conferenceInfo) {
    $i++;
    ?>
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
          <p><a data-title="map" data-toggle="modal" data-target="#map" id="lien<?=$i?>" href="#" onclick="afficher_carte(<?=$i?>)"><?= $conferenceInfo["conference"]->getAdresse()?></a></p>
          <img style="float: left" class="iconTop" src="images/micro.png" width="25" height="25" alt="">
          <p><?= $conferenceInfo["conference"]->getSpeaker()?></p>
        </div>
        <div class="col-2" >          
            <span><?= $conferenceInfo["nbLike"] ?></span>
          <?php if($conferenceInfo["userCanLike"] == TRUE){ ?>
            <a class="link_like"><i id="btn_like_<?= $conferenceInfo["conference"]->getId() ?>" style="color: red; cursor:pointer;" class="fa fa-heart" aria-hidden="true"></i></a>        
          <?php }else { ?>
            <a class="link_nolike"><i id="btn_nolike_<?= $conferenceInfo["conference"]->getId() ?>" style="color: red; cursor:pointer;" class="fa fa-heart-o" aria-hidden="true"></i></a>  
          <?php } ?>
          
        </div>
      </div>
      
    </div>
    <?php } ?>
      <div class="modal fade" id="map" tabindex="-1" role="dialog" aria-labelledby="map" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">              
              <h4 class="modal-title custom_align" id="Heading"><?= $language['location_of_conference'] ?></h4>
            </div>

                
            <div class="modal-body">
                <div id="carte" style="width: 100%; height:400px;"></div>
            </div>  
          </div>
        </div>
      </div>



    <!--footer-->
    <?php require_once("footer.php"); ?>
    
  </body>

</html>

