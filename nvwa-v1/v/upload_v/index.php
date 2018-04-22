<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../config/config.php';

require_once '../../config/config.php';
require_once lib.'db.class.php';
require_once lib.'tabelGrid.php';
require_once lib.'function.php';

if ($vStatus['v_upload'] == 'false'){
    header("Location:../../linkErrorMessage.php");
    exit();
}
?>
<?php
    $db = new DB();
    $query = "SELECT * FROM materi ";
    $hasil_query = $db->fetch_All($query);
?>

<?php include_once './include_header.php';?>
<div class="container">
    <div class="col-md-12 col-lg-12">
        <h1 style="text-align: center">Materi Kelas Online Pemrograman Web</h1>
                    <?php 
                        $tabel = new TabelGrid("table", Array("table-bordered", ""));
                        $tabel->tHead(
                                array("id",
                                    "Judul Materi",
                                    "Pemateri",
                                    "Nama File",
                                    "Aksi"
                                    )
                                );
                            $tabel->html .= "<tbody> ";
                            while($hasil = mysql_fetch_assoc($hasil_query)){
                                //print_r($hasil);
                                foreach ($hasil as $key => $values) {
                                    $tabel->html .= "<td>".$values."</td>";
                                    }
                                    $tabel->html .= "<td class=\"text-center\"><a class=\"btn btn-default btn-sm\" href=\"download.php?file=".$hasil['namafile']."\"><span class=\"glyphicon glyphicon-download-alt\"></span> Download</a> <a class=\"btn btn-default btn-sm\" href=\"delete.php\"><span class=\"glyphicon glyphicon-print\"></span> Cetak</a></td>";
                                    $tabel->html .= "</tr> ";
                             }
                             $tabel->html .= "</tbody> ";
                        $tabel->cetakTabel();
                    ?>
    </div>
    <div class="col-md-3"><a class="btn btn-primary btn-sm" href="upload.php"><span class="glyphicon glyphicon-remove-circle"></span> Tambah</a></div>
    <div class="col-md-8 col-lg-6">
       
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