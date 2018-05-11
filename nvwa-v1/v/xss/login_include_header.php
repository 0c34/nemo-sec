<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<!DOCTYPE html>
     <head>
        <title>XSS Vulnerability</title>
        <link rel=\"stylesheet\" href=\"../../css/bootstrap.min.css\">
        <script type=\"text/javascript\" src=\"../../js/jquery-1.11.2.min.js\"></script>
        <script type=\"text/javascript\">
            $(document).ready(function (){
                //alert(\"hello\");
            });
        </script>
        <style type=\"text/css\">
            input[type=text], .margin-butt{
            margin-bottom: 10px;

            }
        </style>
        <meta name=\"description\" content=".$_GET['tab'].">
    </head>
    <body>
        <nav class=\"navbar navbar-inverse\" role=\"navigation\">
            <div class=\"navbar-header\">
                <a class=\"navbar-brand\" href=\"#\">Nemo Security</a>
            </div>
        <div>
            <ul class=\"nav navbar-nav\">
                <li class=\"active\"><a href=\"home.php\">Home</a></li>
                
                <li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Pesan<b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                     <li><a href=\"pesan.php\">Pesan masuk</a></li>
                     <li><a href=\"buat_pesan.php\">Buat pesan</a></li>
                     
                    </ul>
                </li>
                <li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Setting<b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                     <li><a href=\"ganti_password.php\">Ganti Password</a></li>
                     <li><a href=\"ganti_profil.php\">Edit Profil</a></li>
                     
                    </ul>
                </li>
            </ul>
        </div>
           <div>
                <form method=\"post\" action=\"logout.php\" class=\"navbar-form navbar-right\" role=\"login\">
                    <label class=\"control-label\" style=\"color:red\">User :".$_SESSION['uname']."</label>                    
                    <button type=\"submit\" name=\"logout\" class=\"btn btn-success\">Logout</button>
                </form>
            </div>
        </nav>
        <div class=\"container\">";
