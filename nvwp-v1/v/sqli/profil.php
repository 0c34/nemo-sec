<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if(!isset($_SESSION['id'])){
    header("Location:index.php?error=2");
}
require_once '../../config/config.php';
require_once lib.'db.class.php';
require_once lib.'tabelGrid.php';

if ($vStatus['sqli'] == 'false'){
    header("Location:../../linkErrorMessage.php");
    exit();
}
?>
<?php
    $id = $_SESSION['id'];
    $dbh = new DB();
    $query = "SELECT * FROM peserta_pns WHERE id = $id";
    $query = $dbh->fetch_All($query);
    $q = mysql_fetch_assoc($query);
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
                <a class="navbar-brand" href="#">Hillo WebSec</a>
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
                <form method="post" action="logout.php" class="navbar-form navbar-right" role="login">
                    <label class="control-label">User : <?php echo $_SESSION['uname']; ?></label>                    
                    <button type="submit" name="logout" class="btn btn-success">Logout</button>
                </form>
            </div>
        </nav>
        <div class="container">
            <div class="row">
               
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3 >Peserta : <?php echo $q['nama']?> </h3>
                <form class="form-horizontal" role="form">
                <div class="form-group has-success">
                    <label class="col-sm-3 control-label">No Peserta :</label>
                    <div class="col-md-9">
                        <input class="form-control" value="<?php echo $q['no_p']?>" type="text" >
                    </div>
                </div>
                <div class="form-group has-success">
                    <label class="col-sm-3 control-label">Nama :</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" value="<?php echo $q['nama']?>" >
                    </div>
                </div>
                <div class="form-group has-success">
                    <label class="col-sm-3 control-label">Alamat :</label>
                    <div class="col-md-9">
                    <input class="form-control"  type="text" value="<?php echo $q['alamat']?>" >
                    </div>
                </div>
                <div class="form-group has-success">
                    <label class="col-sm-3 control-label">No HP :</label>
                    <div class="col-md-9">
                    <input class="form-control" type="text" value="<?php echo $q['no_hp']?>" >
                    </div>
                </div>
                <div class="form-group has-success">
                    <label class="col-sm-3 control-label">Tanggal Ujian :</label>
                    <div class="col-md-9">
                    <input class="form-control" type="text" value="<?php echo $q['tgl_ujian']?>" >
                    </div>
                </div>
                <div class="form-group has-success">
                    <label class="col-sm-3 control-label">Kode Meja :</label>
                    <div class="col-md-9">
                    <input class="form-control" type="text" value="<?php echo $q['kode_meja']?>" >
                    </div>
                </div>
                    <div class="form-group has-success">
                    <label class="col-sm-3 control-label">Kode Soal :</label>
                    <div class="col-md-9">
                    <input class="form-control" type="text" value="<?php echo $q['kode_soal']?>" >
                    </div>
                </div>
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-md-9">
                    <button type="button" class="btn btn-success">Cetak Kartu Peserta</button>
                    </div>
            </form>
            </div>
            <div class="col-md-2"></div>
            </div>
            </div>
        </div>
        <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    </body>
</html>