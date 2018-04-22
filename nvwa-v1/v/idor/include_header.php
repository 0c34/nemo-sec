<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<!DOCTYPE html>
     <head>
        <title>IDOR Vulnerability</title>
        <link rel=\"stylesheet\" href=\"../../css/bootstrap.min.css\">
        <script type=\"text/javascript\" src=\"../../js/jquery-1.11.2.min.js\"></script>
        <script type=\"text/javascript\">
            $(document).ready(function (){
                //alert(\"hello\");
            });
        </script>
        <style type=\"text/css\">
            
        </style>
    </head>
    <body>
        <nav class=\"navbar navbar-inverse\" role=\"navigation\">
            <div class=\"navbar-header\">
                <a class=\"navbar-brand\" href=\"../../index.php\">Nemo Security</a>
            </div>
       
            <div>
                <form method=\"post\" action=\"login.php\" class=\"navbar-form navbar-right\" role=\"login\">
                    <div class=\"form-group\">
                        <input type=\"text\" class=\"form-control\" name=\"uname\" placeholder=\"Email\" required=\"\">
                    </div>
                    <div class=\"form-group\">
                        <input type=\"password\" class=\"form-control\" name=\"pass\" placeholder=\"Password\" required=\"\">
                    </div>
                    <button type=\"submit\" name=\"login\" class=\"btn btn-default\">Login</button>
                </form>
            </div>
        </nav>
        <div class=\"row pull-right\">";
