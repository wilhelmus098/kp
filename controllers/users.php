<?php
include '../conn.php';
require('../MagicCrypt.php');
use org\magiclen\magiccrypt\MagicCrypt;
if(isset($_POST['btnRegister']))
{
    if ($_POST["password"] === $_POST["password1"])
    {
        $plainpass = $_POST["password"];
        $mc = new MagicCrypt('isa', 256);
        $cipherpass = $mc->encrypt($plainpass);
        addUser($_POST["username"],$cipherpass,$_POST["position"]);
    }
}
if(isset($_POST['btnUpdate']))
{
    if ($_POST["password"] === $_POST["password1"] || $_POST["password"] === $_POST["password2"])
    {
        echo "password lama sama dengan password baru";
    }
    else
    {
        if ($_POST["password1"] === $_POST["password2"])
        {
            $plainpass = $_POST["password1"];
            $mc = new MagicCrypt('isa', 256);
            $cipherpass = $mc->encrypt($plainpass);
            updateUser($_POST["username"],$cipherpass,$_POST["position"],$_POST["id"]);
        }
    }
}

if(isset($_POST['btnDelete']))
{
    deleteUser($_POST["id"]);
}

function addUser($name,$pwd,$pos)
  {
    global $mysqli;
    $sql = "INSERT INTO users VALUE(NULL, '" . $name . "','" . $pwd . "','" . $pos . "')";
    if (mysqli_query($mysqli, $sql)) 
    {
        echo "New record created successfully <a href=\"../list_user.php\">back to list user</a>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);
  }

function updateUser($name,$pwd,$pos,$id)
{
    global $mysqli;
    $sql = "UPDATE users SET user_name ='" . $name . "', user_password = '" . $pwd . "', user_position = '" . $pos . "' WHERE iduser = '" . $id . "'";
    if (mysqli_query($mysqli, $sql))
    {
        echo "Successfully updated user on user id " . $id." <a href=\"../list_user.php\">back to list user</a>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}

function deleteUser($id)
{
    global $mysqli;
    $sql = "DELETE FROM users WHERE iduser = '" . $id . "'";
    if (mysqli_query($mysqli, $sql))
    {
        echo "Successfully deleted user on user id " . $id." <a href=\"../list_user.php\">back to list user</a>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}
?>