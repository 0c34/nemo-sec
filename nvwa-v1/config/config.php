<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//db config
 
define("USER", "root");
define("PASS", "");
define("HOST", "localhost");
define("DBN",  "nvwp");


//directory config
define('webroot', $_SERVER['DOCUMENT_ROOT']); // webroot
define('gambar', $_SERVER['DOCUMENT_ROOT'].'/gambar/'); // directory gambar
define('lib', $_SERVER['DOCUMENT_ROOT'].'/lib/'); // directory lib

//link status config
$vStatus = array();
$vStatus['sqli'] = 'true';
$vStatus['xss'] = 'true';
$vStatus['v_upload'] = 'false';
$vStatus['v_download'] = 'false';
$vStatus['lfi'] = 'false';
$vStatus['dirlist'] = 'false';

//array bulan
$bulan = Array("Januari",
              "Februari",
              "Maret",
              "April",
              "Mei",
              "Juni",
              "Juli",
              "Agustus",
              "September",
              "Oktober",
              "November",
              "Desember",);
?>
