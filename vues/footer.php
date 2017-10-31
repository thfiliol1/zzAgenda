<!--footer-->
<?php
$active="";
?>
<nav class="navbar navbar-toggleable-md navbar-inverse navbar-inner footer">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarsExampleDefault">
      <ul class="nav navbar-nav menu mr-auto">
        <?php
        if($page=="schedules"){
            $active="active";
        }
        ?>            
        <li class="nav-item <?= $active ?>">
          <img src="images/schedule.png" width="50" height="50">
          <a class="nav-link" href="index.html"><?=$language["schedules"]?> </a>
        </li>
        <?php
        $active="";
        if($page=="map"){
            $active="active";
        }
        ?>        
        <li class="nav-item <?= $active ?>">
          <img src="images/map.png" width="50" height="50">
          <a class="nav-link" href="map.html"><?=$language["map"]?></a>
        </li>
        <?php
        $active="";
        if($page=="administration"){
            $active="active";
        }
        if($modAdmin->isAdmin()){
        ?>
        <li class="nav-item <?= $active ?>">
          <img src="images/administration.png" width="50" height="50">
          <a class="nav-link" href="map.html"><?=$language["administration"]?></a>
        </li>      
        <?php
        }
        $active="";
        if($page=="logout"){
            $active="active";
        }
        ?>
        <li class="nav-item <?= $active ?>">
          <img src="images/auth.png" width="50" height="50">
          <a id="link_logout" class="nav-link" href="#"><?=$language["logout"]?></a>
        </li>


        
        
      </ul>
    </div>
  </div>
</nav>