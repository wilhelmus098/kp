<?php
include '../conn.php';
require('../MagicCrypt.php');
use org\magiclen\magiccrypt\MagicCrypt;

if(isset($_POST['create_schedule']))
{
    $plainloc = $_POST["schedule_location"];
    $mc = new MagicCrypt('isa', 256);
    $cipherloc = $mc->encrypt($plainloc);
    add($_POST["schedule_user_id"],$_POST["schedule_start"],$_POST["schedule_end"],$cipherloc,$_POST["schedule_desc"]);

}

if(isset($_POST['edit_schedule']))
{
    $plainloc = $_POST["schedule_location"];
    $mc = new MagicCrypt('isa', 256);
    $cipherloc = $mc->encrypt($plainloc);
    update($_POST["schedule_id"],$_POST["schedule_start"],$_POST["schedule_end"],$cipherloc,$_POST["schedule_desc"],$_POST["schedule_user"]);
}

if(isset($_POST['delete_schedule']))
{
    delete($_POST["schedule_id"]);
}

function add($scheduleUserId,$scheduleStart,$scheduleEnd,$scheduleLocation,$scheduleDesc)
{
	global $mysqli;
	$sql = "INSERT INTO schedules VALUE(NULL, '" . $scheduleStart . "','" . $scheduleEnd . "','" . $scheduleLocation . "','" . $scheduleDesc . "','" . $scheduleUserId . "')";
	if (mysqli_query($mysqli, $sql)) 
	{
		echo "New record created successfully <a href=\"../list_schedule.php\">back to list schedule</a>";
	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
	}

	mysqli_close($mysqli);
}

function update($scheduleId,$scheduleStart,$scheduleEnd,$scheduleLoc,$scheduleDesc,$scheduleUser)
{
    global $mysqli;
    $sql = "UPDATE schedules SET schedule_start = '" . $scheduleStart . "', schedule_end = '" . $scheduleEnd . "', schedule_location = '" . $scheduleLoc . "', schedule_desc = '" . $scheduleDesc . "', schedule_iduser = '" . $scheduleUser . "' WHERE idschedule = '" . $scheduleId . "'";
    if (mysqli_query($mysqli, $sql))
    {
        echo "Successfully updated schedule on schedule id " . $scheduleId." <a href=\"../list_schedule.php\">back to list schedule</a>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}

function delete($scheduleId)
{
    global $mysqli;
    $sql = "DELETE FROM schedules WHERE idschedule = '" . $scheduleId . "'";
    if (mysqli_query($mysqli, $sql))
    {
        echo "Successfully deleted schedule on schedule id " . $scheduleId." <a href=\"../list_schedule.php\">back to list schedule</a>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}
?>