<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once '../../config/config.php';
require_once lib.'pdo_db_class.php';

if ($vStatus['xss'] == 'false'){
    header("Location:../../linkErrorMessage.php");
    exit();
}

if(!isset($_SESSION['idu'])){
    header("Location:index.php");
    exit();
}

$id_p   = $_POST['id_p'];
$sql    = "DELETE FROM xss_user_inbox WHERE id_pesan = '$id_p'";
$db     = new DB();
$c = $db->delete($sql);
if($c>0){
    header("Location:pesan.php");
}
?>