<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

require_once '../../config/config.php';

if ($vStatus['xss'] == 'false'){
    header("Location:../../linkErrorMessage.php");
    exit();
}

if(!isset($_SESSION['idu'])){
    header("Location:index.php");
    exit();
}
?>
<?php include_once './login_include_header.php';?>
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-lg-6">
        <form method="post" action="proses_kirim.php" role="form">
                <label class="col-md-4 text-success control-label">Tujuan :</label> 
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" name="to" class="form-control" required="">
                    </div>
                </div>
                <label class="col-md-4 text-success control-label">Judul :</label> 
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" name="judul" class="form-control" required="">
                    </div>
                </div>
                <label class="col-md-4 text-success control-label">Pesan :</label> 
                <div class="col-md-8">
                    <div class="form-group">
                        <textarea class="form-control" name="pesan" rows="5"></textarea>
                         
                    </div>
                    <button type="submit" class="btn btn-danger">Kirim</button>
                </div>
              
            </form>
    </div>
    <div class="col-md-3"></div>
    
</div>
<?php include_once './include_footer.php';?>