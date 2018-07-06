<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Connection with database</title>
</head>

<body>
<?php
$con=mysql_connect('localhost','root','');
$db=mysql_select_db('users');
?>
</body>
</html>