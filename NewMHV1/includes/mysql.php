<?php
function db_connect(){
	//Jer VPS Config
	$db_connection = @mysql_connect('localhost', 'cpsc499', 'AwNKQSaE');
	//default
	//$db_connection = @mysql_connect('localhost');
	$db_selected = @mysql_select_db('residents', $db_connection);
	if (!$db_connection) {
		die('Could not connect: ' . mysql_error());
	};
};

function get_base_resident_info(){
	$query = @mysql_query("SELECT * FROM resident");
	if(!$query){
		echo mysql_error();
	};
	$info = array();
	while ($row = @mysql_fetch_assoc($query)){
		$p = null;
		$p->id = $row['resident_id'];
		$p->firstName = $row['first_name'];
		$p->lastName = $row['last_name'];
		// Push the populated node into the array
		array_push($info, $p);		
	};
	return $info;
};

function get_resident_info($id){
	$query = mysql_query("SELECT * FROM resident WHERE resident_id = " . $id . "");
	if(!$query){
		echo mysql_error();
	};
	$result = mysql_fetch_assoc($query);
	// Test if there is a query fail!
	if(!$result){
		die("Database query failed. - Query for resident data based on resident ID."); 
	}else{
		//Resident Info
		$resident->name = "" . $result['first_name'] . " " . $result['middle_name'] . " " . $result['last_name'] . "";
		$resident->dob = $result['date_of_birth'];
		$resident->homenumber = $result['home_phone'];
		$resident->cellnumber = $result['cell_phone'];
		$resident->address1 = $result['address1'] . " " . $result['address2'];
		$resident->address2 = $result['city'] . ', ' . $result['state'] ." ". $result['zip_code'];
		return $resident;
	};
};

function get_emergency_info($id){
	$Emergency = null;
	$query = mysql_query("SELECT * FROM emergency_contact WHERE resident_id = " . $id . "");
	if(!$query){
		echo mysql_error();
	};
	$result = mysql_fetch_assoc($query);	
	if(!$result){
		//die("Database query failed. - Query for emergency data based on resident ID."); 
		//Emergency data can be null?
		return $Emergency;
	}else{
		$Emergency->name = $result['first_name'] . " " . $result['middle_name'] . " " . $result['last_name'];
		$Emergency->number = $result['phone_number'];
		$Emergency->address1 = $result['address1'];
		$Emergency->address2 = $result['address2']. ', ' . $result['city'].' '.$result['zip_code'];
		$Emergency->relationship = $result['relationship'];
		return $Emergency;
	};
};

function get_doctor_info($id){
	$doctor = null;
	$query = @mysql_query("SELECT * FROM resident_to_doctor WHERE resident_id = " . $id . "");
	if(!$query){
		echo mysql_error();
	};
	$result = @mysql_fetch_assoc($query);
	// Test if there is a query fail!
	if(!$result){
		//die("Database query failed. - Query for resident to doctor data based on resident ID.");
		//Doctor can be null?
		return $doctor;
	}else{
		$doctor->doc_id = $result['doctor_id']; 
	};

	$query = @mysql_query("SELECT * FROM doctor WHERE doctor_id = " . $doctor->doc_id . "");
	if(!$query){
		echo mysql_error();
	};
	$result = @mysql_fetch_array($query);
	if(!$result){
		die("Database query failed. - Query for doctor data based on resident ID."); 
	}else{
		$doctor->specialty = $result['specialization'];
		$doctor->name = $result['first_name'].' '.$result['last_name'];
		$doctor->number = $result['phone_number']; 
	};
	return $doctor;
};

function get_allergy_info($id){
	$query = mysql_query("SELECT * FROM allergy WHERE resident_id = " . $id . "");
	if(!$query){
		echo mysql_error();
	};

	$info = array();
	while ($result = mysql_fetch_assoc($query)){
		$a = null;
		// querying the database to pull the allergy information
		$a->allergy = $result['allergy_title'];
		$a->allergydiagnosis = $result['allergy_description'];
		array_push($info, $a); 	
	};
	return $info;
};

function get_diet_info($id){
	$query = mysql_query("SELECT * FROM diet WHERE resident_id = " . $id . "");
	if(!$query){
		echo mysql_error();
	};			
	
	$info = array();
	while ($result = mysql_fetch_assoc($query)){
		$d = null;
		$d->diet = $result['diet_title'];
		$d->description = $result['diet_description']; 
		array_push($info, $d); 
		// end diet table
	};
	return $info;
};

function get_physical_info($id){
	$Physical = null;
	$query = mysql_query("SELECT * FROM physical WHERE resident_id = " . $id . "");
	if(!$query){
		echo mysql_error();
	};
	$result = @mysql_fetch_assoc($query);
	if(!$result){
		//die("Database query failed. - Query for physical data based on resident ID.");
		//Just kidding, lets go ahead and randomly decide that null values are ok
		return $Physical;
	}else{
		$Physical->lastPhysical = $result['physical_date'];
		return $Physical;
	};
	
};

function get_assessment_info($id){
	$query = mysql_query("SELECT * FROM assessment WHERE resident_id = " . $id . "");
	if(!$query){
		echo mysql_error();
	};	

	$info = array();
	while ($result = mysql_fetch_assoc($query)){
		$instance = null;  
		$instance->date = $result['assessment_date'];
		$instance->weight = $result['weight'];
		$instance->bp = $result['blood_pressure'];
		$instance->note = $result['assess_notes']; 
		
		array_push($info, $instance); 
		
		//End patient assessment table row
	};
	return $info;
};

function get_medication_info($id){
	$medication = null;
	$query = mysql_query("SELECT * FROM medication WHERE resident_id = " . $id . "");
	if(!$query){
		echo mysql_error();
	};
	
	$info = array();
	while ($result = mysql_fetch_array($query)){
		$instance = null; 
		$instance->name = $result['medication_name'];
		$instance->generic = $result['generic_name'];
		$instance->prescribed =$result['med_prescribed'];
		$instance->expire = $result['med_expire'];
		$instance->dose =$result['med_dose(mg)'];
		$instance->freq = $result['med_freq'];
		$instance->purpose = $result['med_purpose'];
		$instance->note = $result['note'];
		array_push($info, $instance); 
	};
	return $info;
};

function get_prescription_info($id){
	$x = null;
	$query = mysql_query("SELECT * FROM prescription WHERE resident_id = " . $id . "");
	if(!$query){
		echo mysql_error();
	};
	
	$info = array();
	while ($row7 = mysql_fetch_array($result7)){
		$x = null;
		$x->number = $result['prescription_number']; 
		$x->ordered = $result['date_ordered']; 
		$x->received = $result['date_received']; 
		$x->amount = $result['quantity']; 
		$x->refill = $result['refill_date']; 
		$x->medid = $result['medication_id']; 
		array_push($info, $x); 
	};
	// for each
	/*for each ($GLOBALS['pre'] as &$w)
	{
	 //get med name
		//$queryxxx = "SELECT medication_name FROM medication WHERE medication_id = $w->medid" ;
		$queryxxx = "SELECT  `medication_name` FROM `medication` WHERE `resident_id` = 1 AND `medication_id` = 1";
		$resulty = mysqli_query($connection, $queryxxx);
		if (!$resulty)
		{
			die("Database query failed"); 
		}	
	
		$rowm = mysqli_fetch($resulty);
		$w->medname = $rowm;   
	}*/	
	return $info;
};

function get_hospitalization_info($id){
	$query = mysql_query("SELECT * FROM hospitalization WHERE resident_id = " . $id . ""); 
	if(!$query){
		echo mysql_error();
	};
	$info = array();
	while ($result = mysql_fetch_array($query)){
		///we are missing reason and otherstudff!!!!!!!!
		$instance = null; 
		$instance->date = $result['hospitalization_date'];
		$instance->location = $result['hospitalization_location'];
		$instance->duration = $result['duration_of_stay'];
		$instance->diagnosis = $result['diagnosis'];// i changed now add reaadson
		$instance->medchange =  $result['medication_changes'];
		$instance->note =  $result['notes'];
		
		array_push($info, $instance); 
		//End patient assessment table row
	};
	return $info;
};

//connect to the db
db_connect();
?>