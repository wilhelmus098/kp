<?php
include '../conn.php';
if(isset($_POST['btn_view']))
{
    header('Location:../edit_nota_persembahan.php?idnota='.$_POST['btn_view']);
}

if(isset($_POST['btn_edit']))
{    
    header('Location:../edit_nota_persembahan.php?idnota='.$_POST['btn_edit']);
    //echo 'Location:../edit_nota_persembahan.php?idnota='.$_POST['btn_edit'];
}

if(isset($_POST['btn_edit_nota']))
{
    editNota($_POST["nama_pemimpin"],$_POST["tgl_ibadah"],$_POST["jumlah_hadir"],$_POST["persembahan_tanpa_nama"],$_POST["persembahan_sm"],$_POST["tgl_doa_tengah_minggu"],$_POST["persembahan_tengah_minggu"],'10000',$_POST["bendahara"],$_POST["petugas_penghitung"],$_POST["status_verifikasi"],$_POST["id_gereja"]);
}

if(isset($_POST['btn_insert_nota']))
{
    addNota($_POST["nama_pemimpin"],$_POST["tgl_ibadah"],$_POST["jumlah_hadir"],$_POST["persembahan_tanpa_nama"],$_POST["persembahan_sm"],$_POST["tgl_doa_tengah_minggu"],$_POST["persembahan_tengah_minggu"],'10000',$_POST["bendahara"],$_POST["petugas_penghitung"],$_POST["status_verifikasi"],$_POST["id_gereja"]);
}

if(isset($_POST['btn_delete']))
{
    echo "delete";
}

if(isset($_POST['btn_create_nota']))
{
    header('Location:../create_nota_persembahan.php');
}

if(isset($_POST['btn_pk_jemaat']))
{
    //echo "jssj";
}

function addNota($pemimpin,$date,$hadir,$harituhan,$sekolahminggu,$tgltengahminggu,$tengahminggu,$grandtotal,$bendahara,$penghitung,$verified,$idgereja)
{
    global $mysqli;
    $sql = "INSERT INTO NotaPersembahan VALUE(NULL, '" . $pemimpin . "','" . $date . "','" . $hadir . "','" . $harituhan . "','" . $sekolahminggu . "','" . $tgltengahminggu ."' ,'" . $tengahminggu . "','" . $grandtotal . "','" . $bendahara . "','" . $penghitung . "', '" . $verified . "','" . $idgereja . "')";
    if (mysqli_query($mysqli, $sql))
    {
        // echo "New record created successfully <a href=\"../list_gereja.php\">back to list user</a>";
        header('Location:../list_nota_persembahan.php');
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}

function editNota($pemimpin,$date,$hadir,$harituhan,$sekolahminggu,$tgltengahminggu,$tengahminggu,$grandtotal,$bendahara,$penghitung,$verified,$idgereja)
{
    global $mysqli;
    $sql = "UPDATE NotaPersembahan set PemimpinIbadah ='" . $pemimpin . "', TglIbadah = '" . $date ."', JumlahHadir = '". $hadir ."', HariTuhan = '" . $harituhan . "', SekolahMinggu = '" . $sekolahminggu ."', TglDoaTengahMinggu = '" . $tgltengahminggu ."', DoaTengahMinggu = '" . $tengahminggu ."', GrandTotal = '" . $grandtotal . "', Bendahara = '" . $bendahara ."', Penghitung = '" . $penghitung ."', Verified = '" . $verified . "', idGereja = '" . $idgereja ."' WHERE TglIbadah='" . $date . "'";
    if (mysqli_query($mysqli, $sql)) 
    {

        header('Location:../list_nota_persembahan.php');
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
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

