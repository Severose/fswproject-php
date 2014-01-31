<?php
/* Patient information struct */
class PatientStruct
{
	public $id; // patient id
	public $firstName; //first name
	public $lastName; // last name
}


$patients = array(); // array of patient structs


// Resident info 
class ResidentInfo
{
	public $name; 
	public $dob; 
	public $homenumber; 
	public $cellnumber; 
	public $address1; 
	public $address2; 
	public $imgurl;
}

$resident = new ResidentInfo(); // create one resident info struct

// Doctor info
class DoctorInfo
{
	public $doc_id; 
	public $specialty; 
	public $name; 
	public $number; 
}

$doctor = new DoctorInfo(); // create one doctor info struct

// Physical Info
class physicalInfo 
{
	public $lastPhysical; 
}

$Physical = new physicalInfo(); // create one physical instance


//Emergency Contact
class EmergencyContactInfo
{
	public $name; 
	public $number; 
	public $address1; 
	public $address2; 
}

$Emergency = new EmergencyContactInfo();  // create one emergency contact info

class AllergyInfo
{
	public $allergy; 
	public $allergydiagnosis; 
}

$allergies = array(); // create an array of allergies


class DietInfo
{
	public $diet; 
	public $description; 
}

$diets = array(); // create an array of allergies

class assessment
{
	public $date; 
	public $time; 
	public $weight; 
	public $bp; 
	public $note; 
}

$a = array(); // array of assessments

class medication
{
	public $name; 
	public $generic; 
	public $prescribed; 
	public $expire; 
	public $dose;
	public $freq;
	public $purpose; 
	public $note;  
}

$m = array(); // array of assessments

class hospitalization
{
	public $date; 
	public $location; 
	public $duration; 
	public $diagnosis; 
	public $medchange; 
	public $note; 
}

$h = array(); 

class prescription
{
	public $number; 
	public $medid;
	public $medname; 
	public $ordered; 
	public $received; 
	public $amount; 
	public $refill; 
	 
	
}

$pre = array(); 
?>