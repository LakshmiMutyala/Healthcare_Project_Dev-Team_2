<?php
session_start();
@$con=mysqli_connect("localhost","id20677486_root","/Hdh\Ui917S~|oF1","id20677486_hospital");
if(!$con)
die("Database connection failed");
if($_SESSION['ckadmin']=="true"){
   
?>
<html>
<div id="caption">HOSPITAL MANAGEMENT SYSTEM<br>Room Services</div>
    <head>
        <title>Add rooms</title>
        <link href="hospital.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        <div id="workplace">
       <div id="menu">
       <img src="admin1.png" height="200"width="200">
<b>Welcome to the Hospital</b>
<a href="admindashboard.php">
    <div class="menubtn" >
     Dashboard
    </div>
</a>
<a href="doctorlist.php">
    <div class="menubtn">
     Doctors Info.
    </div>
</a>
<a href="admitted.php">
    <div class="menubtn">
    Admits Info.
    </div>
</a>
<a href="bills.php">
    <div class="menubtn">
    Bills Info.
    </div>
</a>
<a href="visits.php">
    <div class="menubtn">
     Visits Info.
    </div>
</a>
<a href="patientlist.php">
    <div class="menubtn">
     Patient Info.
    </div>
</a>
<a href="rooms.php">
    <div class="menubtn" id="active">
     Rooms Info.
    </div>
</a>
<a href="disease.php">
    <div class="menubtn" >
     Disease Info.
    </div>
</a>
<a href="sessionkill.php">
    <div class="menubtn">
     Logout
    </div>
</a>
       </div>
      
       <div id="display">
           <div id="errorbox2" >Insertion failed! Try again
               <button onclick="none()">X</button>
           </div>
        <div class="form">
            <div id="caption">Add Rooms</div>

          <div class="frmlable2">
              <span>Room No:</span>
          <span>Room Type:</span><span>Cost/day:</span>Capacity:
          </div>
          <div class="frmfield" >

            <form action="addroom.php" method="POST">
                <input type="text" name="roomno" value="R"  required><br><br>
                <input type="text" name="rtype" value="" placeholder="Type of room" required><br><br>

                <input type="number" name="cost" value=""  placeholder="Costs USD" required><br><br>
                <input type="number" name="cap" value=""  placeholder="Number of seat" required>
               
               


          </div>
         <div id="btn" style="margin-left: 200px;"> <button type="submit" name="sbtn"> Add </button></div>
        </form>
        </div>
       </div> 
        </div>
    </body>
    <script>
        function none(){
            document.getElementById("errorbox2").setAttribute("style","display:none;");
        }
    </script>

<?php

if(isset($_POST['sbtn'])){
$room=$_POST['roomno'];
$rtype=$_POST['rtype'];
$cost=$_POST['cost'];
$cap=$_POST['cap'];


    $sql="INSERT into rooms values ('$room','$rtype','$cost','$cap')";
    $result=mysqli_query($con,$sql);
    if($result)
    {
    header("Location:rooms.php?");
}
    else{
        ?>
<script>
    document.getElementById("errorbox2").setAttribute("style","display:block");
    
    </script>
    <?php
    }
}

}
else
header("Location:adminlogin.php");
?>
<span id="footer">&copy Footer</span>
</html>