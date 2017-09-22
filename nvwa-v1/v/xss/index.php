<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../config/config.php';

if ($vStatus['xss'] == 'false'){
    header("Location:../../linkErrorMessage.php");
    exit();
}
function getErrorCode($code){
    if($code == 1){
        return "<div class=\"alert alert-danger\">Email sudah terdaftar, silahkan coba yang lain!</div>";
    }
    else if($code == 2){
        return "<div class=\"alert alert-success\">Pendaftaran berhasil, silahkan login</div>";
    }
    else if($code == 3){
        return "<div class=\"alert alert-danger\">Pendaftaran gagal!</div>";
    }
    else if($code == 4){
        return "<div class=\"alert alert-danger\">Username atau Password Salah!</div>";
    }
}
?>
<?php include_once './include_header.php';?>
<div class="container">
    <div class="col-md-2 col-lg-3"></div>
    <div class="col-md-2 col-lg-3"></div>
    <div class="col-md-8 col-lg-6">
        <form class="form-horizontal" method="post" action="proses_daftar.php" role="form">
            <div class="col-md-3 col-lg-3"></div>
            <div class="col-md-9 col-lg-9">
                <h3>Form Pendaftaran</h3>
            </div>
            <div class="form-group"></div>
                <label for="nama" class="col-md-3 col-lg-3 control-label">Nama : </label>
                <div class="col-md-9">
                    <input type="text" name="nama" class="form-control" required="">
                </div>
            <div class="form-group"></div>
                <label for="email" class="col-md-3 col-lg-3 control-label">Email : </label>
                <div class="col-md-9">
                    <input type="email" name="email" class="form-control" required="">
                </div>
            <div class="form-group"></div>
                <label for="pass" class="col-md-3 col-lg-3 control-label">Password : </label>
                <div class="col-md-9">
                    <input type="password" name="pass" class="form-control" required="">
                </div>
            <div class="form-group"></div>
                <label for="nama" class="col-md-3 col-lg-3 control-label">Tanggal Lahir : </label>
                <div class="col-md-9 col-lg-9">
                    <div class="col-md-4">
                        <select class="form-control selectpicker" name="tgl">
                        <?php
                            for($i = 1; $i<=31; $i++){
                                echo "<option value=\"$i\">$i</option>";
                            }
                        ?>
                    </select>
                    </div>
                    <div class="col-md-4">
                    <select class="form-control selectpicker"  name="bln">
                        <?php
                            for($i = 0; $i< count($bulan); $i++){
                                $b = $i + 1;
                                echo "<option value=\"".$b."\">$bulan[$i]</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control selectpicker"  name="thn">
                        <?php
                            for($i = 1990; $i<=2015; $i++){
                                echo "<option value=\"$i\">$i</option>";
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group"></div>
                <div class="col-md-3 col-lg-3"></div>
                <div class="col-md-9 col-lg-9">
                    <button type="submit" name="daftar" class="btn btn-success">Daftar</button>
                </div>
                <div class="form-group"></div>
        </form>
        <?php
            if(isset($_GET['e'])){
                $eCode = $_GET['e'];
                $m = getErrorCode($eCode);
                echo $m;
            }
        ?>
        
    </div>
</div>
<?php include_once './include_footer.php'?>