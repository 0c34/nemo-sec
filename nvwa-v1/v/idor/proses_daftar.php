<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../../config/config.php';
require_once lib.'pdo_db_class.php';

if ($vStatus['xss'] == 'false'){
    header("Location:../../linkErrorMessage.php");
    exit();
}
?>
<?php 
    if(!isset($_POST['daftar'])){
        header("Location:index.php");
        exit();
    }
    $nama   = htmlspecialchars($_POST['nama']);
    $email  = htmlspecialchars($_POST['email']);
    $pass   = htmlspecialchars($_POST['pass']);
    $tgl    = htmlspecialchars($_POST['tgl']);
    $bln    = htmlspecialchars($_POST['bln']);
    $thn    = htmlspecialchars($_POST['thn']);
    if($tgl < 10 || $bln < 10){
        $tgl    = "0".$tgl;
        $bln    = "0".$bln;
    }
     else {
         $tgl = $tgl;
         $bln = $bln;
    }
    $tglf = $thn."-".$bln."-".$tgl;
    $db = new DB();
    $sql1 = "SELECT email FROM  xss_profil_user where email = '$email'";
    $hasilq = $db->fetch_One($sql1);
    if( $email == $hasilq['email']){
        header("Location:index.php?e=1");
    }
    else {
        
    $sql = "INSERT INTO xss_profil_user VALUES('','$nama','$email','$pass','$tglf')";
    $c = $db->insert($sql);
    if($c > 0 ){
        header("Location:index.php?e=2");
    }
     else {
        header("Location:index.php?e=3");
    }
 }   
?>