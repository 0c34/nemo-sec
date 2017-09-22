<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

require_once '../../config/config.php';
require_once lib.'pdo_db_class.php';
require_once lib.'tabel.class.php';

if ($vStatus['xss'] == 'false'){
    header("Location:../../linkErrorMessage.php");
    exit();
}

if(!isset($_SESSION['idu'])){
    header("Location:index.php");
    exit();
}

$tujuan = $_POST['to'];
$judul  = $_POST['judul'];
$pesan  = $_POST['pesan'];

$db = new DB();
$cekIdTujuan    = "SELECT id_profil FROM xss_profil_user WHERE email = '$tujuan'";

$id_profil_tujuan   = $db->fetch_One($cekIdTujuan)['id_profil'];
if($id_profil_tujuan <=0){
    header("Location:pesan.php?e=2");
}
 else {
    
    $id_profil_pengirim = $_SESSION['idu'];

    $putMail = "INSERT INTO xss_user_inbox VALUES('','$id_profil_tujuan','$id_profil_pengirim','$judul','$pesan','0')";
    $c = $db->insert($putMail);
    if($c>0){
        header("Location:pesan.php?e=1");
    }
    else {
        header("Location:pesan.php?e=3");
      }
 }
