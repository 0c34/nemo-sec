<?php
require_once '../../config/config.php';
?>

<?php 
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
           
       </style>
   </head>
   <body>
       <nav class=\"navbar navbar-inverse\" role=\"navigation\">
           <div class=\"navbar-header\">
               <a class=\"navbar-brand\" href=\"../../index.php\">Nemo Security</a>
           </div>
           </nav>";
           
?>
<div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <h2>Two Step Verification</h2>
        <img src="img/SMS-256.png">
        </br>
        </br>
        <form class="form-inline">
            <label for="nama" class="control-label">OTP Verification : </label>
            <div class="form-group">
                    <input type="text" name="otp" class="form-control" style="width: 80px" required="">
            </div>
            <button class="btn btn-primary">Verify</button>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
<?php include_once './include_footer.php'?>