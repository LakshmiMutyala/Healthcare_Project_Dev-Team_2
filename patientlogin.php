<?php
session_start();
@$con=mysqli_connect("localhost","id20677486_root","/Hdh\Ui917S~|oF1","id20677486_hospital");
if(!$con)
die("Database connection failed");
?>
<html>
<div id="caption">HOSPITAL MANAGEMENT SYSTEM<br>Please Login for your Services</div>
    <head>
        <title>Login Patient</title>
        <link href="hospital.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        <div id="workplace">
       <div id="menu">
           <img src="patient.png" height="200"width="200">
<b>Welcome to the Hospital</b>
<a href="sessionkill.php">
    <div class="menubtn">
     Home
    </div>
</a>
       </div>
      
       <div id="display" style="text-align: left;">
       <div class="win1">
        <div id="errorbox"><center>Invalid gmail or password
            <button onclick="none()">X</button></center>
        </div>
        <div class="form">
            <div id="caption">Patients Login</div>
          <div class="frmlable">
              Gmail:
              <span>Password:</span>
          </div>
          <div class="frmfield">
            <form action="patientlogin.php" method="post">
                <input type="gmail" name="gmail"value="" placeholder="Enter your gmail" required><br><br>
                <input type="password" name="pass" value=""placeholder="Enter your password" required>
          </div>
         <div id="btn"> <button type="submit" name="sbtn">Login</button></div>
         
        </form>
        </div></div>
        <div class="win2">
                <div id="caption">
               News
                
                </div>
                
                <div class="doclist">
                   <marquee direction="up" scrollamount="1"> <b style="font-size: larger;">Wearing a mask has become an essential and effective tool in the fight against COVID-19.
            It is a simple yet powerful measure that can make a significant difference in reducing the transmission of the virus. The mask acts as a physical barrier that blocks the respiratory droplets from the mouth and nose, which are the primary modes of transmission. 

ALl doctors are available today.

you can login to use our services.
            It not only protects the wearer but also those around them, especially vulnerable individuals who are at higher risk of severe illness. In combination with other preventive measures, such as social distancing and regular hand hygiene,
             wearing a mask can help slow down the spread of COVID-19 and keep us all safe.
                </marquee>
                </div>                 
                </div> 
       </div> 
        </div>
        <script>
            function none(){
                document.getElementById("errorbox").setAttribute("style","display:none;");
            }
        </script>
    </body>
    <span id="footer">&copy Footer</span>
</html>
<!--PHP codes-->
<?php
if(isset($_POST['sbtn'])){
    $gmail=$_POST['gmail'];
    $pass=$_POST['pass'];
    $sql="select pt_id as p from patients where gmail='$gmail' and password='$pass'";
    $result=mysqli_query($con,$sql);
    if($result){
    $count=mysqli_num_rows($result);
    if($count==1){
        $data=mysqli_fetch_array($result);
        $_SESSION['ckpt']="true";
        $_SESSION['pt_id']=$data['p'];
        header("Location:patientdashboard.php");
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