<?php 
// CRUD Hobbie Entity
if($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
	include("./connection.php");
    $query="";

    $id = $_POST['idHobbie'];

    if ($_POST['deleteRecordHobbie']=="Y" and ($id!="")) { // delete record 
        $query="delete from hobbie where id_hobbie=$id";
    }
    else {
        $txt = $_POST['txtHobbie'];
        $id_user = $_SESSION["id_user"];
        if ($id!="")
            $query = "update hobbie set tx_hobbie='$txt' where id_hobbie=$id";
        else 
            $query = "insert into hobbie (tx_hobbie, id_user) values ('$txt',$id_user)";
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