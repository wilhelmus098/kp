<?php  
include '../conn.php';
if(isset($_POST['create_jemaat']))
{
	add($_POST["nama_jemaat"],$_POST["tempat_lahir"],$_POST["tgl_lahir"],$_POST["alamat_jemaat"],$_POST["nomor_jemaat"],$_POST["gereja_jemaat_id"]);
}

function add($name, $bornplace, $birthdate, $address, $phonenumber, $churchid)
{
	global $mysqli;
	$sql = "INSERT INTO jemaat VALUE(NULL, '" . $name . "','" . $bornplace . "', '" . $birthdate . "', '" . $address . "' , '" . $phonenumber ."', '" . $churchid . "')";
	if (mysqli_query($mysqli, $sql)) 
    {
        echo "New record created successfully <a href=\"../list_jemaat.php\">back to list user</a>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);

}
?>