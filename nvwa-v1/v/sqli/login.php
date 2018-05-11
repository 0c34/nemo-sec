<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once '../../config/config.php';
require_once lib.'db.class.php';
//require_once lib.'tabelGrid.php';

if ($vStatus['sqli'] == 'false'){
    header("Location:../../linkErrorMessage.php");
    exit();
}
$uname = $_POST['uname'];
$pass  = $_POST['pass'];

$db = new DB();
$query = "SELECT * FROM login_user WHERE uname = '$uname' AND pass = '$pass'";
$query = $db->fetch_All($query);
$hasil = mysqli_fetch_row($query);
//print_r($hasil);
if($hasil > 0) {
    $_SESSION['id'] = $hasil[0];
    $_SESSION['uname'] = $hasil[2];
    header("Location:profil.php");
}
else {
    header("Location:index.php?error=1");
}