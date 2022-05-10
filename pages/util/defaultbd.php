<?php
//Author: TGG
//Date created: 2022 Apr
//Comments: database functions to Default page

 if(session_id() == '') {
  session_start();
  }

// function to retrieve summary */
function retrieveSummaryDefault() {
  include("./pages/util/connection.php");

  $query = "select me_summary from summary where id_user=" . $_SESSION['id_user'];
  $result = mysqli_query($con, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $information = mysqli_fetch_assoc($result);
    if  (isset($information['me_summary'])) echo "<div>" . $information['me_summary'] . "</div>";
  }   
  $result->close();
  }

// Retrieve to retrieve Blog content */
  function retrieveBlog() {
	include("./pages/util/connection.php");
	$query = "select DATE_FORMAT(dt_created,'%Y-%m-%d') as dt_created, me_description, id_subject from blog where id_user=" . $_SESSION['id_user'] . " order by dt_created desc";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<div class=\"bold\">BLOG EVENTS</div>";
        echo "<div class=col-10>";
		echo "<ul>";
	    while ($row = $result->fetch_assoc()) {
		  if  (isset($row['me_description'])) {
              switch ($row['id_subject'])
              {
                  case(1):
                     $type="Agile";
                     break;
                  case(2):
                     $type="Project";
                     break;
                case(3):
                     $type="Business";
                     break;
               case(4):
                     $type="Database";
                     break;
               case(5):
                     $type="Language";
                     break;
                case(6):
                     $type="Utilities";
                     break;
                case(7):
                     $type="IA/IML";
                     break;
                case(8):
                    $type="News";
                    break;
                 }
			echo "<li><div class=\"row bg-blog\">" . $type . " [" . $row['dt_created'] . "]<br/>" . $row['me_description'] . "</div></li>" ;
		  }		  
		}  
		
		echo "</ul></div></div>";
	}	
	$result->close();
  }	

// function to retrieve projects */
function retrieveProjectsDefault() {
  include("./pages/util/connection.php");

  $query = "select  tx_project, me_description, tx_url_image from project where id_user=" . $_SESSION['id_user'] . " order by dt_started desc limit 4";
  $result = mysqli_query($con, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    echo "<h2 class=\"bold\">Projects</h2>";
	while ($project = $result->fetch_assoc()) {
        if  (isset($project['tx_url_image']) && $project['tx_url_image']!=null && $project['tx_url_image']!="" ) 
            echo "<a href=\"./pages/profile/profilepage.php#project\"><img class=\"img\" alt=\"" . $project['me_description'] . " \" src=\"" . $project['tx_url_image'] . "\" /></a>";
        if  (isset($project['tx_project'])) echo "<p>" . $project['tx_project'] . "</p>";
	}
  }   
  $result->close();
}

?>