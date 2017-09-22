<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

    require_once '../../config/config.php';
    require_once lib.'function.php';
  
    function Read($file, $mimeType='application/octet-stream')
   {

      if (!is_file($file))
      {
         header('HTTP/1.0 404 Not Found');
         exit;
      }

      if (!is_readable($file))
      {
         header('HTTP/1.0 403 Forbidden');
         exit;
      }

      if (file_exists($file))
      {
         header('Content-Description: File Transfer');
         header('Content-Type: '.$mimeType);
         header('Content-Disposition: attachment; filename=' . basename($file));
         header('Content-Transfer-Encoding: binary');
         header('Expires: 0');
         header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
         header('Pragma: public');
         header('Content-Length: ' . filesize($file));
         ob_clean();
         flush();
         readfile($file);
      }
   }
   
    if(isset($_GET['file'])){
        $file = $_GET['file'];
        $filename = webroot.'/v/upload_v/file/materi/'.$file;
        Read($filename);
    }
    
    else{
        header('Location:index.php');
    }
?>