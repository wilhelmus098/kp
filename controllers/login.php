<?php
include '../conn.php';
require('../MagicCrypt.php');
use org\magiclen\magiccrypt\MagicCrypt;

$username = strtolower($_POST["username"]);
$plainpass = $_POST["password"];
$mc = new MagicCrypt('isa', 256);
$cipherpass = $mc->encrypt($plainpass);
$password = $cipherpass;

global $mysqli;
$sql = "select * from users where lower(user_name)='$username' and user_password='$password'";
$result = mysqli_query($mysqli, $sql);
$row = $result->num_rows;
if ($row==1){
	echo "1";
	session_start();
	$_SESSION["user_logged_in"] = true;
	$_SESSION["user_name"] = $username;
	while($row = $result->fetch_assoc()) {
      	$_SESSION["user_position"] = $row['user_position'];
	}
}else if ($row==0)
{
	echo "0";
}
mysqli_close($mysqli);
?>


