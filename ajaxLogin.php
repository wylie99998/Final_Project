<?php
include("myInfo.php");
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
if(true)//isSet($_POST['username']) && isSet($_POST['password']))
{
//$_POST['username'] = 'bob';
// username and password sent from login.php
if(isset($_POST['username']))
$username=$_POST['username'];//mysqli_real_escape_string($db,$_POST['username']); 
if(isset($_POST['password']))
$password=$_POST['password']; 
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "guerraj-db", $pswd, "guerraj-db");

//log in stuff
if(isset($_POST['username'])){
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
}
if(isset($_SESSION['create']))
if(isset($_SESSION['create']) && $_SESSION['create'] == 1){
	
	//insert
		
			$user = $_POST['username'];
			$psswrd = $_POST['password'];
			
			if (!($stmt = $mysqli->prepare("INSERT INTO userInfo(ID, userName, password) VALUES (NULL, '$user', '$psswrd')"))) {
               echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
                                                                                 }
					   
            if (!$stmt->execute()) {
    echo "Error, this username had already been used, please try again. Click <a href='createAccount.php'> Here to return</a>";
}else{		   
    $_SESSION['userName'] = $user;
	$_SESSION['login-user'] = $id;
	$_SESSION['password'] = $psswrd; 
	$_SESSION['logged-in'] = 1;
		header("Location: home.php");
}
}
if(isset($_POST['class']))
		{
			$class = $_POST['class'];
			$rating = $_POST['rating'];
			$review = $_POST['review'];
			$grade = $_POST['grade'];
			$date = $_POST['date'];
			$online = $_POST['online'];
			$user = $_SESSION['userName'];
			if (!($stmt = $mysqli->prepare("INSERT INTO classes(id ,name, rate, review, grade, date, online, userName) VALUES (NULL, '$class', '$rating', '$review', '$grade', '$date', '$online', '$user')"))) {
               echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
                                                                                 }
					   
            if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
} 	
else
header("Location: home.php");	
}

?>