<?php
include '../conn.php';
include '../checksession.php';
require('../MagicCrypt.php');
use org\magiclen\magiccrypt\MagicCrypt;
// if(isset($_POST['btn_register']))
// {
//     header('Location:../register.php');
//     if ($_POST["password"] === $_POST["password1"])
//     {
//         $plainpass = $_POST["password"];
//         $mc = new MagicCrypt('isa', 256);
//         $cipherpass = $mc->encrypt($plainpass);
//         addUser($_POST["username"],$cipherpass,$_POST["jabatan"],$_POST['gereja_jemaat_id']);
//     }
// }
if(isset($_POST['btnUpdate']))
{
    if ($_POST["password"] == $_POST["password1"] || $_POST["password"] == $_POST["password2"])
    {
        echo "password lama sama dengan password baru";
    }
    else
    {
        if ($_POST["password1"] == $_POST["password2"])
        {
            $plainpass = $_POST["password1"];
            // $mc = new MagicCrypt('isa', 256);
            // $cipherpass = $mc->encrypt($plainpass);
            updateUser($_SESSION['uname'],$plainpass,$_SESSION['jabatan'], $_POST["gereja_jemaat_id"]);
        }
    }
}

// if(isset($_POST['btnDelete']))
// {
//     deleteUser($_POST["id"]);
// }

// function addUser($uname,$pwd,$pos,$idgrjdanjemaat)
//   {
//     global $mysqli;
//     $sql = "INSERT INTO User VALUE('" . $uname . "','" . $pwd . "','" . $pos . "','" . $idgrjdanjemaat . "')";
//     if (mysqli_query($mysqli, $sql)) 
//     {
//         echo "New record created successfully";
//     }
//     else
//     {
//         echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
//     }

//     mysqli_close($mysqli);
//   }

function updateUser($name,$pwd,$pos,$idgrj)
{
    global $mysqli;
    $sql = "UPDATE User SET uname ='" . $name . "', pass = '" . $pwd . "', Jabatan = '" . $pos . "', idGereja = '" . $idgrj ."' WHERE uname = '" . $_SESSION['uname'] . "'";
    if (mysqli_query($mysqli, $sql))
    {
        // echo "Successfully updated user on user id " . $name." <a href=\"../list_user.php\">back to list user</a>";
        header('Location:../logout.php');
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}

// function deleteUser($id)
// {
//     global $mysqli;
//     $sql = "DELETE FROM User WHERE iduser = '" . $id . "'";
//     if (mysqli_query($mysqli, $sql))
//     {
//         echo "Successfully deleted user on user id " . $id." <a href=\"../list_user.php\">back to list user</a>";
//     }
//     else
//     {
//         echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
//     }
//     mysqli_close($mysqli);
// }
?>