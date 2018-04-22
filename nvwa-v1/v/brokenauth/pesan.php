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
    $id_f = $_SESSION['idu'];
    $sql1 = "SELECT p.id_pesan, u.email, p.judul_p FROM xss_user_inbox as p, xss_profil_user as u WHERE p.id_profil_user = '$id_f' AND status_baca = 0 AND u.id_profil = p.id_pengirim";
    $sql2 = "SELECT p.id_pesan, u.email, p.judul_p FROM xss_user_inbox as p, xss_profil_user as u WHERE p.id_profil_user = '$id_f' AND status_baca = 1 AND u.id_profil = p.id_pengirim";
    $db = new DB();
    $belumBaca = $db->fetch_All($sql1); 
    $sudahBaca = $db->fetch_All($sql2);
    
?>
<?php include_once './login_include_header.php';?>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row">
            <?php
                if(isset($_GET['e'])){
                    $ercode = $_GET['e'];
                    if($ercode == 1){ 
                        $pesan = "Pesan berhasil dikirim";
                         echo "<div class=\"alert alert-success\">".$pesan."</div>";
                    }
                    else if($ercode == 2){ 
                        $pesan = "Gagal mengirim pesan periksan kembali email tujuan!";
                         echo "<div class=\"alert alert-danger\">".$pesan."</div>";
                    }
                   
                }
            ?>
            <h3>Pesan Yang Belum Dibaca</h3>
            <hr>
        <?php 
            $tabel = new TabelGrid("table", Array("table-bordered",""));
            $tabel->tHead(Array("id pesan","Dari","Judul Pesan","Aksi"));
            $tabel->tbodyFromArray($belumBaca, TRUE, "baca.php", "id_pesan", "Baca");
            $tabel->cetakTabel();
        ?>
            </div>
            <div class="row">
            <h3>Pesan Yang Sudah Dibaca</h3>
            <hr>
        <?php 
            $tabel = new TabelGrid("table", Array("table-bordered",""));
            $tabel->tHead(Array("id pesan","Dari","Judul Pesan","Aksi"));
            $tabel->tbodyFromArray($sudahBaca, TRUE, "baca.php", "id_pesan", "Baca");
            $tabel->cetakTabel();
        ?>
        </div>
    
    <div class="col-md-2"></div>
</div>
<?php include_once './include_footer.php';?>