<?php
//Create connection with database
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "resume";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("Resume App - ERROR DB: Failed to connect!");
}