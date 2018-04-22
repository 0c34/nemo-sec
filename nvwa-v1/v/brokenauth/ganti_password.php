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
?>
<?php
    $pesan = "";
    if(isset($_GET['ganti'])){
    $id = $_SESSION['idu'];
    $pass1 = $_GET['pass1'];
    $pass2 = $_GET['pass2'];
    
    if($pass1 != $pass2){
        $pesan = "<div class=\"alert alert-danger\">password tidak sama mohon ulangi</div>";
    }
 else {
    $db = new DB();
    $sql = "UPDATE xss_profil_user set pass = '$pass2' WHERE id_profil = '$id'";
    $c = $db->update($sql);
    if($c > 0){
        $pesan = "<div class=\"alert alert-success\">Password berhasil diganti</div>";
    }
    }
    }
 else {
     $pesan = "";
}
?>
<?php include_once './login_include_header.php';?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h3>Form Ganti Password</h3>
        <hr>
        <div class="row">
    <form method="get" action="<?php $_SERVER['PHP_SELF'];?>" role="form">
      <label class="col-md-4 text-success control-label">Password Baru :</label>
      <div class="col-md-8">
          <div class="form-group">
              <input type="text" class="form-control" name="pass1" required="">
          </div>
      </div>
      <label class="col-md-4 text-success control-label">Ulangi Password:</label>
      <div class="col-md-8">
          <div class="form-group">
              <input type="text" class="form-control" name="pass2" required="">
          </div>
          <button type="submit" name="ganti" value="g" class="btn btn-success">Ganti</button>
      </div>
    </form></div>
        <div class="row">
        <?php if($pesan != ""){
        echo $pesan;
    }
    ?>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<?php include_once './include_footer.php';?>