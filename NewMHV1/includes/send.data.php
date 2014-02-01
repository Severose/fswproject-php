<?php
include('base.functions.php');
//we can split this depending on key $_POST vars.
function clean_data($data){
	return "'" . mysql_real_escape_string(stripslashes($data)) . "'";
};
function clean_data_update($data){
	return mysql_real_escape_string(stripslashes($data));
};

function insert_data($table,$row_list,$values){
	$query = mysql_query("INSERT INTO " . $table . " (" . $row_list . ") VALUES(" . $values . ")");
	//debug
	//echo "INSERT INTO " . $table . " (" . $row_list . ") VALUES(" . $values . ")";
	if(!$query){
		echo mysql_error();
	};
};

function Update_Data($table,$update_field,$update_data,$field_name,$key){
	for($i=0;$i<count($update_field);$i++){
		if($i==0){
			$statement="$update_field[$i]='$update_data[$i]'";
		}else{
			$statement="$statement, $update_field[$i]='$update_data[$i]' ";
		};
	};
	//echo "<br>";
	//echo "<b>SQL Statement Section:</b> " . $statement . "<br>";
	//echo "<b>Full SQL Query:</b> UPDATE " . $table . " SET " . $statement . " WHERE " . $field_name . "='" . $key . "'<br>";
	$sql_query=mysql_query("UPDATE " . $table . " SET " . $statement . " WHERE " . $field_name . "='" . $key . "'");
	if(!$sql_query){
		echo mysql_error();
	};
};

if((isset($_POST['delete_resident'])) && (isset($_POST['delete_doctor']))){
	//clean the post string, just in case.
	$resident_id = clean_data_update($_POST['delete_resident']);
	$doctor_id = clean_data_update($_POST['delete_doctor']);
	//delete the resident entry
	$query=mysql_query("DELETE FROM `resident` WHERE `resident_id` = '" . $resident_id . "'");
	if(!$query){
		echo mysql_error();
	};
		//delete from allergic_medication
		$query=mysql_query("DELETE FROM `allergic_medication` WHERE `resident_id` = '" . $resident_id . "'");
		if(!$query){
			echo mysql_error();
		};
		//delete from allergy
		$query=mysql_query("DELETE FROM `allergy` WHERE `resident_id` = '" . $resident_id . "'");
		if(!$query){
			echo mysql_error();
		};
		//delete from assessment
		$query=mysql_query("DELETE FROM `assessment` WHERE `resident_id` = '" . $resident_id . "'");
		if(!$query){
			echo mysql_error();
		};
		//delete from diet
		$query=mysql_query("DELETE FROM `diet` WHERE `resident_id` = '" . $resident_id . "'");
		if(!$query){
			echo mysql_error();
		};
		//delete from hospitalization
		$query=mysql_query("DELETE FROM `hospitalization` WHERE `resident_id` = '" . $resident_id . "'");
		if(!$query){
			echo mysql_error();
		};
		//delete from medication
		$query=mysql_query("DELETE FROM `medication` WHERE `resident_id` = '" . $resident_id . "'");
		if(!$query){
			echo mysql_error();
		};
		//delete from medication_history
		$query=mysql_query("DELETE FROM `medication_history` WHERE `resident_id` = '" . $resident_id . "'");
		if(!$query){
			echo mysql_error();
		};
		//delete from physical
		$query=mysql_query("DELETE FROM `physical` WHERE `resident_id` = '" . $resident_id . "'");
		if(!$query){
			echo mysql_error();
		};
		//delete from perscription
		$query=mysql_query("DELETE FROM `prescription` WHERE `resident_id` = '" . $resident_id . "'");
		if(!$query){
			echo mysql_error();
		};
		//delete from resident_to_doctor
		$query=mysql_query("DELETE FROM `resident_to_doctor` WHERE `resident_id` = '" . $resident_id . "'");
		if(!$query){
			echo mysql_error();
		};
	//delete the doctor entry
	$query=mysql_query("DELETE FROM `doctor` WHERE `doctor_id` = '" . $doctor_id . "'");
	if(!$query){
		echo mysql_error();
	};
	//delete the emergency contact info
	$query=mysql_query("DELETE FROM `emergency_contact` WHERE `resident_id` = '" . $resident_id . "'");
	if(!$query){
		echo mysql_error();
	};
	//die;
};

//resident update send
if(isset($_POST['update_resident'])){
	//resident info
	$table = "resident";
	$field_name="resident_id";
	$key=$_POST['resident_id'];
	$update_data=array();
	$update_data[0]=clean_data_update($_POST['first']);
	$update_data[1]=clean_data_update($_POST['middle']);
	$update_data[2]=clean_data_update($_POST['last']);
	$update_data[3]=clean_data_update($_POST['address1']);
	$update_data[4]=clean_data_update($_POST['address2']);
	$update_data[5]=clean_data_update($_POST['city']);
	$update_data[6]=clean_data_update($_POST['state']);
	$update_data[7]=clean_data_update($_POST['zip']);
	$update_data[8]=clean_data_update($_POST['home']);
	$update_data[9]=clean_data_update($_POST['cell']);
	$update_data[10]=clean_data_update($_POST['db']);
	//only do a photo upload if they changed it
	if($_FILES["imgurl"]["name"] != ""){
		$update_data[11]=clean_data_update("images/" . $_FILES["imgurl"]["name"]);
	};
	
	$update_field=array();
	$update_field[0]="first_name";
	$update_field[1]="middle_name";
	$update_field[2]="last_name";
	$update_field[3]="address1";
	$update_field[4]="address2";
	$update_field[5]="city";
	$update_field[6]="state";
	$update_field[7]="zip_code";
	$update_field[8]="home_phone";
	$update_field[9]="cell_phone";
	$update_field[10]="date_of_birth";
	if($_FILES["imgurl"]["name"] != ""){
		$update_field[11]="imgurl";
	
		//upload the image before we go about adding it to the database
		uploadPhoto();
	};
	//submit resident info query for update
	Update_Data($table,$update_field,$update_data,$field_name,$key);
	//overwrite some variables!
	//doctor info
	$table = "doctor";
	$field_name = "doctor_id";
	$key=$_POST['doctor_id'];
	$update_data=array();
	$update_data[0]=clean_data_update($_POST['dname']);
	$update_data[1]=clean_data_update($_POST['dlast']);
	$update_data[2]=clean_data_update($_POST['ds']);
	$update_data[3]=clean_data_update($_POST['dph']);

	$update_field=array();
	$update_field[0]="first_name";
	$update_field[1]="last_name";
	$update_field[2]="specialization";
	$update_field[3]="phone_number";
	//submit doctor info query for update
	Update_Data($table,$update_field,$update_data,$field_name,$key);
	
	
	//overwrite even more variables!
	//emergency info
	$table = "emergency_contact";
	$field_name = "resident_id";
	$key=$_POST['resident_id'];
	$update_data=array();
	$update_data[0]=clean_data_update($_POST['cfirst']);
	$update_data[1]=clean_data_update($_POST['cmiddle']);
	$update_data[2]=clean_data_update($_POST['clast']);
	$update_data[3]=clean_data_update($_POST['chome']);
	$update_data[4]=clean_data_update($_POST['caddress1']);
	$update_data[5]=clean_data_update($_POST['caddress2']);
	$update_data[6]=clean_data_update($_POST['ccity']);
	$update_data[7]=clean_data_update($_POST['czip']);
	$update_data[8]=clean_data_update($_POST['crelation']);

	$update_field=array();
	$update_field[0]="first_name";
	$update_field[1]="middle_name";
	$update_field[2]="last_name";
	$update_field[3]="phone_number";
	$update_field[4]="address1";
	$update_field[5]="address2";
	$update_field[6]="city";
	$update_field[7]="zip_code";
	$update_field[8]="relationship";
	//submit emergency info query for update
	Update_Data($table,$update_field,$update_data,$field_name,$key);
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
	$row_list = "first_name, middle_name, last_name, address1, address2, city, state, zipcode, home_phone, cell_phone ,date_of_birth, imgurl";
	$values = "" . clean_data($_POST['first']) . "," . clean_data($_POST['middle']) . "," . clean_data($_POST['last']) . "," . clean_data($_POST['address1']) . "," . clean_data($_POST['address2']) . "," . clean_data($_POST['city']) . "," . clean_data($_POST['state']) . "," . clean_data($_POST['zip']) . "," . clean_data($_POST['home']) . "," . clean_data($_POST['cell']) . "," . clean_data($_POST['bday']) . "," . clean_data($_POST['img']) ."";
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