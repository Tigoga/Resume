
<?php 
// Footer html
$con=null;

function retrievePersonal() {
  if (strpos($_SERVER['SCRIPT_FILENAME'],"pages")) {
     include("../util/connection.php");
  }   
  if (strpos($_SERVER['SCRIPT_FILENAME'],"default.php")) {
    include("./pages/util/connection.php");
 }   

	$query = "select * from personal_information where id_user=" . $_SESSION['id_user'];
  $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $information = mysqli_fetch_assoc($result);
		if  (isset($information['tx_linkedin'])) echo "<a href=\"" . $information['tx_linkedin'] . " \" target=_blank class=\"icon fa fa-linkedin\"></a>";
		if  (isset($information['tx_instagram'])) echo "<a href=\"" . $information['tx_instagram'] . " \" target=_blank class=\"icon fa fa-instagram\"></a>";
		if  (isset($information['tx_github'])) echo "<a href=\"" . $information['tx_github'] . " \" target=_blank class=\"icon fa fa-github\"></a>";
	}   
    $result->close();
	}
?>

<footer>
  <div class="row">
    <div class="col-12 text-center ">
      <h4>
        <a>Wellington Gaboardi's Professional Website</a>
      </h4>
       <div>
        <P>
        <?php retrievePersonal(); ?>
        © 2022 WLG - Rights Reserved
      </P>
       </div>
    </div>
  </div>
</footer>