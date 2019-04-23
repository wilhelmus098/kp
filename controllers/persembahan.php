<?php
include '../conn.php';
if(isset($_POST['create_persembahan']))
{
    add($_POST["jenis_gereja"],$_POST["alamat_gereja"]);  
}

function add($type,$address)
{
    global $mysqli;
    $sql = "INSERT INTO gereja VALUE(NULL, '" . $type . "','" . $address . "')";
    if (mysqli_query($mysqli, $sql)) 
    {
        echo "New record created successfully <a href=\"../list_gereja.php\">back to list user</a>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}
?>