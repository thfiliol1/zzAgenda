<!DOCTYPE HTML>
<html>
  <head>
    <title><?=$language["administration"]?></title>
    <meta charset ="UTF-8">
    <link rel="icon" href="images/zzAgenda.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/myStyle.css">
    <link rel="stylesheet" href="css/glyphicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/tempusdominus-bootstrap-4.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/auth.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/moment-with-locales.js"></script>
    <script src="js/base.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/tempusdominus-bootstrap-4.js"></script>
    <script src="js/timepicker.js"></script>
    
  </head>
  <body>

    <!--top Banner-->
    <?php require_once("header.php");?>

    <!--content-->
    <div class="container">
      <h1><?=$language["administration"]?></h1>
        <button class="btn btn-primary btn-lg" data-title="Add" data-toggle="modal" data-target="#add" >
          <span class="glyphicon glyphicon-plus"></span>
        </button>
      <table id="mytable" class="table table-bordred table-striped">
                   
          <thead>
            <th><?=$language["date"]?></th>
            <th><?=$language["title"]?></th>
            <th><?=$language["description"]?></th>
            <th><?=$language["city"]?></th>
            <th><?=$language["speaker"]?></th>
          </thead>

        <tbody>
          
       <?php 
        $i=0;
        foreach ($tabConferences as $conferenceInfo) {
        
        ?>  

        <tr>
          <td style="display:none" name=<?="td_idConf".$i?>><?= $conferenceInfo["conference"]->getId()?></td>
          <td name=<?="td_date".$i?>><?= date("d/m/Y H:i",$conferenceInfo["conference"]->getDate()) ?></td>
          <td name=<?="td_titre".$i?>><?= $conferenceInfo["conference"]->getTitle()?></td>
          <td name=<?="td_description".$i?>><?= $conferenceInfo["conference"]->getDescription()?></td>
          <td name=<?="td_city".$i?>><?= $conferenceInfo["conference"]->getAddress()?></td>
          <td name=<?="td_speaker".$i?>><?= $conferenceInfo["conference"]->getSpeaker()?></td>
          <td>
            <p data-placement="top" data-toggle="tooltip" title=<?=$language["edit"]?>>

              <button id=<?=$i?> onClick="edit_click(this.id)" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                <span class="glyphicon glyphicon-pencil"></span>
              </button>
            </p>
          </td>
          <td>
            <p data-placement="top" data-toggle="tooltip" title=<?=$language["delete"]?>>
              <button id=<?=$i?> onClick="del_click(this.id)" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" >
                <span class="glyphicon glyphicon-trash"></span>
              </button>
            </p>
          </td>
        </tr>
          
        <?php $i++;} ?>
        </tbody>
              
      </table>

    </div>

      <!--Modify a row-->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
              <h4 class="modal-title custom_align" id="Heading"><?=$language["edit"]?></h4>
            </div>

                
            <div class="modal-body">

              <div id="message_admin_modify"></div>

              <div class="form-group">
                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                    <span class="input-group-addon" data-target="#datetimepicker2" data-toggle="datetimepicker">
                        <span class="fa fa-calendar"></span>
                    </span>
                    <input id="edit_date" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
                    
                </div>
              </div>       

              <div class="form-group">
                <input id="edit_title" class="form-control " type="text" placeholder=<?=$language["title"]?>>
              </div>
              <div class="form-group">
                <input id="edit_city" class="form-control " type="text" placeholder=<?=$language["city"]?>>
              </div>
              <div class="form-group">

                <input id="edit_speaker" class="form-control " type="text" placeholder=<?=$language["speaker"]?>>
              </div>
              <div class="form-group">
                <div class="btn-toolbar" data-role="editor-toolbar">
                  <div class="btn-group">
                    <a class="btn" onclick="commande('bold');" title="Bold"><i class="icon-bold"></i></a>
                    <a class="btn" onclick="commande('italic');" title="Italic"><i class="icon-italic"></i></a>
                    <a class="btn" onclick="commande('strikethrough');" title="Strikethrough"><i class="icon-strikethrough"></i></a>
                    <a class="btn" onclick="commande('underline');" title="Underline"><i class="icon-underline"></i></a>
                  </div> 
                  <div class="btn-group">
                    <a class="btn" onclick="commande('justifyLeft');" title="JustifyLeft"><i class="icon-align-left"></i></a>
                    <a class="btn" onclick="commande('justifyCenter');" title="JustifyCenter"><i class="icon-align-center"></i></a>
                    <a class="btn" onclick="commande('justifyRight');" title="JustifyRight"><i class="icon-align-right"></i></a>
                    <a class="btn" onclick="commande('justifyFull');" title="JustifyFull"><i class="icon-align-justify"></i></a>
                  </div>    
                  <div class="btn-group">
                    <a class="btn" onclick="commande('insertUnorderedList');" title="InsertUnorderedList"><i class="icon-list-ul"></i></a>
                    <a class="btn" onclick="commande('insertOrderedList');" title="InsertOrderedList"><i class="icon-list-ol"></i></a>
                  </div>      
                </div>  
                <div id="edit_description" rows="2" class="form-control" contenteditable >
                </div>
              </div>

            </div>

            <div class="modal-footer ">
              <button id="edit_button" type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span><?=$language["update"]?></button>
            </div>
          </div>
        </div>
      </div>


      <!--Add a row-->
      <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
              <h4 class="modal-title custom_align" id="Heading"><?=$language["add_schedule"]?></h4>
            </div>

                
            <div class="modal-body">

              <div id="message_admin_add"></div>

              <div class="form-group">
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <span class="input-group-addon" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <span class="fa fa-calendar"></span>
                    </span>
                    <input id="add_date" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                    
                </div>
              </div>       

              <div class="form-group">
                <input id="add_title" class="form-control " type="text" placeholder=<?=$language["title"]?>>
              </div>
              <div class="form-group">

                <input id="add_city" class="form-control " type="text" placeholder=<?=$language["city"]?>>
              </div>
              <div class="form-group">

                <input id="add_speaker" class="form-control " type="text" placeholder=<?=$language["speaker"]?>>
              </div>
              <div class="form-group">
                <div class="btn-toolbar" data-role="editor-toolbar">
                  <div class="btn-group">
                    <a class="btn" onclick="commande('bold');" title="Bold"><i class="icon-bold"></i></a>
                    <a class="btn" onclick="commande('italic');" title="Italic"><i class="icon-italic"></i></a>
                    <a class="btn" onclick="commande('strikethrough');" title="Strikethrough"><i class="icon-strikethrough"></i></a>
                    <a class="btn" onclick="commande('underline');" title="Underline"><i class="icon-underline"></i></a>
                  </div> 
                  <div class="btn-group">
                    <a class="btn" onclick="commande('justifyLeft');" title="JustifyLeft"><i class="icon-align-left"></i></a>
                    <a class="btn" onclick="commande('justifyCenter');" title="JustifyCenter"><i class="icon-align-center"></i></a>
                    <a class="btn" onclick="commande('justifyRight');" title="JustifyRight"><i class="icon-align-right"></i></a>
                    <a class="btn" onclick="commande('justifyFull');" title="JustifyFull"><i class="icon-align-justify"></i></a>
                  </div>    
                  <div class="btn-group">
                    <a class="btn" onclick="commande('insertUnorderedList');" title="InsertUnorderedList"><i class="icon-list-ul"></i></a>
                    <a class="btn" onclick="commande('insertOrderedList');" title="InsertOrderedList"><i class="icon-list-ol"></i></a>
                  </div>      
                </div>  
                <div id="add_description" rows="2" class="form-control" contenteditable >
                  <?=$language["description"]?>&hellip;
                </div>
              </div>

            </div>

            <div class="modal-footer ">
              <button id="add_button" type="button" class="btn btn-warning btn-lg" style="width: 100%;">
                <span class="glyphicon glyphicon-ok-sign"></span> <?=$language["add"]?>
              </button>
            </div>
          </div>
        </div>
      </div>




      <!--Delete a row-->
      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
              <h4 class="modal-title custom_align" id="Heading"><?=$language["delete_entry"]?></h4>
            </div>
            <div class="modal-body">

             <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span><?=$language["delete_question"]?></div>

           </div>
           <div class="modal-footer ">
            <button id="del_button" type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> <?=$language["yes"]?></button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> <?=$language["no"]?></button>
          </div>
        </div>
      </div>
    </div>



    <!--footer-->
    <?php require_once("footer.php"); ?>

  </body>

</html>

