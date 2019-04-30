<?php
include '../conn.php';
if(isset($_POST['create_gereja']))
{
    add($_POST["jenis_gereja"],$_POST["alamat_gereja"]);  
}

if(isset($_POST['edit_gereja']))
{
    update($_POST["idgereja"],$_POST["alamat_gereja"]);  
}

if(isset($_POST['delete_gereja']))
{
    delete($_POST["idgereja"]);  
}

function add($type,$address)
{
    global $mysqli;
    $sql = "INSERT INTO gereja VALUE(NULL, '" . $type . "','" . $address . "')";
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

function update($id,$address)
{
    global $mysqli;
    $sql = "UPDATE gereja set AlamatGereja='" . $address . "' WHERE idGereja='" . $id . "'";
    if (mysqli_query($mysqli, $sql)) 
    {
        // echo "Record updated successfully <a href=\"../list_gereja.php\">back to list user</a>";
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
    $sql = "DELETE FROM gereja WHERE idGereja='" . $id . "'";
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