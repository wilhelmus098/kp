<?php
include '../conn.php';
if(isset($_POST['create_persembahan']))
{
    add($_POST["pemimpin_ibadah"],$_POST["tanggal_ibadah"],$_POST["jumlah_hadir"],$_POST["hari_tuhan"],$_POST["sekolah_minggu"],$_POST["doa_tengah_minggu"],$_POST["grand_total"],$_POST["terbilang"],$_POST["bendahara"],$_POST["penghitung"],$_POST["idgereja"]);  
}

function add($pemimpin,$date,$hadir,$harituhan,$sekolahminggu,$tengahminggu,$grandtotal,$terbilang,$bendahara,$penghitung,$idgereja)
{
    global $mysqli;
    $sql = "INSERT INTO notapersembahan VALUE(NULL, '" . $pemimpin . "','" . $date . "','" . $hadir . "','" . $harituhan . "','" . $sekolahminggu . "','" . $tengahminggu . "','" . $grandtotal . "','" . $terbilang . "','" . $bendahara . "','" . $penghitung . "','" . $idgereja . "')";
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