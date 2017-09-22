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
?>
<?php 
    $id_f = $_SESSION['idu'];
    $db = new DB();
    $sql = "SELECT * FROM xss_profil_user WHERE id_profil = '$id_f'";
    $hasil = $db->fetch_One($sql);  
?>

<?php include_once './login_include_header.php'; ?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-7">
        <div class="col-md-3">
            
            <img src="img/panda.png" class="img-rounded" width="150" height="100">
        </div>
        <div class="col-md-8">
            <h3 class="text-success">Profil</h3>
            <hr>
            <form method="post" role="form">
                <label class="col-md-4 text-success control-label">Nama :</label> 
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $hasil['nama'];?>">
                    </div>
                </div>
                <label class="col-md-4 text-success control-label">Email :</label> 
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $hasil['email'];?>" disabled="">
                    </div>
                </div>
                <label class="col-md-4 text-success control-label">Tanggal Lahir :</label> 
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $hasil['tgl_lahir'];?>" disabled="">
                    </div>
                </div>
              
            </form>
        </div>
    </div>
    <div class="col-md-3">
        <form method="post" role="search">
            <div class="row">
                <div class="col-md-12">
            <div class="input-group">
                <input type="text" name="cari" class="form-control" placeholder="masukan email teman" required="">
                <span class="input-group-btn">
                <button type="submit" class="btn btn-default">Cari</button>
                </span>
            </div>
            </div>
           </div>
        </form>
    </div>
</div>
    
<?php include_once './include_footer.php'?>
