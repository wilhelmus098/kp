<?php  
include '../conn.php';
if(isset($_POST['create_jemaat']))
{
	add($_POST["nama_jemaat"],$_POST["tempat_lahir"],$_POST["tgl_lahir"],$_POST["alamat_jemaat"],$_POST["nomor_jemaat"],$_POST["gereja_jemaat_id"]);
}

if(isset($_POST['edit_jemaat']))
{
    update($_POST["idjemaat"],$_POST["nama_jemaat"],$_POST["tempat_lahir"],$_POST["tgl_lahir"],$_POST["alamat_jemaat"],$_POST["nomor_jemaat"],$_POST["gereja_jemaat_id"]);
    // echo $_POST["idjemaat"];
    // echo "<br>";
    // echo $_POST["nama_jemaat"];
    // echo "<br>";
    // echo $_POST["tempat_lahir"];
    // echo "<br>";
    // echo $_POST["tgl_lahir"];
    // echo "<br>";
    // echo $_POST["alamat_jemaat"];
    // echo "<br>";
    // echo $_POST["nomor_jemaat"];
    // echo "<br>";
    // echo $_POST["gereja_jemaat_id"];
    // echo "<br>";
}

if(isset($_POST["delete_jemaat"]))
{
    delete($_POST["idjemaat"]);
}
function add($name, $bornplace, $birthdate, $address, $phonenumber, $churchid)
{
	global $mysqli;
	$sql = "INSERT INTO Jemaat VALUE(NULL, '" . $name . "','" . $bornplace . "', '" . $birthdate . "', '" . $address . "' , '" . $phonenumber ."', '" . $churchid . "')";
	if (mysqli_query($mysqli, $sql)) 
    { 
        header("Location:../list_jemaat.php");
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);

}

function update($idJemaat,$name, $bornplace, $birthdate, $address, $phonenumber, $churchid)
{
    global $mysqli;
    $sql = "UPDATE Jemaat set NamaJemaat ='" . $name . "', TempatLahir = '" . $bornplace ."', TglLahir = '". $birthdate ."', Alamat = '" . $address . "', NoTelp = '" . $phonenumber ."', idGereja = '" . $churchid ."' WHERE idJemaat='" . $idJemaat . "'";
    if (mysqli_query($mysqli, $sql)) 
    {        
        echo "sukses";
        header("Location:../list_jemaat.php");
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}

function delete($id)
{
    global $mysqli;
    $sql = "DELETE FROM Jemaat WHERE idJemaat='" . $id . "'";
    if (mysqli_query($mysqli, $sql)) 
    {
        // echo "Record deleted successfully <a href=\"../list_gereja.php\">back to list user</a>";
        header("Location:../list_jemaat.php");
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}
?>