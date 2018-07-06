<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Member page</title>
</head>

<body>
<?php
session_start();

echo"Welcome"." ".$_SESSION['user']."<br>";

echo"<a href='logout.php'>Logout</a>"."<br>";
echo"<a href='change_password2.php'>change pasword</a>";
?>
</body>
</html>