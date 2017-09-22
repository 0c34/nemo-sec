<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tabel
 *
 * @author root sulhaedir
 */
class TabelGrid {
     //put your code here
    
    /*class field*/
    
    private $ClassCss;
    
    public $html; /*menampung tag-tag html*/
    
    public function __construct($cssParentClass, $cssSubClass = Array()) {
        $this->ClassCss = $cssParentClass;
        $this->html = "<table class=\"$this->ClassCss $cssSubClass[0] $cssSubClass[1]\"> ";
    }
    
    /*blok fungsi untuk tag penutup
    */
    
    public function endTr(){
        return "</tr> ";
    }
    public function endTd(){
        return "</td> ";
    }
    public function endTable(){
        return "</table> ";
    }
    
    /*fungsi untuk membuat header tabel*/
    public function tHead($thead = Array()){
       $this->html .= "<thead><tr class=\"success\"> ";
       foreach ($thead as $th){
           $this->html .= "<td>$th</td> ";
       }
       $this->html .= $this->endTr()."</thead> ";
   }
   
   /*fungsi untuk membuat body tabel dari array
    tbodyFromArray(Array(
                                "1" => Array("No"=>"1", "Nama"=>"Sulhaedir", "alamat"=>"jogja"),
                                "2" => Array("No"=>"1", "Nama"=>"Fitto", "alamat"=>"kota baru ")
                                ));
    * tbodyFromArray($arrayDariTabelDatabase, "id");   
    *  */
   
   public function tbodyFromArray($array = Array(), $action=false, $link,  $fieldAction, $actionName){
       $this->html .= "<tbody> ";
       foreach ($array as $key){
            $this->html .= "<tr class=\"active\"> ";
            foreach ($key as $keys=>$values){
                $this->html .= "<td>".$values."</td>";
            }
            if($action == true){
            $this->html .= "<td><a class=\"btn btn-success\" href=\"$link?$fieldAction=$key[$fieldAction]\">$actionName</a></td>";
            }
            $this->html .= "</tr> ";
        }
        $this->html .= "</tbody> ";
   }
   
   /*fungsi untuk mencetak tabel secara keseluruhan*/
   public function cetakTabel(){
       $this->html .= $this->endTable();
       echo $this->html;
   }
   
   
   public function __destruct() {
       $this->html = "";
   }


   //internal function
}