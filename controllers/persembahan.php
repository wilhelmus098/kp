<?php
include '../conn.php';
if(isset($_POST['create_persembahan']))
{
    add($_POST["pemimpin_ibadah"],$_POST["tanggal_ibadah"],$_POST["jumlah_hadir"],$_POST["hari_tuhan"],$_POST["sekolah_minggu"],$_POST["doa_tengah_minggu"],$_POST["grand_total"],$_POST["terbilang"],$_POST["bendahara"],$_POST["penghitung"],$_POST["idgereja"]);  
}

if(isset($_POST['create_persembahan_khusus']))
{
    $idnota1 = $_POST["nota_persemabahan_id"];
    $idjemaat1 = $_POST["jemaat_nama_id"];

    // addPK_HariTuhan($idnota1, $idjemaat1, $_POST["persembahan_hari_tuhan"]);
    // addPK_Perpuluhan($idnota1, $idjemaat1, $_POST["perpuluhan"]);
    // addPK_UcapanSyukur($idnota1, $idjemaat1, $_POST["ucapan_syukur"]);
    // addPK_JanjiIman($idnota1, $idjemaat1, $_POST["janji_iman"]);
    // addPK_PembangunanGereja($idnota1, $idjemaat1, $_POST["pembangunan_gereja"]);
    // addPK_Lain($idnota1, $idjemaat1, $_POST["lain_lain"]);

    addPK($idnota1,$idjemaat1,$_POST["persembahan_hari_tuhan"],$_POST["perpuluhan"],$_POST["ucapan_syukur"],$_POST["janji_iman"],$_POST["pembangunan_gereja"],$_POST["lain_lain"]);
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
    //mysqli_close($mysqli);
}

function addPK_HariTuhan($idnota, $idjemaat, $nilaipkhusus)
{
    global $mysqli;
    $sql = "INSERT INTO DetailNotaPersembahan VALUE('". $idnota . "', '1', '" . $idjemaat ."', '" . $nilaipkhusus . "')";
    if (mysqli_query($mysqli, $sql))
    {
        echo "New record created successfully <a href=\"../list_gereja.php\">back to list user</a>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    //mysqli_close($mysqli);
}

function addPK_Perpuluhan($idnota, $idjemaat, $nilaipkhusus)
{
    global $mysqli;
    $sql = "INSERT INTO DetailNotaPersembahan VALUE('". $idnota . "', '2', '" . $idjemaat ."', '" . $nilaipkhusus . "')";
    if (mysqli_query($mysqli, $sql))
    {
        echo "New record created successfully <a href=\"../list_gereja.php\">back to list user</a>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    //mysqli_close($mysqli);
}

function addPK_UcapanSyukur($idnota, $idjemaat, $nilaipkhusus)
{
    global $mysqli;
    $sql = "INSERT INTO DetailNotaPersembahan VALUE('". $idnota . "', '3', '" . $idjemaat ."', '" . $nilaipkhusus . "')";
    if (mysqli_query($mysqli, $sql))
    {
        echo "New record created successfully <a href=\"../list_gereja.php\">back to list user</a>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    //mysqli_close($mysqli);
}

function addPK_JanjiIman($idnota, $idjemaat, $nilaipkhusus)
{
    global $mysqli;
    $sql = "INSERT INTO DetailNotaPersembahan VALUE('". $idnota . "', '4', '" . $idjemaat ."', '" . $nilaipkhusus . "')";
    if (mysqli_query($mysqli, $sql))
    {
        echo "New record created successfully <a href=\"../list_gereja.php\">back to list user</a>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    //mysqli_close($mysqli);
}

function addPK_PembangunanGereja($idnota, $idjemaat, $nilaipkhusus)
{
    global $mysqli;
    $sql = "INSERT INTO DetailNotaPersembahan VALUE('". $idnota . "', '5', '" . $idjemaat ."', '" . $nilaipkhusus . "')";
    if (mysqli_query($mysqli, $sql))
    {
        echo "New record created successfully <a href=\"../list_gereja.php\">back to list user</a>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    //mysqli_close($mysqli);
}

function addPK_Lain($idnota, $idjemaat, $nilaipkhusus)
{
    global $mysqli;
    $sql = "INSERT INTO DetailNotaPersembahan VALUE('". $idnota . "', '6', '" . $idjemaat ."', '" . $nilaipkhusus . "')";
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

function addPK_HariRaya($idnota, $idjemaat, $nilaipkhusus)
{
    global $mysqli;
    $sql = "INSERT INTO DetailNotaPersembahan VALUE('". $idnota . "', '7', '" . $idjemaat ."', '" . $nilaipkhusus . "')";
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

function addPK($idnota, $idjemaat, $hari_tuhan, $perpuluhan_, $ucapan_syukur, $janji_iman, $pembangunan_gereja, $lain_lain)
{
    global $mysqli;
    $sql = "INSERT INTO DetailNotaPersembahan VALUE('". $idnota . "', '1', '" . $idjemaat ."', '" . $hari_tuhan . "')";
    $sql1 = "INSERT INTO DetailNotaPersembahan VALUE('". $idnota . "', '2', '" . $idjemaat ."', '" . $perpuluhan_ . "')";
    $sql2 = "INSERT INTO DetailNotaPersembahan VALUE('". $idnota . "', '3', '" . $idjemaat ."', '" . $ucapan_syukur . "')";
    $sql3 = "INSERT INTO DetailNotaPersembahan VALUE('". $idnota . "', '4', '" . $idjemaat ."', '" . $janji_iman . "')";
    $sql4 = "INSERT INTO DetailNotaPersembahan VALUE('". $idnota . "', '5', '" . $idjemaat ."', '" . $pembangunan_gereja . "')";
    $sql5 = "INSERT INTO DetailNotaPersembahan VALUE('". $idnota . "', '6', '" . $idjemaat ."', '" . $lain_lain . "')";

    if (mysqli_query($mysqli, $sql))
    {
        if (mysqli_query($mysqli, $sql1))
        {
            if (mysqli_query($mysqli, $sql2))
            {
                if (mysqli_query($mysqli, $sql3))
                {
                    if (mysqli_query($mysqli, $sql4))
                    {
                        if (mysqli_query($mysqli, $sql5))
                        {
                            echo "New record created successfully <a href=\"../list_gereja.php\">back to list user</a>";
                        }
                        else
                        {
                            echo "Error: " . $sql5 . "<br>" . mysqli_error($mysqli);
                        }
                    }
                    else
                    {
                        echo "Error: " . $sql4 . "<br>" . mysqli_error($mysqli);
                    }
                }
                else
                {
                    echo "Error: " . $sql3 . "<br>" . mysqli_error($mysqli);
                }
            }
            else
            {
                echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
            }
        }
        else
        {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($mysqli);
        }
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);
}
?>

