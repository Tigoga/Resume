<?php 
// CRUD Summary Entity
if($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
	include("./connection.php");
    $query="";

    $id = $_POST['idSummary'];

    if ($_POST['deleteRecordSummary']=="Y" and ($id!="")) { // delete record 
        $query="delete from summary where id_summary=$id";
    }
    else {
        $txt = $_POST['txtSummary'];
        $id_user = $_SESSION["id_user"];
        if ($id!="")
            $query = "update summary set me_summary='$txt' where id_summary=$id";
        else 
            $query = "insert into summary (me_summary, id_user) values ('$txt',$id_user)";
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