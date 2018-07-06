<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Password change</title>
</head>

<body>
<?php
session_start();
$usersss=$_SESSION['user'];

if($usersss)
{
?>
	
   <form name='frmmm' method='post'>
       <table>
          <tr>
            <td>Enter old password :</td>
            <td><input type='password' name='oldpwd'></td>
          </tr>
          <tr>
            <td>Enter new password :</td>
            <td><input type='password' name='newpwd'></td>
          </tr>
           <tr>
            <td>Re-enter new password :</td>
            <td><input type='password' name='rnewpwd'></td>
          </tr>
          <tr>
            <td><input type='submit' name='submit' value='Change'></td>
          </tr>
        </table>
	</form>	
		
<?php
}
echo"<a href='logout.php'>Logout</a>";

  
  if(isset($_POST['submit']))
  {
	
	
	$con=mysql_connect("localhost","root","");
    $db=mysql_select_db("loginphp");
	
	$oldpwd=$_POST['oldpwd'];
	//echo"$oldpwd";
	$newpwd=$_POST['newpwd'];
	//echo"$newpwd";
	$rnewpwd=$_POST['rnewpwd'];
	//echo"$rnewpwd";
	
	$con=mysql_connect('localhost','root','');
    $db=mysql_select_db('loginphp');
		   
	
	$sql="SELECT password FROM users WHERE username='$usersss'";
	$res=mysql_query($sql);
	$row=mysql_fetch_assoc($res);
	
	$dbpwd=$row['password'];
	//echo"$dbpwd";
	//$dbusername=$row['username'];
	//echo"$dbusername";
	//echo"$usersss";
	if($dbpwd==$oldpwd)
	{
	   if($newpwd==$rnewpwd)
	   {
		  $sql="UPDATE user SET password='$rnewpwd' WHERE username='$usersss'";
		  if(mysql_query($sql))
		  {
		      echo"Password updated successfully";
		  }
		  else
		  {
			  echo"Unsuccessful3";
		  }
		  
		
	   }
	    else
		  {
			  echo"Unsuccessful2";
		  }
	}
	 else
		  {
			  echo"Unsuccessful1";
		  }
  }

?>
</body>
</html>