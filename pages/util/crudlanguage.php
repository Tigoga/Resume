<?php 
// CRUD Language Entity
if($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
	include("./connection.php");
    $query="";

    $id = $_POST['idLanguage'];

    if ($_POST['deleteRecordLanguage']=="Y" and ($id!="")) { // delete record 
        $query="delete from language where id_language=$id";
    }
    else {
        $txt = $_POST['txtLanguage'];
        $level = $_POST['selLevelLanguage'];
        $id_user = $_SESSION["id_user"];
        if ($id!="")
            $query = "update language set tx_language='$txt',nr_level_language=$level where id_language=$id";
        else 
            $query = "insert into language (tx_language, nr_level_language, id_user) values ('$txt', $level, $id_user)";
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