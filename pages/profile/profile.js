// Javascript functions database

    function deleteRecordSkill() {
		document.frmSkill["deleteRecordSkill"].value="Y";
		document.frmSkill.submit();
	}

	function deleteRecordSummary() {
		document.frmSummary["deleteRecordSummary"].value="Y";
		document.frmSummary.submit();
	}

	function deleteRecordEducation() {
		document.frmEducation["deleteRecordEducation"].value="Y";
		document.frmEducation.submit();
	}

	function deleteRecordJob() {
		document.frmJob["deleteRecordJob"].value="Y";
		document.frmJob.submit();
	}

	function deleteRecordProject() {
		document.frmProject["deleteRecordProject"].value="Y";
		document.frmProject.submit();
	}

	function deleteRecordLanguage() {
		document.frmLanguage["deleteRecordLanguage"].value="Y";
		document.frmLanguage.submit();
	}

	function deleteRecordHobbie() {
		document.frmHobbie["deleteRecordHobbie"].value="Y";
		document.frmHobbie.submit();
	}

	function updateSummary(id) {
        if (id!=null) {
		    document.getElementById('txtSummary').textContent=document.getElementById("txtSummary-" + id).innerHTML;
		    document.frmSummary.idSummary.value=id;
        }    
	}		  

	function updateSkill(type,id) {
        document.frmSkill.reset();

        if (id!=null) {
            document.getElementById("selSkill").value=type;
            document.getElementById("selRating").value=document.getElementById("selRating-" + id).innerHTML;
		    document.getElementById("txtSkill").value=document.getElementById("txtSkill-" + id).innerHTML;

		    document.frmSkill.idSkill.value=id;
        }    
	}		  

	function updateEducation(id) {
        document.frmEducation.reset();
        if (id!=null) {
            document.getElementById("txtInstitution").value=document.getElementById("txtInstitution-" + id).innerHTML;
            document.getElementById("txtCourse").value=document.getElementById("txtCourse-" + id).innerHTML;
            document.getElementById("dateStartedCourse").value=document.getElementById("dateStartedCourse-" + id).innerHTML;
            document.getElementById("dateFinishedCourse").value=document.getElementById("dateFinishedCourse-" + id).innerHTML;
            document.getElementById("txtDescriptionCourse").textContent=document.getElementById("txtDescriptionCourse-" + id).innerHTML;
            document.frmEducation.idEducation.value=id;
        }    
	}

	function updateJob(id) {
        document.frmJob.reset();
        if (id!=null) {
            document.getElementById("txtCompanyJob").value=document.getElementById("txtCompanyJob-" + id).innerHTML;
            document.getElementById("txtPositionJob").value=document.getElementById("txtPositionJob-" + id).innerHTML;
            document.getElementById("dateStartedJob").value=document.getElementById("dateStartedJob-" + id).innerHTML;
            document.getElementById("dateFinishedJob").value=document.getElementById("dateFinishedJob-" + id).innerHTML;
            document.getElementById("txtDescriptionJob").textContent=document.getElementById("txtDescriptionJob-" + id).innerHTML;
            document.frmJob.idJob.value=id;
        }    
	}

	function updateProject(id) {
        if (id!=null) {
            document.getElementById("txtProject").value=document.getElementById("txtProject-" + id).innerHTML;
            document.getElementById("txtPositionProject").value=document.getElementById("txtPositionProject-" + id).innerHTML;
            document.getElementById("dateStartedProject").value=document.getElementById("dateStartedProject-" + id).innerHTML;
            document.getElementById("dateFinishedProject").value=document.getElementById("dateFinishedProject-" + id).innerHTML;
            document.getElementById("txtDescriptionProject").textContent=document.getElementById("txtDescriptionProject-" + id).innerHTML;
            document.getElementById("txtUrlProject").value=document.getElementById("txtUrlProject-" + id).innerHTML;
            document.frmProject.idProject.value=id;
        }    
	}


	function updateLanguage(id) {
        if (id!=null) {
            document.getElementById("selLevelLanguage").value=document.getElementById("selLevel-" + id).innerHTML;
		    document.getElementById("txtLanguage").value=document.getElementById("txtLanguage-" + id).innerHTML;
		    document.frmLanguage.idLanguage.value=id;
        }    
	}		  

	function updateHobbie(id) {
        if (id!=null) {
		    document.getElementById('txtHobbie').value=document.getElementById("txtHobbie-"+id).innerHTML;
            document.frmHobbie.idHobbie.value=id; // id
        }    
	}		  