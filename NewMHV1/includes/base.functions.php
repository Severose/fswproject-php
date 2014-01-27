<?php
include('mysql.php');
include('base.class.php');

/* Function which generates the webpage; called when a patient is selected from the dropdown box
 * @param selectedOption - current patient ID */
function itemSelected($selectedOption,&$resident,&$doctor,&$Emergency,&$allergies,&$diets,&$Physical,&$a,&$m,&$pre,&$h)
{
	$resident = get_resident_info($selectedOption);
	$Emergency = get_emergency_info($selectedOption);
	$doctor = get_doctor_info($selectedOption);
	$allergies = get_allergy_info($selectedOption);
	$diets = get_diet_info($selectedOption);
	$Physical = get_physical_info($selectedOption);
	$a = get_assessment_info($selectedOption);
	$m = get_medication_info($selectedOption);
	$pre = get_prescription_info($selectedOption);
	$h = get_hospitalization_info($selectedOption);
	
}

function getDropDownBoxData(&$patients){
	$patients = get_base_resident_info();
}

//Generate the patient dropdown box
function generateDropDownBox(&$patients)
{
	echo '<FORM method="GET" action="data.php" >';
	echo '<select name="patient" class = "btn btn-primary btn-lg box " ONCHANGE="this.form.submit();">';

	echo "<option value = 0></option>";

	/* Place each patient in the dropdown box */
	foreach ($patients as &$person) 
	{
		echo "<option value = ".$person->id.">".$person->lastName.", ".$person->firstName." ".$person->id."</option>";
	}//End foreach

	echo "</select>";
	echo '</FORM>';
}
?>