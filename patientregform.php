<?php
session_start();
@$con=mysqli_connect("localhost","id20677486_root","/Hdh\Ui917S~|oF1","id20677486_hospital");
if(!$con)
die("Database connection failed");
$sql="select pt_count as c from idgenerator";
$result=mysqli_query($con,$sql);
if(!$result)
die("Patient ID generate error");
$data=mysqli_fetch_array($result);
?>
<html>
    <head>
    <div id="caption">HOSPITAL MANAGEMENT SYSTEM<br>Please Register as Patient in below</div>
        <title>New Patient</title>
        <link href="hospital.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>
    </div>
      
    <div id="display" style="text-align: center; margin: 100 120;">
  <div class="win1">
    
  </div>
</div>
      
       <div id="display">
           <div id="errorbox2" >Insertion failed! Try again
               <button onclick="none()">X</button>
           </div>
        <div class="form2">
            <div id="caption">Register New Patient</div>

          <div class="frmlable2">
              <span>Patient ID:</span>
          <span>Patient Name:</span><span>Address:</span><span>Date of Birth:</span>
          <span>Gender:</span><span>Phone:</span><span>Gmail:</span>Password:
          </div>
          <div class="frmfield" >

            <form action="patientregform.php" method="post">
                <input type="text" name="pt_id" value="<?php echo "pt_".$data['c'];?>"  readonly><br><br>
                <input id="fname"type="text" name="f_name" value="" placeholder="First Name" required>
                <input id="fname"type="text" name="l_name" value="" placeholder="Last Name" required><br><br>
                <input type="text" name="addrs" value="" placeholder="Address" required><br><br>
                <input type="date" name="dob" value="" required><br><br>
                <select name="gen">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select><br><br>

                <input type="text" name="phone" value=""  placeholder="Phone" required><br><br>
                <input type="text" name="gmail" value=""  placeholder="Email address" required>
                <br><br>
                <input type="password" name="pass" value=""  placeholder="Password" required>


          </div>
         <div id="btn" style="margin-left: 250px;"> <button type="submit" name="sbtn">Submit</button></div>
        </form>
        </div>
       </div> 
        </div>
        <a href="home.html">
    <div>
     Home
    </div>
</a>
    </body>
    <script>
        function none(){
            document.getElementById("errorbox2").setAttribute("style","display:none;");
        }
    </script>

<?php

if(isset($_POST['sbtn'])){
$ptid=$_POST['pt_id'];
$fname=$_POST['f_name'];
$lname=$_POST['l_name'];
$addrs=$_POST['addrs'];
$dob=$_POST['dob'];
$phone=$_POST['phone'];
$gmail=$_POST['gmail'];
$pass=$_POST['pass'];
$gen=$_POST['gen'];
    $sql="insert into patients values ('$ptid','$fname','$lname','$addrs','$dob','$gen','$phone','$gmail','$pass')";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        mysqli_query($con,"update idgenerator set pt_count=pt_count+1");   
    header("Location:patientregform.php?");
}
    else{?>
<script>
    document.getElementById("errorbox2").setAttribute("style","display:block");
    
    </script>
    <?php
    }
}
?>

        <span id="footer" style="color: aliceblue;">&copy Designed by Team</span>
<span id="footer">&copy Footer</span>
</html>