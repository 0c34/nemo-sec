<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once '../../config/config.php';
require_once lib.'pdo_db_class.php';

if(isset($_POST['login'])){
    $uname  = $_POST['uname'];
    $pass   = $_POST['pass'];

    $db = new DB();
    $sql = "SELECT id_profil,email, pass FROM xss_profil_user where email='$uname' AND pass ='$pass'";
    $hasil = $db->fetch_One($sql);
    $unameFdb   = $hasil['email'];
    $passFdb    = $hasil['pass'];
    
    if($uname == $unameFdb && $pass == $passFdb){
        $_SESSION['uname']  = $hasil['email'];
        $_SESSION['idu']     = $hasil['id_profil'];
        header("Location:home.php");
    }
 else {
        header("Location:index.php?e=4");
    }
}