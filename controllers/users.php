<?php
include '../conn.php';
include '../checksession.php';

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
    //print_r($_POST);
}

if(isset($_POST['btnUpdate']))
{
    $uname = $_SESSION['uname'];
    $oldPass = $_POST['password'];
    $oldCrypt = crypt($oldPass, $uname);

    $newPass1 = $_POST['password1'];
    $newCryptPass1 = crypt($newPass1, $uname);
    
    $newPass2 = $_POST['password2'];
    $newCryptPass2 = crypt($newPass2, $uname);

    $pos = $_SESSION['jabatan'];
    $grjID = $_POST['gereja_jemaat_id'];
        
    if($newCryptPass1 == $newCryptPass2)
    {  
        global $mysqli;
        $sql = "SELECT * FROM User WHERE uname = '" . $uname . "'";
        $result = mysqli_query($mysqli, $sql);
        while($row = $result->fetch_assoc())
        {
            if($oldCrypt != $newCryptPass1)
            {
                if($oldCrypt == $row['pass'])
                {
                    updateUser($uname, $newCryptPass1, $pos, $grjID);
                }
                else
                {
                    echo "PASSWORD LAMA TIDAK SESUAI";
                }
            }
            else
            {
                echo "PASSWORD BARU TIDAK BOLEH SAMA DENGAN PASSWORD LAMA";
            }
        }     
    }
    else
    {
        echo "PASSWORD BARU TIDAK SAMA";
    }
    mysqli_close($mysqli);
}

// if(isset($_POST['btnUpdate']))
// {
//     if ($_POST["password"] == $_POST["password1"] || $_POST["password"] == $_POST["password2"])
//     {
//         echo "password lama sama dengan password baru";
//     }
//     else
//     {
//         if ($_POST["password1"] == $_POST["password2"])
//         {
//             $plainpass = $_POST["password1"];
//             updateUser($_SESSION['uname'],$plainpass,$_SESSION['jabatan'], $_POST["gereja_jemaat_id"]);
//         }
//     }
// }

// ---------------------------------------------------------
// METHOD
// ---------------------------------------------------------
function addUser($uname,$pwd,$pos, $grjid)
{
    global $mysqli;
    $sql = "INSERT INTO User VALUE('" . $uname . "','" . $pwd . "','" . $pos . "','" . $grjid . "')";
    if (mysqli_query($mysqli, $sql)) 
    {
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
        header('Location:../logout.php');
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}

?>