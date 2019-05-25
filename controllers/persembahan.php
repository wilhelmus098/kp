<?php
include '../conn.php';
include '../checksession.php';

if(isset($_POST['btn_filter']))
{
    header('Location:../list_nota_persembahan.php?awal='.$_POST['awal'].'&akhir='.$_POST['akhir']);
}

if(isset($_POST['btn_view']))
{
    header('Location:../view_nota.php?idnota='.$_POST['btn_view']);
}

if(isset($_POST['btn_edit']))
{    
    header('Location:../edit_nota_persembahan.php?idnota='.$_POST['btn_edit']);
}

if(isset($_POST['btn_create_nota']))
{
    header('Location:../create_nota_persembahan.php');
}

if(isset($_POST['btn_insert_nota']))
{
    if($_POST["nama_pemimpin"] == "" || $_POST['tgl_ibadah'] == "" || $_POST["jumlah_hadir"] == "" || $_POST["persembahan_tanpa_nama"] == "" || $_POST["persembahan_sm"] == "" || $_POST["tgl_doa_tengah_minggu"] == "" || $_POST["persembahan_tengah_minggu"] == "" || $_POST["petugas_penghitung"] == "")
    {
        header('Location:../create_nota_persembahan.php?action=' . $_POST['btn_insert_nota']);
    }
    $lastid = $_POST['btn_insert_nota'];
    $newid = $lastid + 1;
    //print_r($_SESSION);
    //print_r($_POST);
    //echo $newid;
    addNota($newid,$_POST["nama_pemimpin"],$_POST["tgl_ibadah"],$_POST["jumlah_hadir"],$_POST["persembahan_tanpa_nama"],$_POST["persembahan_sm"],$_POST["tgl_doa_tengah_minggu"],$_POST["persembahan_tengah_minggu"],'0',$_SESSION['uname'],$_POST["petugas_penghitung"],'NO',$_SESSION['idgereja'], $newid);
}

if(isset($_POST['btn_edit_nota']))
{
    editNota($_POST["nama_pemimpin"],$_POST["tgl_ibadah"],$_POST["jumlah_hadir"],$_POST["persembahan_tanpa_nama"],$_POST["persembahan_sm"],$_POST["tgl_doa_tengah_minggu"],$_POST["persembahan_tengah_minggu"],'10000',$_POST["bendahara"],$_POST["petugas_penghitung"],'NO',$_SESSION['idgereja']);
}

if(isset($_POST['btn_pk_jemaat']))
{
    header('Location:../create_detail_persembahan.php');
}

if(isset($_POST['btn_detail_persembahan']))
{
    //echo $_POST['id_nota'];
    addDetailNota($_POST["id_nota"], $_POST["nama_jemaat"], $_POST["nilai_hari_tuhan"], $_POST["nilai_perpuluhan"], $_POST["nilai_ucapan_syukur"], $_POST["nilai_janji_iman"], $_POST["nilai_pembangunan_gereja"], $_POST["nilai_lain"], $_POST["metode_persembahan"]);
}

//BUTTON EDIT DARI HALAMAN EDIT_NOTA_PERSEMBAHAN.PHP DI DALAM TABLE UNTUK HEADER KE HALAMAN EDIT DETAIL PERSEMBAHAN KHUSUS
if (isset($_POST['btn_edit_detail_pk']))
{
    $temp = explode(',', $_POST['btn_edit_detail_pk']);
    header('Location:../edit_detail_persembahan_khusus.php?idjemaat='.$temp[1].'&idnota='.$temp[0]);
    //print_r($temp);
}

//BUTTON SAVE DI DALAM HALAMAN EDIT DETAIL PERSEMBAHAN KHUSUS
if(isset($_POST['edit_detail_pk']))
{
    editDetailPK($_POST["id_nota"], $_POST["nama_jemaat"], $_POST["nilai_hari_tuhan"], $_POST["nilai_perpuluhan"], $_POST["nilai_ucapan_syukur"], $_POST["nilai_janji_iman"], $_POST["nilai_pembangunan_gereja"], $_POST["nilai_lain"], $_POST["metode_persembahan"]);
}

if(isset($_POST['btn_delete_detail_pk']))
{
    delete($_POST["btn_delete_detail_pk"]);
}

//METHOD
function addNota($idbaru1,$pemimpin,$date,$hadir,$harituhan,$sekolahminggu,$tgltengahminggu,$tengahminggu,$grandtotal,$bendahara,$penghitung,$verified,$idgereja,$idbaru)
{
    global $mysqli;
    $sql = "INSERT INTO NotaPersembahan VALUE('" . $idbaru1 . "', '" . $pemimpin . "','" . $date . "','" . $hadir . "','" . $harituhan . "','" . $sekolahminggu . "','" . $tgltengahminggu ."' ,'" . $tengahminggu . "','" . $grandtotal . "','" . $bendahara . "','" . $penghitung . "', '" . $verified . "','" . $idgereja . "')";
    if (mysqli_query($mysqli, $sql))
    {
        // echo "New record created successfully <a href=\"../list_gereja.php\">back to list user</a>";
        header('Location:../edit_nota_persembahan.php?idnota=' . $idbaru);
        //echo $sql;
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

function addDetailNota($idnotapersembahan, $idjemaat, $pk1, $pk2, $pk3, $pk4, $pk5, $pk6, $metode)
{
    global $mysqli;
    $sql = "INSERT INTO DetailNotaPersembahan VALUE('" . $idnotapersembahan . "', '" . $idjemaat . "', '" . $pk1 ."', '" . $pk2 ."', '" . $pk3 ."', '" . $pk4 ."', '" . $pk5 ."', '" . $pk6 ."', '" . $metode ."')";
    if (mysqli_query($mysqli, $sql))
    {        
         
        header('Location:../edit_nota_persembahan.php?idnota=' . $idnotapersembahan);
        
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);  
}

function editDetailPK($idNotaPK, $jmtID, $pk1, $pk2, $pk3, $pk4, $pk5, $pk6, $metode)
{
    global $mysqli;
    $sql = "UPDATE DetailNotaPersembahan idJemaat = '" . $jmtID . "', PK_HariTuhan = '" . $pk1 ."', PK_Perpuluhan = '" . $pk2 ."', PK_UcapanSyukur = '" . $pk3 ."', PK_JanjiIman = '" . $pk4 ."', PK_PembangunanGereja = '" . $pk5 ."', PK_LainLain = '" . $pk6 ."', CaraPembayaran = '" . $metode . "' WHERE idNotaPersembahan = '" . $idNotaPK . "' && idJemaat = '" . $jmtID . "'";
    if (mysqli_query($mysqli, $sql))
    {        
         
        header('Location:../edit_nota_persembahan.php?idnota='.$idPK);
        
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli); 
}

function delete($id)
{
    global $mysqli;
    $sql = "DELETE FROM DetailNotaPersembahan WHERE idJemaat='" . $id . "'";
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






















//METHOD FOR DEBUGING
//------------------------------------------------------------------------------------------------
//METHOD FOR DEBUGING
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

