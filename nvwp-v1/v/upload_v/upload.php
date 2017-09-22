<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    session_start();

    require_once '../../config/config.php';
    require_once lib.'pdo_db_class.php';
    require_once lib.'FileOperation.php';

?>

<?php
    $pesan = "";
    
    $db = new DB();
    
    if(isset($_POST['simpan'])){
        $judul      = $_POST['judul'];
        $pemateri   = $_POST['pemateri'];
        
        $target_path = '/v/upload_v/file/materi/';
        $milliseconds = round(microtime(true) * 1000);
        
        $fileop         = new FileUpload();
        $filename       = md5($milliseconds).basename( $_FILES[ 'file' ][ 'name' ]);
        $target_path    = webroot . $target_path;
        $target_path    .= $filename;
        
        $res_code = $fileop->upload($target_path);
        
        if($res_code == 1){
            $pesan = "<div class=\"alert alert-danger\">File Gagal Diupload</div>";
        }
        elseif ($res_code == 2) {
            $pesan = "<div class=\"alert alert-success\">Data Berhasil Disimpan $filename</div>";
            $sql = "INSERT INTO materi VALUES('','$judul','$pemateri','$filename')";
            $c = $db->insert($sql);
           header("Refresh:3; url=index.php");
        }
        elseif($res_code == 3){
            $pesan = "<div class=\"alert alert-danger\">Type file harus pdf atau document</div>";
        }
        else{
            
        }
        
    }
  
 else {
     $pesan = "";
    }
?>
<?php include_once './include_header.php';?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h3>Upload File Materi</h3>
        <hr>
    <div class="row">
        <form method="POST" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'];?>" role="form-horizontal">
      <div class="form-group">
        <label class="col-md-4 text-success control-label">Judul :</label>
        <div class="col-md-8 margin-butt">
            <input type="text" class="form-control" name="judul" required="">
         </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 text-success control-label">Pemateri :</label>
        <div class="col-md-8 margin-butt">
                <input type="text" class="form-control" name="pemateri" required="">
            </div>
      </div>
        <div class="form-group">
        <label class="col-md-4 text-success control-label">Pilih File :</label>
        <div class="col-md-8 margin-butt">
                <input name="file" type="file" multiple class="file-loading">
            </div>
      </div>
      <label for="nama" class="col-md-4 text-success control-label"></label>
      <div class="col-md-8">
            <button type="submit" name="simpan" value="g" class="btn btn-success">Simpan</button>
       </div>     
        </form>
    </div>
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