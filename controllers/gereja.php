<?php
include '../conn.php';
if(isset($_POST['create_gereja']))
{
    add($_POST["jenis_gereja"],$_POST["kota_gereja"],$_POST["alamat_gereja"]);  
}

if(isset($_POST['edit_gereja']))
{
    header('Location:../edit_gereja.php?idgrj='.$_POST['edit_gereja']);
}

if(isset($_POST["btn_edit_gereja"]))
{
    update($_POST["idgereja"],$_POST["jenis_gereja"],$_POST["kota_gereja"],$_POST["alamat_gereja"]);  
}

if(isset($_POST['delete_gereja']))
{
    delete($_POST["delete_gereja"]);  
}

function add($type,$city,$address)
{
    global $mysqli;
    $sql = "INSERT INTO Gereja VALUE(NULL, '" . $type . "','" . $city . "', '" . $address ."')";
    if (mysqli_query($mysqli, $sql)) 
    {
        // echo "New record created successfully <a href=\"../list_gereja.php\">back to list user</a>";
        header("Location:../list_gereja.php");
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}

function update($id,$type,$city,$address)
{
    global $mysqli;
    $sql = "UPDATE Gereja set JenisGereja = '" . $type ."', Nama = '" . $city ."', AlamatGereja='" . $address . "' WHERE idGereja='" . $id . "'";
    if (mysqli_query($mysqli, $sql)) 
    {
        header("Location:../list_gereja.php");
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
    $sql = "DELETE FROM Gereja WHERE idGereja='" . $id . "'";
    if (mysqli_query($mysqli, $sql)) 
    {
        // echo "Record deleted successfully <a href=\"../list_gereja.php\">back to list user</a>";
        header("Location:../list_gereja.php");
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}
?>