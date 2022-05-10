<?php  

//Author: TGG
//Date created: 2022 Apr
//Comments: general database functions 

//test user logged 
function logged() {
	return ((isset($_SESSION['logged']) && $_SESSION['logged']==true)); 
}


// function to retrieve Summary */
// modalSummary
function retrieveSummary() {
	include("../util/connection.php");

  $query = "select id_summary, me_summary from summary where id_user=" . $_SESSION['id_user'];
  $result = mysqli_query($con, $query);
  echo "<div class=\"section\">";
  
  if ($result && mysqli_num_rows($result) ==0) {
	if (logged())  {
		echo "<button type=\"button\" class=\"btn \" data-bs-toggle=\"modal\" data-bs-target=\"#modalSummary\">";
		echo  "<a class=\"fa icon fa-edit\" href=\"javascript:updateSummary(null);\"></a>" ;  
		echo "</button>";
	}
  }  
  echo "SUMMARY</div>";

  if ($result && mysqli_num_rows($result) > 0) {
	$summary = mysqli_fetch_assoc($result);
	if  (isset($summary['me_summary'])) echo "<div class=memo>";
	if (logged()) {
		echo "<button type=\"button\" class=\"btn \" data-bs-toggle=\"modal\" data-bs-target=\"#modalSummary\">";
		echo  "<a class=\"fa icon fa-edit\" href=\"javascript:updateSummary(" . $summary['id_summary'] . ");\"></a>" ;
		echo "</button>";
	}	
	echo "<span id=\"txtSummary-$summary[id_summary]\">" . $summary['me_summary'] . "</span>";
	echo "</div>";
  }   
  $result->close();
  }

// function to retrieve Education */
// modalEducation
function retrieveEducation() {
	include("../util/connection.php");

  $query = "select id_education, dt_started, dt_finished, DATE_FORMAT(dt_started,'%Y-%m') as dt_started_formatted, DATE_FORMAT(dt_finished,'%Y-%m') as dt_finished_formatted, tx_course, tx_institution, me_description from education where id_user=" . $_SESSION['id_user'] . " order by dt_started desc";
  $result = mysqli_query($con, $query);

  if ($result && mysqli_num_rows($result) > 0) {
	echo "<div class=\"section\">";
	if (logged()) {
		echo "<button type=\"button\" class=\"btn \" data-bs-toggle=\"modal\" data-bs-target=\"#modalEducation\">";
		echo  "<a class=\"fa icon fa-edit\" href=\"javascript:updateEducation(null);\"></a>" ;
		echo "</button>";
	}	
	echo "EDUCATION</div><div class=\"exp_wrap\"><ul>";	
	while ($education = $result->fetch_assoc()) {
	  echo "<li><div class=\"li_wrap\">";
	  if  (isset($education['tx_institution'])) echo "<p class=\"info_title\">"; 
	  if (logged()) {
		echo "<button type=\"button\" class=\"btn \" data-bs-toggle=\"modal\" data-bs-target=\"#modalEducation\">";
		  echo  "<a class=\"fa icon fa-edit\" href=\"javascript:updateEducation(" . $education['id_education'] . ");\"></a>" ;  
		  echo "</button>";
	  }	  

	  echo "<span id=\"txtInstitution-$education[id_education]\">" . $education['tx_institution'] . "</span></p>";
	  echo "<div class=\"info\">";
	  if  (isset($education['dt_started'])) echo "<div class=date>[ " .  $education['dt_started_formatted'] . ($education['dt_finished_formatted']==="0000-00"?" / Present": " / " . $education['dt_finished_formatted']) . " ]</div>";
	  if  (isset($education['tx_course'])) echo "<p id=\"txtCourse-$education[id_education]\" class=\"info_com\">" . $education['tx_course'] . "</p>";
	  if  (isset($education['me_description'])) echo "<p id=\"txtDescriptionCourse-$education[id_education]\" class=\"info_description\">" . $education['me_description'] . "</p>";
	  echo "<span class=\"invisible\" id=\"dateStartedCourse-$education[id_education]\">" . $education['dt_started'] . "</span>";
	  echo "<span class=\"invisible\" id=\"dateFinishedCourse-$education[id_education]\">" . $education['dt_finished'] . "</span>";

      echo "</div></div></li>";
	}
	echo "</ul></div></div>";
  }   
  $result->close();
}

// function to retrieve Job Experiences */
// modalJob
function retrieveJobExperience() {
	include("../util/connection.php");

  $query = "select id_job, dt_started, dt_finished, DATE_FORMAT(dt_started,'%Y-%m-%d') as dt_started_formatted, DATE_FORMAT(dt_finished,'%Y-%m-%d') as dt_finished_formatted, tx_position, tx_company, me_experience from job_experience where id_user=" . $_SESSION['id_user'] . " order by dt_started desc";
  $result = mysqli_query($con, $query);

  if ($result && mysqli_num_rows($result) > 0) {
	echo "<div class=\"section\">";
	if (logged()) {
		echo "<button type=\"button\" class=\"btn \" data-bs-toggle=\"modal\" data-bs-target=\"#modalJob\">";
		echo  "<a class=\"fa icon fa-edit\" href=\"javascript:updateJob(null);\"></a>" ;  
		echo "</button>";
	} 	

	echo "EXPERIENCE</div><div class=\"exp_wrap\"><ul>";	
	while ($job = $result->fetch_assoc()) {
	  echo "<li>";
	  if (logged()) {
		  echo "<button type=\"button\" class=\"btn \" data-bs-toggle=\"modal\" data-bs-target=\"#modalJob\">";
		  echo  "<a class=\"fa icon fa-edit\" href=\"javascript:updateJob(" . $job['id_job'] . ");\"></a>" ;  
		  echo "</button>";
		} 	  
		echo "<div class=\"li_wrap\">";
		if  (isset($project['dt_started'])) echo "<div class=date>[ " .  $$job['dt_started_formatted'] . ($job['dt_finished_formatted']==="0000-00"?" / Present": " / " . $job['dt_finished_formatted']) . " ] </div>";
		echo "<div class=\"info\">";
	  if  (isset($job['tx_position'])) echo "<p id=\"txtPositionJob-$job[id_job]\" class=\"info_title\">" . $job['tx_position'] . "</p>";
	  if  (isset($job['tx_company'])) echo "<p id=\"txtCompanyJob-$job[id_job]\" class=\"info_com\">" . $job['tx_company'] . "</p>";
	  if  (isset($job['me_experience'])) echo "<p id=\"txtDescriptionJob-$job[id_job]\" class=\"info_experience\">" . $job['me_experience'] . "</p>";
	  echo "<span class=\"invisible\" id=\"dateStartedJob-$job[id_job]\">" . $job['dt_started'] . "</span>";
	  echo "<span class=\"invisible\" id=\"dateFinishedJob-$job[id_job]\">" . $job['dt_finished'] . "</span>";

      echo "</div></div></li>";
	}
	echo "</ul></div></div>";
  }   
  $result->close();
}

// function to retrieve projects */
//modalProjects
function retrieveProject() {
	include("../util/connection.php");

  $query = "select id_project, dt_started, dt_finished, DATE_FORMAT(dt_started,'%Y-%m') as dt_started_formatted, DATE_FORMAT(dt_finished,'%Y-%m') as dt_finished_formatted, tx_project, tx_position, me_description, tx_url_image from project where id_user=" . $_SESSION['id_user'] . " order by dt_started desc";
  $result = mysqli_query($con, $query);

  if ($result && mysqli_num_rows($result) > 0) {
	echo "<div class=\"section\">";
    if (logged()) {
		echo "<button type=\"button\" class=\"btn \" data-bs-toggle=\"modal\" data-bs-target=\"#modalProject\">";
		echo  "<a class=\"fa icon fa-edit\" href=\"javascript:updateProject(null);\"></a>" ;
	   echo "</button>";
    } 
	echo "PROJECTS</div><div class=\"exp_wrap\"><ul>";	
	while ($project = $result->fetch_assoc()) {
	  echo "<li><div class=\"li_wrap\">";
	  if  (isset($project['tx_project'])) echo "<p class=\"info_title\">" ;
	  if (logged())  {
		echo "<button type=\"button\" class=\"btn \" data-bs-toggle=\"modal\" data-bs-target=\"#modalProject\">";
	     echo  "<a class=\"fa icon fa-edit\" href=\"javascript:updateProject(" . $project['id_project'] . ");\"></a>" ;
		 echo "</button>";
      }
	  echo 	  "<span id=\"txtProject-$project[id_project]\">" . $project['tx_project'] . "</span><div class=\"info\">";
	  if  (isset($project['dt_started'])) echo "<div class=date>[ " .  $project['dt_started_formatted'] . ($project['dt_finished_formatted']==="0000-00"?" / Present": " / " . $project['dt_finished_formatted']) . " ] </div>";
	  if  (isset($project['tx_position'])) echo "<p id=\"txtPositionProject-$project[id_project]\">" . $project['tx_position'] . "</p>";
	  if  (isset($project['me_description'])) echo "<p id=\"txtDescriptionProject-$project[id_project]\" class=\"info_experience\">" . $project['me_description'] . "</p>";
	  echo "<span class=\"invisible\" id=\"dateStartedProject-$project[id_project]\">" . $project['dt_started'] . "</span>";
	  echo "<span class=\"invisible\" id=\"dateFinishedProject-$project[id_project]\">" . $project['dt_finished'] . "</span>";
	  echo "<span class=\"invisible\" id=\"txtUrlProject-$project[id_project]\">" . $project['tx_url_image'] . "</span>";
      echo "</div></div></li>";
	}
	echo "</ul></div>";
  }   
  $result->close();
}
// function to retrieve skills */
function retrieveSkill($tipo) {
		include("../util/connection.php");
		$query = "select id_skill,tx_skill, nr_rating_skill from skill where tp_skill=" . $tipo . " and id_user=" . $_SESSION['id_user'] ." order by tx_skill";
		$result = mysqli_query($con, $query);
	
		if ($result && mysqli_num_rows($result) > 0) {
			if ($tipo==1) echo "<div class=title>TECHNICAL SKILLS";
			if ($tipo==2) echo "<div class=title>SOFT SKILLS";
			if (logged()) {
				echo "<button type=\"button\" class=\"btn\" data-bs-toggle=\"modal\" data-bs-target=\"#modalSkill\">";
				echo  "<a class=\"fa icon fa-edit\" href=\"javascript:updateSkill(" . $tipo . ",null);\"></a>" ;  
				echo "</button>";
			} 	
			echo "</div>";
	
			echo "<ul class=none>";
			while ($row = $result->fetch_assoc()) {
			  echo "<li><div class=\"row skill\"><div class=col-sm-6 col-lg-6 col-6 col-md-6 col-xl-8 col-xxl-8><div class=\"row text\">";
			  if (logged()) {
				 echo "<button type=\"button\" class=\"btn btn-link\" data-bs-toggle=\"modal\" data-bs-target=\"#modalSkill\">";
				 echo  "<a class=\"fa icon fa-edit\" href=\"javascript:updateSkill(" . $tipo . ",". $row['id_skill'] . ");\"></a>" ;
				 echo "</button>";
			  }		 
			  echo "<span id=\"txtSkill-$row[id_skill]\">" . $row['tx_skill'] . "</span></div></div>" ;
			  if  (isset($row['tx_skill'])) {
				  echo "<div class=col-sm-6 col-lg-6 col-6 col-md-4 col-xl-4 col-xxl-4>";
				  for ($counter=1;$counter<=5;$counter++) {
					  if ($counter <= $row['nr_rating_skill']) 
						 echo "<span class=\"star filled\">★</span>" ;
					  else 	 
					  echo "<span class=\"star\">★</span>" ;
					}	  
				echo "<span class=\"invisible\" id=\"selRating-$row[id_skill]\">" . $row['nr_rating_skill'] . "</span>";
	
			  }		  
			  echo "</div></div></li>"; 
			}  
			
			echo "</ul>";
		}	
		$result->close();
	  }	
	
  
// function to retrieve languages  */
//modalLanguages
function retrieveLanguage() {
	include("../util/connection.php");

  $query = "select id_language,tx_language,nr_level_language from language where id_user=" . $_SESSION['id_user'] . " order by tx_language";
  $result = mysqli_query($con, $query);

  if ($result && mysqli_num_rows($result) > 0) {
	echo "<div class=\"section\">";
	if (logged()) {
		echo "<button type=\"button\" class=\"btn \" data-bs-toggle=\"modal\" data-bs-target=\"#modalLanguage\">";
		echo  "<a class=\"fa icon fa-edit\" href=\"javascript:updateLanguage(null);\"></a>" ;
		echo "</button>";
	} 	
	echo "LANGUAGES</div><div class=\"exp_wrap\"><ul>";	
	while ($language = $result->fetch_assoc()) {
	  echo "<li><div class=\"info\">";
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
	
		if  (isset($language['tx_language'])) echo "<p class=\"info_title\">";
		if (logged()) {
			echo "<button type=\"button\" class=\"btn \" data-bs-toggle=\"modal\" data-bs-target=\"#modalLanguage\">";
			echo  "<a class=\"fa icon fa-edit\" href=\"javascript:updateLanguage(" . $language['id_language'] . ");\"></a>" ;  
			echo "</button>";
		} 
		echo "<span id=\"txtLanguage-$language[id_language]\">" . $language['tx_language'] . "</span>";
		if  (isset($language['nr_level_language'])) echo " [ " . $nivel . " ]</p><span class=\"invisible\" id=\"selLevel-$language[id_language]\">" . $language['nr_level_language']. "</span>"; 	    
        echo "</div></li>";
	}
	echo "</ul></div>";
  }   
  $result->close();
}

   // function to retrieve hobbies */
   //modalHobbie
function retrieveHobbie() {
	include("../util/connection.php");

  $query = "select id_hobbie,tx_hobbie from hobbie where id_user=" . $_SESSION['id_user'] . " order by tx_hobbie";
  $result = mysqli_query($con, $query);

  if ($result && mysqli_num_rows($result) > 0) {
	echo "<div class=\"section\">";
	if (logged()) {
		echo "<button type=\"button\" class=\"btn \" data-bs-toggle=\"modal\" data-bs-target=\"#modalHobbie\">";
		echo  "<a class=\"fa icon fa-edit\" onclick=\"javascript:updateHobbie(null);\"></a>" ;
		echo "</button>";
	}
	echo "HOBBIES</div>";

	echo "<div class=\"hobbies_wrap\"><ul>";	
	while ($hobbie = $result->fetch_assoc()) {
	  echo "<li><div class=\"li_wrap\">";
	  if  (isset($hobbie['tx_hobbie'])) echo "<div class=info><p class=\"info_title\">";
	  if (logged()) {
		echo "<button type=\"button\" class=\"btn \" data-bs-toggle=\"modal\" data-bs-target=\"#modalHobbie\">";
	      echo  "<a class=\"fa icon fa-edit\" onclick=\"javascript:updateHobbie(" . $hobbie['id_hobbie'] . ");\"></a>" ;
		  echo "</button>";
	  } 
	  echo "<span id=\"txtHobbie-$hobbie[id_hobbie]\">" . $hobbie['tx_hobbie'] . "</span></p></div>";
      echo "</div></li>";
	}
	echo "</ul></div>";
  }   
  $result->close();
}


?>
