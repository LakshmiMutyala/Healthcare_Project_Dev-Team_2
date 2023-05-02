
<?php 
session_start();
@$con=mysqli_connect("localhost","id20677486_root","/Hdh\Ui917S~|oF1","id20677486_hospital");
if(!$con)
if(!$con)
die("Database connection failed");
?>
<html>
<div id="caption">HOSPITAL MANAGEMENT SYSTEM<br>Please Login for your Services</div>
    <head>
        <title>Login Admin</title>
        <link href="hospital.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>

     <div id="display" style="text-align: center; margin: 100 120;">
  <div class="win1">
    
  </div>
</div>
</a>
       </div>
      
       <div id="display">
           <div id="errorbox">Invalid gmail or password
               <button onclick="none()">X</button>
           </div>
        <div class="form">
            <div id="caption">Admins Login</div>
          <div class="frmlable">
              Mail ID:
              <span>Password:</span>
          </div>
          <div class="frmfield">
            <form action="adminlogin.php" method="post">
                <input type="gmail" name="gmail" value="" placeholder="Enter your gmail" required><br><br>
                <input type="password" name="pass" value="" placeholder="Enter your password" required>
          </div>
         <div id="btn" style="margin-left: 200px;"> <button type="submit" name="sbtn">Login</button></div>
        </form>
        </div>
       </div> 
        </div>
    </body>
    <script>
        function none(){
            document.getElementById("errorbox").setAttribute("style","display:none;");
        }
    </script>

<?php

if(isset($_POST['sbtn'])){
    $gmail=$_POST['gmail'];
    $pass=$_POST['pass'];
    $sql="select admin_id,first_name,last_name from admins where gmail='$gmail' and password='$pass'";
    $result=mysqli_query($con,$sql);
    if($result){
    $count=mysqli_num_rows($result);
    if($count==1){
        
        $data=mysqli_fetch_array($result);
        $_SESSION['ckadmin']="true";
        $_SESSION['admin_id']=$data['admin_id'];
        $_SESSION['name']=$data['first_name']." ".$data['last_name'];
        header("Location:admindashboard.php");
    }
      
    else
    {?>
<script>
    document.getElementById("errorbox").setAttribute("style","display:block");
    </script>
<?php
}}
else
echo "query result error";

}
?>
<span id="footer">&copy Footer</span>
</html>
