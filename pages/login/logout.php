<?php
// Session logout
if (session_status() == PHP_SESSION_NONE) {
   session_start();
   }

if(isset($_SESSION['id_user']))
{
	unset($_SESSION['id_user']);

}
if(isset($_SESSION['logged'])) {
   unset($_SESSION['logged']);
}

header("Location: /default.php?message=Logout successfully!");
die;
?>