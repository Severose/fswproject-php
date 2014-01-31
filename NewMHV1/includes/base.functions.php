<?php
include('mysql.php');
include('base.class.php');
ini_set( 'display_errors', 0 );

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
		if($person->id == $_GET['patient']){
			echo "<option selected='1' value = ".$person->id.">".$person->lastName.", ".$person->firstName." ".$person->id."</option>";
		}else{
			echo "<option value = ".$person->id.">".$person->lastName.", ".$person->firstName." ".$person->id."</option>";
		};
	}//End foreach

	echo "</select>";
	echo '</FORM>';
}

function uploadPhoto()
{
	echo "uploading file";
	$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["imgurl"]["name"]);
$extension = end($temp);
if ((($_FILES["imgurl"]["type"] == "image/gif")
|| ($_FILES["imgurl"]["type"] == "image/jpeg")
|| ($_FILES["imgurl"]["type"] == "image/jpg")
|| ($_FILES["imgurl"]["type"] == "image/pjpeg")
|| ($_FILES["imgurl"]["type"] == "image/x-png")
|| ($_FILES["imgurl"]["type"] == "image/png"))
&& ($_FILES["imgurl"]["size"] < 20000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["imgurl"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["imgurl"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["imgurl"]["name"] . "<br>";
    echo "Type: " . $_FILES["imgurl"]["type"] . "<br>";
    echo "Size: " . ($_FILES["imgurl"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["imgurl"]["tmp_name"] . "<br>";

    if (file_exists("images/" . $_FILES["imgurl"]["name"]))
      {
      echo $_FILES["imgurl"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["imgurl"]["tmp_name"],
      "images/" . $_FILES["imgurl"]["name"]);
      echo "Stored in: " . "images/" . $_FILES["imgurl"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
}
?>