<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$usersss = $_SESSION['user'];
print_r($_SESSION['user']);

if ($usersss)
{
	//user logged in
	if ($_POST['submit'])
	{
		//start changing password
		$oldpassword =$_POST['oldpassword'];
		$newpassword =$_POST['newpassword'];
		$repeatnewpassword =$_POST['repeatnewpassword'];
		//check password against db
		
		//connect db
		$connect=mysql_connect("localhost", "root", "");
		mysql_select_db("loginphp") or die();
		$queryget = mysql_query("SELECT password FROM users WHERE username='$usersss' ") or ("Query didnt work");
		$row = mysql_fetch_assoc($queryget);
		
		$oldpassworddb = $row['password'];
		//echo $oldpassworddb."<br>";
		//echo $oldpassword."<br>";
		//check password
		if ($oldpassword==$oldpassworddb)
		
		  {
		   //check two new password
			        if ($newpassword==$repeatnewpassword)
				   {
 						//success
						$querychange = mysql_query("
						
						UPDATE user SET password='$newpassword' WHERE username='$usersss'
						
						");
						die("Your password has been changed. <a href=''>Return</a> to the main page");
				   }
			       //else	
					die("New password don't match!");
				   }
	 
		else
		die("Old password doesnt match!");
			
			//echo "$oldpassword/$newpassword/$repeatnewpassword";
	}
	else
	{
	echo"<form action='' method='POST'>
	Old password: <input type='text' name='oldpassword'><p>
	New password: <input type='password' name='onewpassword'><br>
	Repeat New password: <input type='password' name='repeatnewpassword'><p>
	<input type='submit' name='submit' value='change password'>
	</form>
	
	";
	}
}
else
die("You must be logged in in to change your password");
?>
</body>
</html>