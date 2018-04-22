<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<!DOCTYPE html>
     <head>
        <title>Nemo Security</title>
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
    </head>
    <body>
        <nav class=\"navbar navbar-inverse\" role=\"navigation\">
            <div class=\"navbar-header\">
                <a class=\"navbar-brand\" href=\"index.php\">Nemo Security</a>
            </div>
       
            
        </nav>
        <div class=\"row\">";
?>
<div class="container">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <a class="btn btn-lg btn-primary" href='v/sqli/'>SQL INJECTION</a>
        <a class="btn btn-lg btn-success" href="v/xss/">XSS</a>
        <a class="btn btn-lg btn-danger" href="v/idor/">IDOR</a>
        <a class="btn btn-lg btn-success" href="v/brokenauth/">Broken Auth</a>
        <a class="btn btn-lg btn-primary" href="v/lfi/index.php?page=home.php">LFI</a>
        <a class="btn btn-lg btn-info" href="v/upload_v/">UPLOAD</a>
    </div>
    <div class="col-md-2"></div>
    
</div>
<?php
echo "</div>
    <script type=\"text/javascript\" src=\"../../js/bootstrap.min.js\"></script>
    </body>
</html>";
?>