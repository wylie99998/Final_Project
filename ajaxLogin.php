<?php
include("myInfo.php");
session_start();
error_reporting(E_ALL);
if(true)//isSet($_POST['username']) && isSet($_POST['password']))
{
//$_POST['username'] = 'bob';
// username and password sent from login.php
$username=$_POST['username'];//mysqli_real_escape_string($db,$_POST['username']); 
$password=$_POST['password']; 
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "guerraj-db", $pswd, "guerraj-db");
if($mysqli->connect_errno){
	echo "ERROR";
	echo "Connection error" .$mysqli->connect_erno ."" .$mysqli->connect_error;
	}
	else {		
		if (!($stmt = $mysqli->prepare("SELECT * FROM userInfo WHERE userName LIKE '$_POST[username]'"))) {
               echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
                                                                                 }
					   
            if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
} 		
	}
$psswrd;
$ID;
$user;
if (!$stmt->bind_result($id, $user, $psswrd)) {
    echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}


while ($stmt->fetch()) {
   // $results[i]= sprintf("id = %s , name = %s \n, category = %s \n, length = %s \n, rented = %s \n ", $out_id, $out_name, $out_cat, $out_length, $out_rented);
	if($password == $psswrd){
	$_SESSION['userName'] = $user;
	$_SESSION['login-user'] = $id;
	$_SESSION['password'] = $psswrd; 
	$_SESSION['logged-in'] = 1;
	}
	else 
	$_SESSION['logged-in'] = 0;
}
//echo $user;	
}

else {
	echo'error';
	
}
?>