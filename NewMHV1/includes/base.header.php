<?php
$selectedOption = $_GET['patient']; 
if($selectedOption != '') {
	itemSelected($selectedOption,$resident,$doctor,$Emergency,$allergies,$diets,$Physical,$a,$m,$pre,$h);
};

/* Get each patient's data from the database */
getDropDownBoxData($patients);
?>