<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Project Title</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <div class="container" id="container">
            <div class="text-center p-2 bg-warning">
                <h1>Ajax Request With php, mvc ,pdo</h1>
            </div>
            <div class="row mt-2 mb-2">
                <div  class="col-lg-6"></div>
                <div  class="col-lg-6 ">
                   
    <button class="btn btn-secondary float-right" data-toggle="modal" data-target="#myModal">Add User </button>
                     <button class="btn btn-danger float-right ">Export To Excel </button>
                </div>
                
            </div>

            <div class="tbl-user" id="tbl-user">

            </div>
        </div>


        <!-- Modal Section Edite Section -->
           <!-- Modal all  -->
    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add User</h4>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <form action="" method="POST" id="form-data">


              <div class="form-group">
                <label for="text">Nocice </label>
                <input type="text" name="nocice" class="form-control" required="1" placeholder="Type Your Notice Here"  id="nocice">
              </div>
       
            
              <button type="submit" id="Insert" class="btn btn-primary">Submit</button>
            </form>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Edite Modal User  -->

    <div class="modal" id="editeModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edite User </h4>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <form action="" method="POST" id="edite-data">


          <div class="form-group">
            <label for="text">Nocice </label>
            <input type="text" name="nocice" id="Editeuser" class="form-control" required="1" >
          </div>
       
            
              <button type="submit" id="editedata" class="btn btn-primary">Update</button>
            </form>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Edite Modal User  -->
        <!-- Modal Section Edite Section -->



      
       <script src="js/jquery-3.5.0.min.js"></script>
       <script src="js/bootstrap.min.js"></script>
       <script>

        $(document).ready(function(){

            showUser();
           function showUser(){

                      $.ajax({
                          url: 'action.php',
                          type: 'POST',
                          data: { action : 'view'},
                          success:function (argument) {

                              $('#tbl-user').html(argument);
                          }
                      });

           }

// Insert User Using Modal 
           $('#Insert').click(function(event) {
                event.preventDefault();
                    $.ajax({
                          url: 'action.php',
                          type: 'POST',
                          data: $('#form-data').serialize()+"&action=Insert",
                          success:function (argument) {
                            console.log(argument);

                            $("#myModal").modal('hide');
                            showUser();
                          }
                     });

                });
// Insert User Using Modal 


// Show user into input fild

$('body').on('click', '.editeModal', function(event) {
  event.preventDefault();
  var edite_id = $(this).attr('id');

         $.ajax({
            url: 'action.php',
            type: 'POST',
            data: { edite_id:edite_id },
            success:function (argument) {
            var data = JSON.parse(argument);
            $("#Editeuser").val(data.notice);
            }
        });

});

// Update Data in Input Fild 



// Update Data in Input Fild 







             


 });
          


            
  
           



       </script>
    </body>
</html>