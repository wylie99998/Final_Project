<?php_egg_logo_guid
session_start();
if(empty($_SESSION['login']))
{
	;//header('Location: login.php');
}
echo 'home!';
?>