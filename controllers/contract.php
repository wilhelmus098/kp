<?php
include '../conn.php';

if(isset($_POST['create_contract']))
{
    add($_POST["contract_user_id"],$_POST["contract_start"],$_POST["contract_end"],$_POST["contract_value"]);  
}

if(isset($_POST['edit_contract']))
{
    update($_POST["contract_id"],$_POST["contract_user"],$_POST["contract_start"],$_POST["contract_end"],$_POST["contract_value"]);
}

if(isset($_POST['delete_contract']))
{
    delete($_POST['contract_id']);
}

function add($contractUserId,$contractStart,$contractEnd,$contractValue)
  {
    global $mysqli;
    $sql = "INSERT INTO contracts VALUE(NULL, '" . $contractUserId . "','" . $contractStart . "','" . $contractEnd . "','" . $contractValue . "')";
    if (mysqli_query($mysqli, $sql)) 
    {
        echo "New record created successfully <a href=\"../list_contract.php\">back to list contracts</a>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);
  }

function update($contractId,$contractUserId,$contractStart,$contractEnd,$contractValue)
{
    global $mysqli;
    $sql = "UPDATE contracts SET contract_iduser = '" . $contractUserId . "', contract_start = '" . $contractStart . "', contract_end = '" . $contractEnd . "', contract_value = '" . $contractValue . "' WHERE idcontract = '" . $contractId . "'";
    if (mysqli_query($mysqli, $sql))
    {
        echo "Successfully updated contract on contract id " . $contractId." <a href=\"../list_contract.php\">back to list contracts</a>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}

function delete($contractId)
{
    global $mysqli;
    $sql = "DELETE FROM contracts WHERE idcontract = '" . $contractId . "'";
    if (mysqli_query($mysqli, $sql))
    {
        echo "Successfully deleted contract on contract id " . $contractId." <a href=\"../list_contract.php\">back to list contracts</a>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}
?>