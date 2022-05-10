<?php include '../util/functions.php' ?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="Profile Page">
   <meta name="keywords" content="HTML, CSS, PHP">
   <meta name="author" content="TGG">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Wellington L. Gaboardi Professinal Website Home</title>
   <link href="/bootstrap-5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
   <script src="/bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
   <link rel="stylesheet" href="/css/profile.css">
   <link rel="stylesheet" href="/css/font-awesome.min.css">
</head>
<body>
<?php include '../../pages/util/navigation.php' ?> 

<!-- Modal Summary -->
<div class="modal fade" id="modalSummary" tabindex="-1" aria-labelledby="ModalLabelSummary" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollabl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabelSummary">Skill</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form name=frmSummary action="../util/crudsummary.php" method="POST">
				<div>
					<label for="txtSummary">Summary text</label>
					<textarea rows=10 class="form-control" name="txtSummary" id="txtSummary" required placeholder="Summary text"></textarea>
				</div>
				<input type="hidden" name="idSummary" id="idSummary" value=""> 
				<input type="hidden" name="deleteRecordSummary" value="N">
			</form>      
  	  </div>
      <div class="modal-footer">
	  <button id="btnDeleteSummary" type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="javascript:deleteRecordSummary()">Delete</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="javascript:document.frmSummary.submit()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Skill -->
<div class="modal fade" id="modalSkill" tabindex="-1" aria-labelledby="ModalLabelSkill" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollabl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabelSkill">Skill</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form name=frmSkill action="../util/crudskill.php" method="POST">
				<div>
					<label for="txtSkill">Skill Name</label>
					<input type="text" class="form-control" name="txtSkill" id="txtSkill" aria-describedby="skillHelp" required placeholder="Skill name">
					<small id="skillHelp" class="form-text text-muted">Input name of skill .</small>
				</div>
				<div class="form-group">
					<label for="selRating">Rating type</label>
					<select name="selSkill" id="selSkill" class="form-control" required>
						<option value=1>TECHNICAL SKILLS</option>
						<option value=2>SOFT SKILLS</option>
					</select>	
					<label for="selRating">Rating Skill</label>
					<select name="selRating" id="selRating" class="form-control" required>
						<option value=1>1 star</option>
						<option value=2>2 stars</option>
						<option value=3>3 stars</option>
						<option value=4>4 stars</option>
						<option value=5>5 stars</option>
					</select>	
					<small id="skillRating" class="form-text text-muted">Select rating of skill.</small>
				</div>
				<input type="hidden" name="idSkill" id="idSkill" value=""> 
				<input type="hidden" name="deleteRecordSkill" value="N">
			</form>      
  	  </div>
      <div class="modal-footer">
	  <button id="btnDeleteSkill" type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="javascript:deleteRecordSkill()">Delete</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="javascript:document.frmSkill.submit()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Job -->
<div class="modal fade" id="modalJob" tabindex="-1" aria-labelledby="ModalLabelJob" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollabl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabelJob">Job Experience</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form name=frmJob action="../util/crudjob.php" method="POST">
				<div class="form-group">
					<label for="txtCompanyJob">Company</label>
					<input type="text" class="form-control" name="txtCompanyJob" id="txtCompanyJob" required placeholder="Company name">
					<label for="txtPositionJob">Position</label>
					<input type="text" class="form-control" name="txtPositionJob" id="txtPositionJob"  required placeholder="Position name">
					<label for="dateStartedJob">Date started</label>
					<input type="date" class="form-control" name="dateStartedJob" id="dateStartedJob"  required placeholder="Date started of job">
					<input type="date" class="form-control" name="dateFinishedJob" id="dateFinishedJob" required placeholder="Date finished of job">
					<textarea rows=10 class="form-control" name="txtDescriptionJob" id="txtDescriptionJob" required placeholder="Description of job activities"></textarea>
				</div>
				<input type="hidden" name="idJob" id="idJob" value=""> 
				<input type="hidden" name="deleteRecordJob" value="N">
			</form>      
  	  </div>
      <div class="modal-footer">
	  <button id="btnDeleteJob" type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="javascript:deleteRecordJob()">Delete</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="javascript:document.frmJob.submit()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Project  -->
<div class="modal fade" id="modalProject" tabindex="-1" aria-labelledby="ModalLabelProject" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollabl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabelProject">Project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form name=frmProject action="../util/crudproject.php" method="POST">
				<div class="form-group">
					<label for="txtProject">Project Name</label>
					<input type="text" class="form-control" name="txtProject" id="txtProject"  required placeholder="Project title">
					<label for="txtPositionproject">Position</label>
					<input type="text" class="form-control" name="txtPositionProject" id="txtPositionProject"  required placeholder="Project position">
					<label for="dateStartedProject">Date started of project</label>
					<input type="date" class="form-control" name="dateStartedProject" id="dateStartedProject"  required placeholder="Date started of project">
					<label for="dateStartedProject">Date finished of project</label>
					<input type="date" class="form-control" name="dateFinishedProject" id="dateFinishedProject"  required placeholder="Date finished of project">
					<label for="dateStartedProject">Url of project image </label>
					<input type="text" class="form-control" name="txtUrlProject" id="txtUrlProject"  required placeholder="Url of project image">
					<label for="dateStartedProject">Description</label>
					<textarea rows=10 class="form-control" name="txtDescriptionProject" id="txtDescriptionProject"  required placeholder="Description of project activities"></textarea>
				</div>
				<input type="hidden" name="idProject" id="idProject" value=""> 
				<input type="hidden" name="deleteRecordProject" value="N">
			</form>      
  	  </div>
      <div class="modal-footer">
	  <button id="btnDeleteProject" type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="javascript:deleteRecordProject()">Delete</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="javascript:document.frmProject.submit()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Education  -->
<div class="modal fade" id="modalEducation" tabindex="-1" aria-labelledby="ModalLabelEducation" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollabl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabelEducation">Education</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form name=frmEducation action="../util/crudeducation.php" method="POST">
				<div class="form-group">
					<label for="txtInstitution">Institution Name</label>
					<input type="text" class="form-control" name="txtInstitution" id="txtInstitution" required placeholder="Institution name">
					<label for="txtCourse">Course Name</label>
					<input type="text" class="form-control" name="txtCourse" id="txtCourse"  required placeholder="Course name">
					<label for="dateStartedCourse">Date started of education</label>
					<input type="date" class="form-control" name="dateStartedCourse" id="dateStartedCourse"  required placeholder="Date started of course">
					<label for="dateFinishedCourse">Date started of education</label>
					<input type="date" class="form-control" name="dateFinishedCourse" id="dateFinishedCourse"  required placeholder="Date finished of course">
					<label for="Course Description">Description course</label>
					<textarea rows=5 class="form-control" name="txtDescriptionCourse" id="txtDescriptionCourse"  required placeholder="Description of course activities"></textarea>
				</div>
				<input type="hidden" name="idEducation" id="idEducation" value=""> 
				<input type="hidden" name="deleteRecordEducation" value="N">
			</form>      
  	  </div>
      <div class="modal-footer">
	  <button id="btnDeleteEducation" type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="javascript:deleteRecordEducation()">Delete</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="javascript:document.frmEducation.submit()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Language  -->
<div class="modal fade" id="modalLanguage" tabindex="-1" aria-labelledby="ModalLabelLanguage" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollabl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabelLanguage">Language</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form name=frmLanguage action="../util/crudlanguage.php" method="POST">
				<div class="form-group">
					<label for="txtLanguage">Language Name</label>
					<input type="text" class="form-control" name="txtLanguage" id="txtLanguage" required placeholder="Language name">
					<label for="selLevelLanguage">Language Level</label>
					<select name="selLevelLanguage" id="selLevelLanguage" class="form-control" required>
						<option value=1>Basic</option>
						<option value=2>Elementary</option>
						<option value=3>Intermediate</option>
						<option value=4>Advanced</option>
						<option value=5>Profiency</option>
					</select>	
				</div>
				<input type="hidden" name="idLanguage" id="idLanguage" value=""> 
				<input type="hidden" name="deleteRecordLanguage" value="N">
			</form>      
  	  </div>
      <div class="modal-footer">
	  <button id="btnDeleteLanguage" type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="javascript:deleteRecordLanguage()">Delete</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="javascript:document.frmLanguage.submit()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hobbie  -->
<div class="modal fade" id="modalHobbie" tabindex="-1" aria-labelledby="ModalLabelHobbie" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollabl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabelHobbie">Hobbie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form name=frmHobbie action="../util/crudhobbie.php" method="POST">
				<div class="form-group">
					<label for="txtHobbie">Hobbie name</label>
					<input type="text" class="form-control" name="txtHobbie" id="txtHobbie" aria-describedby="hobbieHelp" required placeholder="Hobbie name">
					<small id="hobbieHelp" class="form-text text-muted">Input title of hobbie</small>
				</div>
				<input type="hidden" name="idHobbie" id="idHobbie" value=""> 
				<input type="hidden" name="deleteRecordHobbie" value="N">
			</form>      
  	  </div>
      <div class="modal-footer">
	  <button id="btnDeleteHobbie" type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="javascript:deleteRecordHobbie()">Delete</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="javascript:document.frmHobbie.submit()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!--cabeçalho da pagina-->

	<a name=inicio></a>
	<div class="container" style="display:flex">
		<div class="row">
			<div class="col-sm-5 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
				<div class="row img_holder" >
				    <img src="..\..\images\Wellington.jpg" alt="picture">
				</div>
				<div class="row align-items-center">
					<?php retrieveSkill(1);?>   
				</div>	
				<div class="row align-items-center">
					<?php retrieveSkill(2);?>   
			    </div>
			</div>	
			<div class="col-sm-6 col-md-7 col-lg-8 col-xl-8 col-xxl-8">
				<div class=row id=summary>
					<?php retrieveSummary();?>   
				    <div class="row">
						<div class="right_inner">
								<div id="experience">
									<?php retrieveJobExperience();?>   
								</div>	
								<div id="education">
									<?php retrieveEducation();?>   
								</div>   
								<a name="project"></a>
								<div id="project">
									<?php retrieveProject(); ?>
								</div>
								<div id="Languages">
									<?php retrieveLanguage();?>   
								</div>	
								<div id="Hobbies">
									<?php retrieveHobbie(); ?>
								</div>
						</div>					
					</div>	
			</div>
		</div>
	</div>
	<?php include 'c:\resume\pages\util\footer.php' ?>
	<a class="back-to-top" href="#inicio">➣</a>
	<?php if (isset($_SESSION['logged']) && $_SESSION['logged']==true): ?>
	   <a class="icon-pdf" href="../util/createpdf.php" target=_blank>PDF</i></a>
	<?php endif;?>
</body>
<script src="./profile.js" defer></script>
</html>
