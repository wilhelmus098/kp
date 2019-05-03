<?php
include '../conn.php';
require('../MagicCrypt.php');
use org\magiclen\magiccrypt\MagicCrypt;

// $username = strtolower($_POST["username"]);
// $plainpass = $_POST["password"];
// $mc = new MagicCrypt('isa', 256);
// $cipherpass = $mc->encrypt($plainpass);
// $password = $cipherpass;

$username = $_POST["username"];
$password = $_POST["password"];

global $mysqli;
$sql = "SELECT * FROM User WHERE lower(uname)='$username' AND pass='$password'";
$result = mysqli_query($mysqli, $sql);
$row = $result->num_rows;
if ($row==1){
	echo "1";
	session_start();
	$_SESSION["user_logged_in"] = true;
	$_SESSION["uname"] = $username;
	while($row = $result->fetch_assoc()) {
		  $_SESSION["jabatan"] = $row['Jabatan'];
		  $_SESSION['idgereja'] = $row['idGereja'];
		   // print_r($row);
		   // echo "<br><br>";
	}
	// print_r($_SESSION);
	header("Location:../create_nota_persembahan.php");
	
	
}else if ($row==0)
{
	// echo "0";
}
mysqli_close($mysqli);
?>


