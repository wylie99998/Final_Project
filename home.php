<?php
session_start();
include 'myInfo.php';
if(!isset($_SESSION['logged-in']))
{
	header("Location: login.php");
}
else{
class t
{
	public $s_id;
	public $s_name;
	public $s_rate;
	public $s_review;
	public $s_grade;
	public $s_date;
	public $s_online;
	public $s_username;
	function oprint(){
		echo $this->s_id . $this->s_name . $this->s_rate . $this->s_grade . $this->s_date . $this->s_online;
	}
}
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "guerraj-db", $pswd, "guerraj-db");
if($mysqli->connect_errno){
	echo "ERROR";
	echo "Connection error" .$mysqli->connect_erno ."" .$mysqli->connect_error;
	}
	else {
	     //fetch table
        
			$results = array();
			$i = 1;
			if (!($stmt = $mysqli->prepare("SELECT id ,name, rate, review, grade, date, online, userName FROM classes"))) {
               echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
                                                                                 }
					   
            if (!$stmt->execute()) {
             echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
} 			   
$out_id;
$out_name;
$out_rate;
$out_review;
$out_grade;
$out_date;
$out_online;
$out_username;
if (!$stmt->bind_result($out_id, $out_name, $out_rate, $out_review, $out_grade, $out_date, $out_online, $out_username)) {
    echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}
while ($stmt->fetch()) {
   // $results[i]= sprintf("id = %s , name = %s \n, category = %s \n, length = %s \n, rented = %s \n ", $out_id, $out_name, $out_cat, $out_length, $out_rented);
	$results[$i] = new t;
	$results[$i]->s_id = $out_id;
	$results[$i]->s_name = $out_name;
	$results[$i]->s_rate = $out_rate;
	$results[$i]->s_review = $out_review;
	$results[$i]->s_grade = $out_grade;
	$results[$i]->s_date = $out_date;
	$results[$i]->s_online = $out_online;
	$results[$i]->s_username = $out_username;
   // $results[$i]->oprint();
	$i= $i +1;
	
}
	}
echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css">
<title> homepage </title>
</head>
<body>
<section>
<p><strong>Welcome to the OSU class rating board! </strong></p>
<p>This site is dedicated to sharing information about classes between students.  
You can input a variety of information about the classes you have taken, which is shared
across users of this site.  </p>
</section>


<section><table>
   <tr> <td> ID </td> <td> Class Name </td>  <td> Rating </td> <td> Review </td>  <td> Grade </td> <td> Date </td> <td> Online </td> <td> Posted userName </td></tr>';
  
         for($i=1; $i<=count($results); $i++) 
		 {
	       echo '<tr> <td>';
           echo $results[$i]->s_id;
	       echo "</td> <td>";
		    echo $results[$i]->s_name;
	       echo "</td> <td>";
		    echo $results[$i]->s_rate;
	       echo "</td> <td>";
		    echo $results[$i]->s_review;
	       echo "</td> <td>";
		   echo $results[$i]->s_grade;
	       echo "</td> <td>";
		   echo $results[$i]->s_date;
	       echo "</td> <td>";
		   if($results[$i]->s_online == 't')
		   echo 'Yes';
	       else 
			   echo 'No';
	       echo "</td> <td>";
		   echo $results[$i]->s_username;
	       echo "</td> <td>";
}
echo '</table>
</section><div>
<br>
<br>
<div>
Insert New Class information here! It will automatically log your username for other users. 
<form id="bubble" action=ajaxLogin.php  method="post">
Class Name:   <input type="text" name="class" required>
<br>
Class Rating (1-10): <input type="number" name="rating" required>
<br>
Review:   <input type="text" name="review" required>
<br>
Grade:   <input type="text" name="grade" required>
<br>
Date:   <input type="date" name="date" required>
<br>
Online Class:   Yes <input type="checkbox" value="true" name="online" >  No <input type="checkbox" value="false" name="online" >
<br>
<input type="submit" value= "Submit">

<br>

</form>';

}
?>