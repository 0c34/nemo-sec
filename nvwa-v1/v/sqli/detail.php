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

    $nop = $_GET['no_p']; //12341
    $dbh = new DB();
    $query = "SELECT * FROM peserta_pns WHERE no_p = $nop";
    
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
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3 style="text-align: center">Detail Peserta</h3>
                <form class="form-horizontal" role="form">
                <div class="form-group has-success">
                    <label class="col-sm-2 control-label">No Peserta :</label>
                    <div class="col-md-10">
                        <input class="form-control" value="<?php echo $q['no_p']?>" type="text" disabled>
                    </div>
                </div>
                <div class="form-group has-success">
                    <label class="col-sm-2 control-label">Nama :</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" value="<?php echo $q['nama']?>" disabled>
                    </div>
                </div>
                <div class="form-group has-success">
                    <label class="col-sm-2 control-label">Alamat :</label>
                    <div class="col-md-10">
                    <input class="form-control"  type="text" value="<?php echo $q['alamat']?>" disabled>
                    </div>
                </div>
                <div class="form-group has-success">
                    <label class="col-sm-2 control-label">No HP :</label>
                    <div class="col-md-10">
                    <input class="form-control" type="text" value="<?php echo $q['no_hp']?>" disabled>
                    </div>
                </div>
                <div class="form-group has-success">
                    <label class="col-sm-2 control-label">Tanggal Ujian :</label>
                    <div class="col-md-10">
                    <input class="form-control" type="text" value="<?php echo $q['tgl_ujian']?>" disabled>
                    </div>
                </div>
                <div class="form-group has-success">
                    <label class="col-sm-2 control-label">Kode Meja :</label>
                    <div class="col-md-10">
                    <input class="form-control" type="text" value="<?php echo $q['kode_meja']?>" disabled>
                    </div>
                </div>
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-md-10">
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


