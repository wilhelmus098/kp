<?php  
include '../conn.php';
if(isset($_POST['create_jemaat']))
{
	add($_POST["nama_jemaat"],$_POST["tempat_lahir"],$_POST["tgl_lahir"],$_POST["alamat_jemaat"],$_POST["nomor_jemaat"],$_POST["gereja_jemaat_id"]);
}

if(isset($_POST['edit_jemaat']))
{
    header('Location:../edit_jemaat.php?idjemaat='.$_POST['edit_jemaat']);
}

if(isset($_POST['btn_edit_jemaat']))
{
    update($_POST["idjemaat"],$_POST["nama_jemaat"],$_POST["tempat_lahir"],$_POST["tgl_lahir"],$_POST["alamat_jemaat"],$_POST["nomor_jemaat"],$_POST["gereja_jemaat_id"]);
}


//INI TEST GET BUTTON DARI HALAMAN MODAL
if(isset($_POST['create_jemaat_modal']))
{
    add($_POST["nama_jemaat"],$_POST["tempat_lahir"],$_POST["tgl_lahir"],$_POST["alamat_jemaat"],$_POST["nomor_jemaat"],$_POST["gereja_jemaat_id"]);
}
if(isset($_POST['view_jemaat_modal']))
{
    show($_POST["view_jemaat_modal"]);
}

if(isset($_POST["delete_jemaat"]))
{
    delete($_POST["delete_jemaat"]);
}

function add($name, $bornplace, $birthdate, $address, $phonenumber, $churchid)
{
	global $mysqli;
	$sql = "INSERT INTO Jemaat VALUES (NULL, '" . $name . "','" . $bornplace . "', '" . $birthdate . "', '" . $address . "' , '" . $phonenumber ."', '" . $churchid . "')";
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

//INI TEST MODAL DARI BUTTON VIEW
function show($id)
{
    global $mysqli;
    $sql = "SELECT * FROM Jemaat WHERE id = '".$id."'";
    if (mysqli_query($mysqli, $sql)) 
    {
        $output .= '<div class="table-responsive">  
           <table class="table table-bordered">';
        
        while($row = mysqli_fetch_array($result))
        {
            $output .= '
                <tr>  
                    <td width="30%"><label>Name</label></td>  
                    <td width="70%">'.$row["NamaJemaat"].'</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>TempatLahir</label></td>  
                    <td width="70%">'.$row["TempatLahir"].'</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>Tanggal Lahir</label></td>  
                    <td width="70%">'.$row["TglLahir"].'</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>Alamat</label></td>  
                    <td width="70%">'.$row["Alamat"].'</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>Telepon</label></td>  
                    <td width="70%">'.$row["NoTelp"].'</td>  
                </tr>
                <tr>
                    <td width="30%"><label>Telepon</label></td>  
                    <td width="70%">'.$row["idGereja"].'</td> 
                </tr>
            ';
        }
        $output .= '</table></div>';
        echo $output;
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}
?>