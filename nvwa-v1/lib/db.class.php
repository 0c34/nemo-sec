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

            $dbh = mysql_connect(HOST, USER, PASS) or die(mysql_error());
            mysql_select_db(DBN) or die(mysql_error());
        }
              
        /*fungsi untuk mengambil semua row pada tabel
            nilai kembali berupa array dari tabel
         *          */
        public function fetch_All($query){
            $q = mysql_query($query) or die(mysql_error());
            return $q;
            //return $hasil;
        }
          
        public function update($query){
            try{
             $q = $this->dbH->exec($query);
             return $q;
            }
            catch (Exception $e){
                echo "<div class=\"alert alert-danger \">".$e->getMessage()."</div>";
            }
        }
        /*fungsi destruktor*/
        public function __destruct() {
            $this->dbH = NULL;
            $this->dbH = "";
        }
}
