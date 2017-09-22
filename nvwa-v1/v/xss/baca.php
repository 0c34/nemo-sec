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
    $id_p   = $_GET['id_pesan'];
    $db     = new DB();
    $sql1   = "SELECT u.email, p.judul_p, p.pesan FROM xss_user_inbox as p, xss_profil_user as u WHERE p.id_pesan = '$id_p' AND u.id_profil = p.id_pengirim";
    $hasil  = $db->fetch_One($sql1);
    $statusBacaSql  = "SELECT status_baca FROM xss_user_inbox WHERE id_pesan = $id_p";
    $statusCode     = $db->fetch_One($statusBacaSql)['status_baca'];
    if($statusCode == 0){
        $sqlUpdate = "UPDATE xss_user_inbox SET status_baca = 1 WHERE id_pesan = $id_p";
        $execute = $db->update($sqlUpdate);
    }
    
?>
<?php include_once './login_include_header.php';?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-lg-6">
        <form method="post" action="hapus_pesan.php" role="form">
                <label class="col-md-4 text-success control-label">Pengirim :</label> 
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $hasil['email'];?>">
                         <input type="hidden" name="id_p" value="<?php echo $id_p; ?>">
                    </div>
                </div>
                <label class="col-md-4 text-success control-label">Judul :</label> 
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $hasil['judul_p'];?>" disabled="">
                    </div>
                </div>
                <label class="col-md-4 text-success control-label">Pesan :</label> 
                <div class="col-md-8">
                    <div class="form-group">
                        <div class="panel panel-success">
                        <div class="panel-heading">Pesan Masuk</div>
                            <div class="panel-body">
                                <p>
                                        <?php echo $hasil['pesan'];?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Hapus Pesann</button>
                </div>
              
            </form>
    </div>
    <div class="col-md-3"></div>
    
</div>
<?php include_once './include_footer.php';?>