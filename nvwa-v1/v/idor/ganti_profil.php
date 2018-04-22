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
    
    $idu = $_SESSION['idu']; //id pengguna dari sessi yang sedang login
    
    $db = new DB();
    //ambil data berdasarkan id pengguna
    $ambil_data = "SELECT * FROM xss_profil_user where id_profil='$idu'";
    $data_profil = $db->fetch_One($ambil_data);
    
    if(isset($_POST['ganti'])){

    $nama   = htmlspecialchars($_POST['nama']);
    $email  = htmlspecialchars($_POST['email']);
    $tgl    = htmlspecialchars($_POST['tgl']);
    $bln    = htmlspecialchars($_POST['bln']);
    $thn    = htmlspecialchars($_POST['thn']);
    $id_u   = $_POST['idu'];
    
    if($tgl < 10 || $bln < 10){
        $tgl    = "0".$tgl;
        $bln    = "0".$bln;
    }
     else {
         $tgl = $tgl;
         $bln = $bln;
    }
    
    $tglf = $thn."-".$bln."-".$tgl;
   
    $sql = "UPDATE xss_profil_user set nama = '$nama', email='$email', tgl_lahir='$tglf' WHERE id_profil = '$id_u'";
    $c = $db->update($sql);
    
    if($c > 0){
        $pesan = "<div class=\"alert alert-success\">Profil Berhasil Diganti</div>";
        header("Refresh:3");
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
        <h3>Form Ganti Profil</h3>
        <hr>
    <div class="row">
    <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>" role="form-horizontal">
      <div class="form-group">
        <label class="col-md-4 text-success control-label">Nama :</label>
        <div class="col-md-8">
            <input type="text" class="form-control" value="<?php echo $data_profil['nama'] ?>" name="nama" required="">
            <input type="hidden" value="<?php echo $data_profil['id_profil'];?>" name="idu">
         </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 text-success control-label">Email :</label>
        <div class="col-md-8">
                <input type="text" class="form-control" value="<?php echo $data_profil['email'] ?>" name="email" required="">
            </div>
      </div>
      <div class="form-group">
                <label for="nama" class="col-md-4 text-success control-label">Tanggal Lahir : </label>
                <div class="col-md-8">
                    <div class="col-sm-4">
                    <select class="form-control selectpicker" name="tgl">
                        <?php
                            for($i = 1; $i<=31; $i++){
                               echo "<option value=\"$i\">$i</option>";
                            }
                        ?>
                    </select>
                </div>
                    <div class="col-sm-4">
                    <select class="form-control selectpicker" name="bln">
                        <?php
                            for($i = 0; $i< count($bulan); $i++){
                                $b = $i + 1;
                                echo "<option value=\"".$b."\">$bulan[$i]</option>";
                            }
                        ?>
                     </select>
                    </div>
                    <div class="col-sm-4 margin-butt">
                    <select class="form-control selectpicker" name="thn">
                        <?php
                            for($i = 1990; $i<=2015; $i++){
                                echo "<option value=\"$i\">$i</option>";
                            }
                        ?>
                    </select>
                    </div>
                </div>
               </div>
                    <label for="nama" class="col-md-4 text-success control-label"></label>
                    <div class="col-md-8">
                           <button type="submit" name="ganti" value="g" class="btn btn-success">Ganti</button>
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