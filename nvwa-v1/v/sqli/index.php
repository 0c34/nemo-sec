<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../../config/config.php';
require_once lib.'db.class.php';
require_once lib.'tabelGrid.php';

if ($vStatus['sqli'] == 'false'){
    header("Location:../../linkErrorMessage.php");
    exit();
}
?>
<?php
    $db = new DB();
    $query = "SELECT no_p,nama,alamat,no_hp,tgl_ujian,kode_meja FROM "
            . "peserta_pns";
    $hasil = $db->fetch_All($query);
    //print_r($hasil);
?>
<html>
    <head>
        <title>SQLI Vulnerability</title>
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <script type="text/javascript" src="../../js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function (){
                //alert("hello");
            });
        </script>
        <style type="text/css">
            
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="../../index.php">Nemo Security</a>
            </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="index.php">Peserta</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Link<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="owasp.com">Owasp</a></li>
                <li><a href="exploit-db.com">Exploit-db</a></li>
                <li><a href="portswitger.net">Burpsuite</a></li>
            </ul>
                </li>
            </ul>
        </div>
            <div>
                <form method="post" action="login.php" class="navbar-form navbar-right" role="login">
                    <div class="form-group">
                        <input type="text" class="form-control" name="uname" placeholder="User Name" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pass" placeholder="Password" required="">
                    </div>
                    <button type="submit" name="Login" class="btn btn-success">Login</button>
                </form>
            </div>
        </nav>
        
        <div class="container">
            <div class="row">
                <?php
                if(isset($_GET['error'])){
                    $ercode = $_GET['error'];
                    if($ercode == 1){ 
                        $pesan = "Username atau Password salah!";
                         echo "<div class=\"alert alert-danger\">".$pesan."</div>";
                    }
                    else if($ercode == 2){ 
                        $pesan = "Silahkan Login Untuk Melihat Profil!";
                         echo "<div class=\"alert alert-danger\">".$pesan."</div>";
                    }
               
                }
                        ?>
                <div class="col-md-12 col-sm-12">
                    <h1 style="text-align: center">Daftar Peserta Ujian</h1>
                    <?php 
                        $tabel = new TabelGrid("table", Array("table-bordered", ""));
                        $tabel->tHead(
                                array("No Peserta",
                                    "Nama",
                                    "Alamat",
                                    "No Telpon",
                                    "Tgl Ujian",
                                    "Kode Meja",
                                    "Aksi"
                                    )
                                );
                        $tabel->tbodyFromArray($hasil, true, "detail.php", "no_p", "Lihat");
                        $tabel->cetakTabel();
                    ?>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    </body>
</html>
