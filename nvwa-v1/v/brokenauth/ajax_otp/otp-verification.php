<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

require_once '../../../config/config.php';
require_once lib.'pdo_db_class.php';

if ($vStatus['brokenauth'] == 'false'){
    header("Location:../../../linkErrorMessage.php");
    exit();
}

if(!isset($_SESSION['idu'])){
    header("Location:../index.php");
    exit();
}else{
    $otp = $_POST['otpcode'];
    $res = array();

    if ($otp == null || strlen($otp) > 6){
        $res['success'] = '0';
        $res['message'] = 'Panjang Kode OTP maksimal 6 digit';
    }
    else if(!is_numeric($otp)){
        $res['success'] = '0';
        $res['message'] = 'OTP hanya boleh diisi dengan digit angka';
    }
    elseif($otp == 105511){
        $res['success'] = '1';
        $res['message'] = 'verification success';
    }
    else{
        $res['success'] = '0';
        $res['message'] = 'Verification Failed';
    }
    echo json_encode($res);
}
?>