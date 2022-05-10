<?php 
// CRUD Job Entity
if($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
	include("./connection.php");
    $query="";

    $id = $_POST['idJob'];
    echo $id;
    echo $_POST['deleteRecordJob'];

    if ($_POST['deleteRecordJob']=="Y" and ($id!="")) { // delete record 
        $query="delete from job_experience where id_job=$id";
        echo "ola";
    }
    else {
        $company = $_POST['txtCompanyJob'];
        $position = $_POST['txtPositionJob'];
        $dtstarted = $_POST['dateStartedJob'];
        if ($_POST['dateFinishedJob']!="00/00/0000") 
           $dtfinished = $_POST['dateFinishedJob'];
        else    
           $dtfinished = "null";
        $id_user = $_SESSION["id_user"];
        $description = $_POST['txtDescriptionJob'];
        if ($id!="")
            $query = "update job_experience set tx_company='$company', tx_position='$position', dt_started='$dtstarted', dt_finished='$dtfinished', me_experience='$description' where id_job=$id";
        else 
            $query = "insert into job_experience (tx_company, tx_position, dt_started, dt_finished, me_experience, id_user) values ('$company','$position','$dtstarted','$dtfinished','$description',$id_user)";
    } 	 
    echo $query;
	if ($query!="") {
		$result = mysqli_query($con, $query);
		if($result) {
		   header("Location: /pages/profile/profilepage.php");
		   die;
		}
	}	
}
?>