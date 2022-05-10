<?php 
// CRUD Education Entity
if($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();

	include("./connection.php");
    $query="";

    $id = $_POST['idEducation'];

    if ($_POST['deleteRecordEducation']=="Y" and ($id!="")) { // delete record 
        $query="delete from education where id_education=$id";
    }
    else {
        $institution = $_POST['txtInstitution'];
        $course = $_POST['txtCourse'];
        $dtstarted = $_POST['dateStartedCourse'];
        if ($_POST['dateFinishedCourse']!="") 
           $dtfinished = $_POST['dateFinishedCourse'];
        else    
           $dtfinished = "null";
        $id_user = $_SESSION["id_user"];
        $description = $_POST['txtDescriptionCourse'];

        if ($id!="")
            $query = "update education set tx_institution='$institution', tx_course='$course', dt_started='$dtstarted', dt_finished='$dtfinished', me_description='$description' where id_education=$id";
        else 
            $query = "insert into education (tx_institution, tx_course, dt_started, dt_finished, me_description, id_user) values ('$institution','$course','$dtstarted','$dtfinished','$description',$id_user)";
            echo '[' . $query . ".";
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