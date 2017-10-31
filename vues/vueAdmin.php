<!DOCTYPE HTML>
<html>
  <head>
    <title>Admin</title>
    <meta charset ="UTF-8">
    <link rel="icon" href="images/zzAgenda.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/myStyle.css">
    <link rel="stylesheet" href="css/glyphicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/tempusdominus-bootstrap-4.css">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/moment-with-locales.js"></script>
    <script src="js/base.js"></script>
    <script src="js/tempusdominus-bootstrap-4.js"></script>
    <script src="js/timepicker.js"></script>

  </head>
  <body>

    <!--top Banner-->
    <?php require_once("header.php");?>

    <!--content-->
    <div class="container">
      <h1>Administration</h1>
        <button class="btn btn-primary btn-lg" data-title="Add" data-toggle="modal" data-target="#add" >
          <span class="glyphicon glyphicon-plus"></span>
        </button>
      <table id="mytable" class="table table-bordred table-striped">
                   
          <thead>
            <th>Schedule</th>
            <th>Title</th>
            <th>Description</th>
            <th>City</th>
            <th>Speaker</th>
            <th>Edit</th>
             <th>Delete</th>
          </thead>

        <tbody>
          
        <tr>
          <td>27/09/2017 - 09h00</td>
          <td>Conference A</td>
          <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed felis rutrum, consequat mauris ac, pharetra metus. Donec at rhoncus eros. Morbi eget magna condimentum ipsum sodales ornare. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras eu neque metus. Nulla facilisis ornare vulputate. Nunc facilisis mollis maximus. Lorem ipsum dolor sit posuere.</td>
          <td>Paris</td>
          <td>Speaker 1</td>
          <td>
            <p data-placement="top" data-toggle="tooltip" title="Edit">
              <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                <span class="glyphicon glyphicon-pencil"></span>
              </button>
            </p>
          </td>
          <td>
            <p data-placement="top" data-toggle="tooltip" title="Delete">
              <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" >
                <span class="glyphicon glyphicon-trash"></span>
              </button>
            </p>
          </td>
        </tr>
          
          
        </tbody>
              
      </table>

    </div>

      <!--Modify a row-->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
              <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
            </div>

                
            <div class="modal-body">

              <div class="form-group">
                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                    <span class="input-group-addon" data-target="#datetimepicker2" data-toggle="datetimepicker">
                        <span class="fa fa-calendar"></span>
                    </span>
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
                    
                </div>
              </div>       

              <div class="form-group">
                <input class="form-control " type="text" placeholder="Title">
              </div>
              <div class="form-group">

                <input class="form-control " type="text" placeholder="City">
              </div>
              <div class="form-group">

                <input class="form-control " type="text" placeholder="Speaker">
              </div>
              <div class="form-group">
                <textarea rows="2" class="form-control" placeholder="Description"></textarea>
              </div>

            </div>

            <div class="modal-footer ">
              <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
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
              <h4 class="modal-title custom_align" id="Heading">Add schedule</h4>
            </div>

                
            <div class="modal-body">

              <div class="form-group">
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <span class="input-group-addon" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <span class="fa fa-calendar"></span>
                    </span>
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                    
                </div>
              </div>       

              <div class="form-group">
                <input class="form-control " type="text" placeholder="Title">
              </div>
              <div class="form-group">

                <input class="form-control " type="text" placeholder="City">
              </div>
              <div class="form-group">

                <input class="form-control " type="text" placeholder="Speaker">
              </div>
              <div class="form-group">
                <textarea rows="2" class="form-control" placeholder="Description"></textarea>
              </div>

            </div>

            <div class="modal-footer ">
              <button type="button" class="btn btn-warning btn-lg" style="width: 100%;">
                <span class="glyphicon glyphicon-ok-sign"></span> Add
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
              <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
            </div>
            <div class="modal-body">

             <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

           </div>
           <div class="modal-footer ">
            <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
          </div>
        </div>
      </div>
    </div>



    <!--footer-->
    <?php require_once("footer.php"); ?>

  </body>

</html>

