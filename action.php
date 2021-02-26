<?php 

include_once 'db.php';

$db = new Database();


if (isset($_POST['action']) && $_POST['action']=='view') {


	$output='';
	$data = $db->read();


		


	$output.=' <table class="table-dark table text-center">
                <thead>

                    <tr>
                        <th>ID </th>
                        <th>Notice Bord</th>
                        <th>Time And Date</th>
                        <th>Action Button</th>
                    </tr>
                    
                </thead>

                <tbody>';


                $i=0;

                foreach ($data as $view) {

                    $i++;


                	$output.='
                	 <tr>
                        <td>'.  $i .'</td>
                        <td>'. $view['notice'].'</td>
                        <td>'. $view['time'].'</td> 
                        <td>

                        
                  <a href="#" id="'.$view['id'].'" class="btn btn-warning">Info</a> 

                  <a href="#" id="'.$view['id'].'" class="editeModal btn btn-primary " data-toggle="modal" data-target="#editeModal" >Edite</a> 

                  <a href="#" id="'.$view['id'].'" class="btn btn-danger">Del</a> 


                        </td> 
                    </tr>

                	'; 
                };

                $output.='  </tbody>
            </table>';

            echo $output;



	}

// user add functionality added

    if (isset($_POST['action']) && $_POST['action']=='Insert') {

        $nocice = $_POST['nocice'];
        $db->insert($nocice);
    }
// user add functionality added

// Edite User Show In input fild


    if (isset($_POST['edite_id'])) {
        $id= $_POST['edite_id'];
        $row = $db->getuserById($id);
        echo json_encode($row); 
    }


// Edite User Show In input fild 

 

 ?>