<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author root
 */
//require_once '../config/config.php';
class DB {
    //put your code here
        private $dbH;
        
        public function __construct() {

            $this->dbH = mysqli_connect(HOST, USER, PASS,'nemosec');
            }
              
        /*fungsi untuk mengambil semua row pada tabel
            nilai kembali berupa array dari tabel
         *          */
        public function fetch_All($query){
            $q = mysqli_query($this->dbH, $query) or die(mysqli_error($this->dbH));
            return $q;
            //return $hasil;
        }
          
        /* public function update($query){
            try{
             $q = $this->dbH->exec($query);
             return $q;
            }
            catch (Exception $e){
                echo "<div class=\"alert alert-danger \">".$e->getMessage()."</div>";
            }
        } */
        /*fungsi destruktor*/
        public function __destruct() {
            $this->dbH = NULL;
            $this->dbH = "";
        }
}
