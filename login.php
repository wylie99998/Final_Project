<?php
session_start();
if(!empty($_SESSION['login_user']))
{
header('Location: home.php');
}

if(!isset($_SESSION['logged-in']) && $_SESSION['logged-in'] != 1){
	echo"
<!doctype html>
<html lang='en'>
<head>
<meta charset='UTF-8' />
<title>Login Page</title>
<link rel='stylesheet' href='style.css'/>
<script src='js/jquery.min.js'></script>
<script src='js/jquery.ui.shake.js'></script>
	<script>
			$(document).ready(function() {
			
			$('#login').click(function()
			{
			var username=$('#username').val();
			var password=$('#password').val();
		    var dataString = 'username='+username+'&password='+password;
			if($.trim(username).length>0 && $.trim(password).length>0)
			{
			
            //ajax request to protected file  
			$.ajax({
            type: 'POST',
            url: 'ajaxLogin.php',
            data: dataString,
            cache: false,
            beforeSend: function(){ $('#login').val('searching database..');},
            success: function(data){
            if(true)
            {
            $('body').load('home.php');//.hide().fadeIn(2000).delay(4000);
            }
            else
            {
             $('#box').shake();
			 $('#login').val('Login');
			 //$('#error').html('<span style='color:#cc0000'>Error:</span> Invalid username and password, please check your inputs');
            }
            }
            });
			
			}
			return false;
			});
			
				
			});
		</script>
</head>

<body>
<div id='main'>
<h1>CS 290 social media experiment</h1>

<div id='box'>
<form action='' method='post'>
<label>Username</label> 
<input type='text' name='username' class='input' autocomplete='off' id='username'/>
<label>Password </label>
<input type='password' name='password' class='input' autocomplete='off' id='password'/><br/>
<input type='submit' class='button button-primary' value='Log In' id='login'/> 
<span class='msg'></span> 

<div id='error'>

</div>	

</div>
</form>	
</div>

</div>
<div>
<a href='createAccount.php'>To create an Account, click Here </a>
</div>
</body>
</html>";
}
else{
	if($_SESSION['logged-in'] == 0){
		header("Location: createAccount.php");
	}else
	header("Location: home.php");
}