<?php
include('mysql.php');
//we can split this depending on key $_POST vars.
function clean_data($data){
	return "'" . mysql_real_escape_string(stripslashes($data)) . "'";
};

function insert_data($table,$row_list,$values){
	$query = mysql_query("INSERT INTO " . $table . " (" . $row_list . ") VALUES(" . $values . ")");
	//debug
	//echo "INSERT INTO " . $table . " (" . $row_list . ") VALUES(" . $values . ")";
	if(!$query){
		echo mysql_error();
	};
};

//diet send
if(isset($_POST['Diet'])){
	$table = "diet";
	$row_list = "resident_id, diet_title, diet_description";
	$values = "" . clean_data($_POST['rid']) . "," . clean_data($_POST['Diet']) . "," . clean_data($_POST['Descr']) . "";
	insert_data($table,$row_list,$values);
};

//allergy send
if(isset($_POST['diag'])){
	$table = "allergy";
	$row_list = "resident_id, allergy_title,allergy_description";
	$values = "" . clean_data($_POST['ri']) . "," . clean_data($_POST['name']) . "," . clean_data($_POST['diag']) . "";
	insert_data($table,$row_list,$values);
};

//hosp send
if(isset($_POST['date'])){
	$table = "hospitalization";
	$row_list = "hospitalization_id, resident_id,hospitalization_date, hospitalization_location, duration_of_stay,reason,medication_changes,diagnosis,notes";
	$values = "" . clean_data($_POST['rid']) . "," . clean_data($_POST['date']) . "," . clean_data($_POST['loc']) . "," . clean_data($_POST['dur']) . "," . clean_data($_POST['reas']) . "," . clean_data($_POST['med']) . "," . clean_data($_POST['dis']) . "," . clean_data($_POST['not']) . "";
	insert_data($table,$row_list,$values);
};

//assessment send
if(isset($_POST['w'])){
	$today = date("Y-m-d");
	$table = "assessment";
	$row_list = "resident_id, weight,assessment_date ,blood_pressure, assess_notes";
	$values = "" . clean_data($_POST['rid']) . "," . clean_data(doubleval($_POST['w'])) . "," . $today . "," . clean_data($_POST['bp']) . "," . clean_data($_POST['note']) . "";
	insert_data($table,$row_list,$values);
};

//resident send
if(isset($_POST['address1'])){
	$table = "resident";
	$row_list = "first_name, middle_name, last_name, address1, address2, city, state, zipcode, home_phone, cell_phone ,date_of_birth";
	$values = "" . clean_data($_POST['first']) . "," . clean_data($_POST['middle']) . "," . clean_data($_POST['last']) . "," . clean_data($_POST['address1']) . "," . clean_data($_POST['address2']) . "," . clean_data($_POST['city']) . "," . clean_data($_POST['state']) . "," . clean_data($_POST['zip']) . "," . clean_data($_POST['home']) . "," . clean_data($_POST['cell']) . "," . clean_data($_POST['bday']) . "";
	insert_data($table,$row_list,$values);
};
//print_r($_POST);
if((isset($_POST['ri'])) || (isset($_POST['rid']))){
	if(isset($_POST['ri'])){
		header('Location: ../data.php?patient=' . $_POST['ri'] . '');
	}else{
		header('Location: ../data.php?patient=' . $_POST['rid'] . '');
	};
}else{
	header('Location: ../homepage.php');
};
?>