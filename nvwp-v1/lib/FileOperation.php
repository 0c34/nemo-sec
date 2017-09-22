<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FileUpload{
        

    public function __construct() {
    }
     
    public function upload($target_path){
        
        $kode = "";
        
        // File information
        $file_name = $_FILES[ 'file' ][ 'name' ];
        $file_type = $_FILES[ 'file' ][ 'type' ];
        $file_size = $_FILES[ 'file' ][ 'size' ];

        if($file_type == "application/pdf"){

            // Can we move the file to the upload folder?
            if( !move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $target_path ) ) {
                // No
                $kode = 1; // 'File Gagal Diupload';
            }
            else {
                // Yes!
                $kode = 2; //"File Berhasil Diupload";
            }
        }
        else {
            // Invalid file
            $kode = 3; //'File Gambar Harus Bertipe Jpeg atau Png';
        } 
        
        return $kode;

       }
    
}