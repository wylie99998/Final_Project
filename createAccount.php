<?php
session_start();
ini_set('display_errors', 'On');
$_SESSION['create'] = 1;
echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css">
<title> Log in </title>
</head>
<body>
<section>
<div>
<p>We were unable to find your account, to create an account please fill out the form below</p>
</div>
<form action=ajaxLogin.php  method="post">
   User Name: <input type="text" name="username">
   Password: <input type="password" name="password">
   <input type="submit" value="create account">
   </section>
   </body>
   </html>';
?>
