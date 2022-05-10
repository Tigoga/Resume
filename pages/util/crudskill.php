<?php 
//CRUD SKill Entity
if($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
	include("./connection.php");
    $query="";

    $id = $_POST['idSkill'];

    if ($_POST['deleteRecordSkill']=="Y" and ($id!="")) { // delete record 
        $query="delete from skill where id_skill=$id";
    }
    else {
        $type = $_POST['selSkill'];
        $txt = $_POST['txtSkill'];
        $rating = $_POST['selRating'];
        $id_user = $_SESSION["id_user"];
        if ($id!="")
            $query = "update skill set tp_skill='$type', tx_skill='$txt', nr_rating_skill=$rating where id_skill=$id";
        else 
            $query = "insert into skill (tp_skill, tx_skill, nr_rating_skill,id_user) values ('$type','$txt' ,$rating, $id_user)";
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