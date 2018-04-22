<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../config/config.php';

if ($vStatus['lfi'] == 'false'){
    header("Location:../../linkErrorMessage.php");
    exit();
}
echo "<!DOCTYPE html>
     <head>
        <title>LFI Vulnerability</title>
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
                <a class=\"navbar-brand\" href=\"#\">Nemo Security</a>
            </div>
        <div>
            <ul class=\"nav navbar-nav\">
               <li class=\"active\"><a href=\"index.php?page=home.php\">Home</a></li>
                <li><a href=\"index.php?page=profil.php\">Profil</a></li>
                <li><a href=\"index.php?page=kontak.php\">Kontak</a></li>
            </ul>
        </div>
        </nav>
        <div class=\"container\">";
?>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-success">
        <?php 
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                if($page == '')
                        {
                            $page = 'home.php';
                        }

                    include $page;
            }
        ?>
    </div>
    </div>
    <div class="col-md-2"></div>
    
</div>
<?php
echo "</div>
    <script type=\"text/javascript\" src=\"../../js/bootstrap.min.js\"></script>
    </body>
</html>";
?>