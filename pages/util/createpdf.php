<?php
//Author: TGG
//Date created: 2022 Apr
//Comments: Generate PDF resume

namespace Dompdf;
require_once 'dompdf/autoload.inc.php';
session_start();
if(isset($_SESSION['id_user'])) // user exists
{
$dompdf = new Dompdf();  // create instance Dompdf
$resume=createResume(); // create html Resume 
$dompdf->loadHtml($resume); // load html Resume
$dompdf->setPaper('A4', 'landscape');
$dompdf->render(); // create PDF
$dompdf->stream("",array("Attachment" => false)); // show PDF file
exit(0);
}

// Create html Resume

function createResume() {
    $html = "<html><body>";
    $html .= '<link type="text/css" href="c:\resume\css\pages.css" rel="stylesheet" />';
    $html .= "<table style=\"width:100%;page-break-inside:auto\"><tr><td style=\"text-align:center;font-size:32;font-weight:bold;color:#0d6efd;border:1px solid black\">Wellington L Gaboardi Profile</td></tr></table>";
    $html .= retrieveSummaryPDF();
    $html .= "<br/>";
    $html .= retrieveSkillPDF(1);
    $html .= "<br/>";
    $html .= retrieveSkillPDF(2);
    $html .= "<br/>";
    $html .= retrieveJobExperiencePDF();
    $html .= "<br/>";
    $html .= retrieveEducationPDF();
    $html .= "<br/>";
    $html .= retrieveProjectsPDF();
    $html .= "<br/>";
    $html .= retrieveLanguagesPDF();
    $html .= "<br/>";
    $html .= retrieveHobbiesPDF();
    $html .= "<br/>";
    $html .= footer();
    $html .= "</body></html>";
    return $html;
}

// function to retrieve Summary */
function retrieveSummaryPDF() {
    include("../util/connection.php");

  $query = "select me_summary from summary where id_user=" . $_SESSION['id_user'];
  $result = mysqli_query($con, $query);
  $content ="";

  if ($result && mysqli_num_rows($result) > 0) {
    $information = mysqli_fetch_assoc($result);
    $content = $content .  "<table><tr><td style=\"color:#0d6efd;text-decoration:underline\">SUMMARY</td></tr>";
    if  (isset($information['me_summary'])) $content = $content .  "<tr><td>" . $information['me_summary'] . "</td></tr>";
    $content = $content .  "</table>";
  }   
  $result->close();
  return $content;
}

// function to retrieve skills */
function retrieveSkillPDF($tipo) {
    include("../util/connection.php");
    $query = "select tx_skill, nr_rating_skill from skill where tp_skill=" . $tipo . " and id_user=" . $_SESSION['id_user'];
    $result = mysqli_query($con, $query);
    $content ="";
    $i=0;

    if ($result && mysqli_num_rows($result) > 0) {
        $content = $content = "<table>";
        if ($tipo==1) $content = $content .  "<tr><td colspan=2 style=\"color:#0d6efd;text-decoration:underline\">TECHNICAL SKILLS</td></tr>";
        if ($tipo==2) $content = $content .  "<tr><td colspan=2 style=\"color:#0d6efd;text-decoration:underline\">SOFT SKILLS</td></tr>";
        while ($row = $result->fetch_assoc()) {
           $content = $content . "<tr><td>[";
            for ($i=1; $i<$row['nr_rating_skill']; $i++) {
               $content = $content . "*" ;
            }
            $content = $content . "]</td><td>" . $row['tx_skill'] . "</td><td>" ;
        }  
        
        $content = $content .  "</table>";
    }	
    $result->close();
    return $content;
}	
    
// function to retrieve Job Experiences */
function retrieveJobExperiencePDF() {
	include("../util/connection.php");

  $query = "select DATE_FORMAT(dt_started,'%Y-%m') as dt_started, DATE_FORMAT(dt_finished,'%Y-%m') as dt_finished, tx_position, tx_company, me_experience from job_experience where id_user=" . $_SESSION['id_user'] . " order by dt_started desc";
  $result = mysqli_query($con, $query);
  $content ="";

  if ($result && mysqli_num_rows($result) > 0) {
    $content = $content .  "<table><tr><td style=\"color:#0d6efd;text-decoration:underline\">JOB EXPERIENCE</td></tr>";


	while ($job = $result->fetch_assoc()) {
        if  (isset($job['tx_company'])) $content = $content .  "<tr><td style=\"color:#9153c9\">" . $job['tx_company']; 
        if  (isset($job['dt_started'])) $content = $content .  "     [" .  $job['dt_started'] . ($job['dt_finished']==="0000-00"?" / Present": " / " . $job['dt_finished']) . "]</td></tr>";
	  if  (isset($job['tx_position'])) $content = $content .  "<tr><td>" . $job['tx_position'] . "</td></tr>";
	  if  (isset($job['me_experience'])) $content = $content .  "<tr><td>" . $job['me_experience'] . "</td></tr>";
	}
    $content = $content .  "</table>";
}   
  $result->close();
  return $content;
}

// function to retrieve Education */
function retrieveEducationPDF() {
	include("../util/connection.php");

  $query = "select DATE_FORMAT(dt_started,'%Y-%m') as dt_started, DATE_FORMAT(dt_finished,'%Y-%m') as dt_finished,tx_course, tx_institution, me_description from education where id_user=" . $_SESSION['id_user'] . " order by dt_started desc";
  $result = mysqli_query($con, $query);
  $content ="";

  if ($result && mysqli_num_rows($result) > 0) {
    $content = $content .  "<table><tr><td style=\"color:#0d6efd;text-decoration:underline\">EDUCATION</td></tr>";


	while ($education = $result->fetch_assoc()) {
	  if  (isset($education['tx_institution'])) $content = $content .  "<tr><td style=\"color:#9153c9\">" . $education['tx_institution'];
	  if  (isset($education['dt_started'])) $content = $content .  "  [" .  $education['dt_started'] . ($education['dt_finished']==="0000-00"?" / Present": " / " . $education['dt_finished']) . "]</td></tr>";
	  if  (isset($education['tx_course'])) $content = $content .  "<tr><td>" . $education['tx_course'] . "</td></tr>";
	  if  (isset($education['me_description'])) $content = $content .  "<tr><td>" . $education['me_description'] . "</td></tr>";
	}
    $content = $content .  "</table>";
  }   
  $result->close();
  return $content;
}

// function to retrieve projects */
function retrieveProjectsPDF() {
	include("../util/connection.php");

  $query = "select DATE_FORMAT(dt_started,'%Y-%m') as dt_started, DATE_FORMAT(dt_finished,'%Y-%m') as dt_finished, tx_project, tx_position, me_description from project where id_user=" . $_SESSION['id_user'] . " order by dt_started desc";
  $result = mysqli_query($con, $query);
  $content ="";

  if ($result && mysqli_num_rows($result) > 0) {
    $content = $content .  "<table><tr><td style=\"color:#0d6efd;text-decoration:underline\">PROJECTS</td></tr>";


	while ($project = $result->fetch_assoc()) {
	  if  (isset($project['tx_project'])) $content = $content .   "<tr><td style=\"color:#9153c9\">" . $project['tx_project'] ;
	  if  (isset($project['dt_started'])) $content = $content .  " [ " .  $project['dt_started'] . ($project['dt_finished']==="0000-00"?" - Present": " / " . $project['dt_finished']) . "]</td></tr>";
	  if  (isset($project['tx_position'])) $content = $content .  "<tr><td>" . $project['tx_position'] . "</td></tr>";
	  if  (isset($project['me_description'])) $content = $content .  "<tr><td>" . $project['me_description'] . "</td></tr>";
	}
    $content = $content .  "</table>";
  }   
  $result->close();
  return $content;
}


// function to retrieve languages  */
function retrieveLanguagesPDF() {
	include("../util/connection.php");

  $query = "select tx_language,nr_level_language from language where id_user=" . $_SESSION['id_user'] . " order by tx_language";
  $result = mysqli_query($con, $query);
  $content ="";

  if ($result && mysqli_num_rows($result) > 0) {
    $content = $content .  "<table><tr><td style=\"color:#0d6efd;text-decoration:underline\">LANGUAGES</td></tr>";

	while ($language = $result->fetch_assoc()) {
	  switch($language['nr_level_language']) {
	     case (1):
			$nivel = "Basic";
			break;
		 case (2):	
			$nivel = "Elementary";
			break;
	     case (3):	
			$nivel = "Intermediate";
			break;
		case (4):	
			$nivel = "Advanced";
			break;
		case (5):	
			$nivel = "Profiency";
			break;
		}	
	
		if  (isset($language['tx_language'])) $content = $content .  "<tr><td>" . $language['tx_language'] . "  [" . $nivel . "]</td></tr>";
	}
    $content = $content .  "</table>";
  }   
  $result->close();
  return $content;
}

// function to retrieve hobbies */
function retrieveHobbiesPDF() {
    include("../util/connection.php");
  
    $query = "select tx_hobbie from hobbie where id_user=" . $_SESSION['id_user'] . " order by tx_hobbie";
    $result = mysqli_query($con, $query);
    $content ="";
  
    if ($result && mysqli_num_rows($result) > 0) {
        $content = $content .  "<table><tr><td style=\"color:#0d6efd;text-decoration:underline\">HOBBIES</td></tr>";

  
      while ($hobbie = $result->fetch_assoc()) {
        if  (isset($hobbie['tx_hobbie'])) $content = $content .  "<tr><td>" . $hobbie['tx_hobbie'] . "</td></tr>";
      }
      $content = $content .  "</table>";
    }   
    $result->close();
    return $content;
  }  

  function footer() {
    return "<table style=\"width:100%;\"><tr><td width=\"80%\"><td nowrap style=\"text-align:right;border:1px solid black\">Date created: " . date("Y-m-d H:i:s") . "</td></tr></table>";
  }
?>
