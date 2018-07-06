<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login php page</title>
</head>

<body>
<?php

session_start();
if(isset($_SESSION['user']))
{
	echo "You are already logged in";
	exit();
}

if(isset($_POST['submit']))
{

	
	$con=mysql_connect("localhost","root","");
    $db=mysql_select_db("loginphp");
	
	$uname=$_POST['uname'];
	$pwd=$_POST['pwd'];
	
	$sql="SELECT * FROM users";
	$res=mysql_query($sql);
	
	while($row=mysql_fetch_assoc($res))
	{
		$dbuname=$row['username'];
	    $dbpwd=$row['password'];
	
	}
	if($uname==$dbuname && $pwd==$dbpwd)
	{
	    $_SESSION['user']=$uname;
		
		echo"Login successful"."<a href='member.php'>Click here to enter member page</a>";
		
			
	}
	else
	{
		echo"Check username or password";
    }
}

?>
</body>
</html>