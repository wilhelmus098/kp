<?php
include '../conn.php';


if(isset($_POST['btn_register']))
{
    //GET VALUE
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $pos = $_POST['jabatan'];
    $idgrj = $_POST['gereja_id'];

    //ENCRYPT
    // $cipherpass = md5($pass);
    // $salt = strlen($pass);
    // $ecnPass = $cipherpass .$salt;
    // $encFinal = md5($ecnPass);
    $encrypted_pass = crypt($pass, $uname);

    addUser($uname, $encrypted_pass, $pos, $idgrj);
}

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
            updateUser($_SESSION['uname'],$plainpass,$_SESSION['jabatan'], $_POST["gereja_jemaat_id"]);
        }
    }
}

// ---------------------------------------------------------
// METHOD
// ---------------------------------------------------------
function addUser($uname,$pwd,$pos, $grjid)
{
    global $mysqli;
    $sql = "INSERT INTO User VALUE('" . $uname . "','" . $pwd . "','" . $pos . "','" . $grjid . "')";
    if (mysqli_query($mysqli, $sql)) 
    {
       //echo "New record created successfully";
       header('Location:../register.php');
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);
}

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