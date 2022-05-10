<?php 
//CRUD Project Entity
if($_SERVER['REQUEST_METHOD'] == "POST") {
	include("./connection.php");
    $query="";
    session_start();

    $id = $_POST['idProject'];

    if ($_POST['deleteRecordProject']=="Y" and ($id!="")) { // delete record 
        $query="delete from project where id_project=$id";
    }
    else {
        $project = $_POST['txtProject'];
        $position = $_POST['txtPositionProject'];
        $dtstarted = $_POST['dateStartedProject'];
        if ($_POST['dateFinishedProject']!="") 
           $dtfinished = $_POST['dateFinishedProject'];
        else    
           $dtfinished = "null";
        $id_user = $_SESSION["id_user"];

        $description = $_POST['txtDescriptionProject'];
        if ($_POST['txtUrlProject']=="") 
           $url="null"; 
        else 
           $url=$_POST['txtUrlProject'];
           
        if ($id!="")
            $query = "update project set tx_project='$project',tx_position='$position',dt_started='$dtstarted', dt_finished='$dtfinished', me_description='$description',tx_url_image='$url' where id_project=$id";
        else 
            $query = "insert into project (tx_project, tx_position, dt_started, dt_finished, me_description, tx_url_image, id_user) values ('$project','$position','$dtstarted','$dtfinished','$description','$url',$id_user)";
    } 	 
	if ($query!="") {
		$result = mysqli_query($con, $query);
		if($result) {
		   header("Location: /pages/profile/profilepage.php");
		   die;
		}
	}	
}
?>