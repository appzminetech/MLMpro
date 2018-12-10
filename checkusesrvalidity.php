<?php
include_once("connect.php");

$rid = $_POST["reffid"];
$getval = $_POST["x"];
$e_pin="";
if(isset($_POST["epinn"])){
    $e_pin = $_POST["epinn"];
}
if($getval==1){
    $getusername = "SELECT CONCAT(f_name, ' ', m_name, ' ', l_name) FROM si_userdetails WHERE user_id = '".$rid."'";
    $resusername = $conn->query($getusername);
    if($resusername->num_rows>0){
        $rowusername = mysqli_fetch_array($resusername);
        echo $rowusername[0];
    }
    else{
        echo "User not found";
    }
}
if($getval==2){
    $sqlrefepin = "SELECT COUNT(*) FROM si_epintable WHERE sponsor_id = '".$rid."' and epin=".$e_pin." and status = 0";
    $resepincheck = $conn->query($sqlrefepin);
    if($resepincheck->num_rows>0){
        $rowepincount = mysqli_fetch_array($resepincheck);
        $count = $rowepincount[0];
        if($count==0){
            echo "0";
        }else if($count==1){
            echo "1";
        }else{
            echo "2";
        }        
    }
}
?>