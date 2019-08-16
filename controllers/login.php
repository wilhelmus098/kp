<?php
include '../conn.php';
// require('../MagicCrypt.php');
// use org\magiclen\magiccrypt\MagicCrypt;

// $username = strtolower($_POST["username"]);
// $plainpass = $_POST["password"];
// $mc = new MagicCrypt('isa', 256);
// $cipherpass = $mc->encrypt($plainpass);
// $password = $cipherpass;

$un = $_POST["username"];
$pwd = $_POST["password"];
$encrypted_pass = crypt($pwd,$un);

global $mysqli;
$sql = "SELECT * FROM User WHERE lower(uname)='$un' AND pass='$encrypted_pass'";
$result = mysqli_query($mysqli, $sql);
$row = $result->num_rows;

if ($row == 1)
{	
	session_start();
	$_SESSION["user_logged_in"] = true;
	$_SESSION["uname"] = $un;

	while($row = $result->fetch_assoc()) 
	{
		$_SESSION['uname'] = $row['uname'];
		$_SESSION["jabatan"] = $row['Jabatan'];
		$_SESSION['idgereja'] = $row['idGereja'];
		// print_r($row);
		// echo "<br><br>";
	}
	//print_r($_SESSION);
	header("Location:../list_nota_persembahan.php");
	
	
}

else if($row['pass'] == null)
{
	session_start();
	$_SESSION["user_logged_in"] = true;
	$_SESSION["uname"] = $un;

	while($row = $result->fetch_assoc()) 
	{
		$_SESSION['uname'] = $row['uname'];
		$_SESSION["jabatan"] = $row['Jabatan'];
		$_SESSION['idgereja'] = $row['idGereja'];
		// print_r($row);
		// echo "<br><br>";
	}
	// print_r($_SESSION);
	if($_SESSION["jabatan"] == "KOOR PUSAT" || $_SESSION["jabatan"] == "KOOR CABANG")
	{
		header("Location:../list_jemaat.php");
		//print_r($_SESSION);		
	}
	else if($_SESSION["jabatan"] == "PENDETA" || $_SESSION["jabatan"] == "BENDAHARA" || $_SESSION["jabatan"] == "PENGINJIL")
	{
		header("Location:../list_nota_persembahan.php");	
	}
	//print_r($_SESSION);
}
else if ($row == 0)
{
	header("Location:../login.php");
}
mysqli_close($mysqli);
?>


