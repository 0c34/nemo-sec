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
class DB extends PDO {
    //put your code here
        private $dbH;
        
        public function __construct() {
            try{
            $this->dbH = new PDO('mysql:host='.HOST.';dbname='.DBN, USER, PASS);
            //echo "<div class=\"alert alert-success\"> login success </div>";
            }
            catch (PDOException $e){
                echo "<div class=\"alert alert-danger \">".$e->getMessage()."</div>";
            }
        }
        
        /*fungsi query*/
        public function query($query){
            try {
            return $this->query($query);
            }
             catch (PDOException $e){
                 echo "<div class=\"alert alert-danger \">".$e->getMessage()."</div>";
             }
             $this->dbH = NULL;
             $this->dbH = "";
        }
        
        /*fungsi untuk mengambil semua row pada tabel
            nilai kembali berupa array dari tabel
         *          */
        public function fetch_All($query){
            $q = $this->dbH->query($query);
            $resutl = $q->fetchAll(PDO::FETCH_ASSOC);
            return $resutl;
        }
        
        /*fungsi untuk mengambil 1 row menggunakan clausa WHERE
            nilai kembali berupa array dari tabel
         *          */
        public function fetch_One($query){
            $q = $this->dbH->query($query);
            $resutl = $q->fetch(PDO::FETCH_ASSOC);
            return $resutl;
        }
        /*mengambil data dari tabel dan mengembalikan setiap filed sebagai objek
        contoh $obj->nama
         *          */
        public function fetch_obj($query){
            $q = $this->dbH->query($query);
            $resutl = $q->fetch(PDO::FETCH_OBJ);
            return $resutl;
        }
        public function insert($query){
            try{
             $q = $this->dbH->exec($query);
             return $q;
            }
            catch (Exception $e){
                echo "<div class=\"alert alert-danger \">".$e->getMessage()."</div>";
            }
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
        public function delete($query){
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
