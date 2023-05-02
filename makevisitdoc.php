<?php
session_start();
@$con=mysqli_connect("localhost","id20677486_root","/Hdh\Ui917S~|oF1","id20677486_hospital");
if(!$con)
die("Database connection failed");
if($_SESSION['ckdoc']=="true"){
    $docid=$_SESSION['docid'];
    $ptid="";
if(@$_GET['id']=="vis")
{
    $ptid=$_GET['ptid'];
   $_SESSION['del']="true";
    
}


?>
<html>
    <head>
    <div id="caption">HOSPITAL MANAGEMENT SYSTEM</div>
        <title>Make visit</title>
        <link href="hospital.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="workplace">
       <div id="menu">
           <img src="doctor1.jpeg" height="200"width="200">
<b><?php echo $_SESSION['name'];?><br>Welcome to the Hospital</b>
<a href="doctordashboard.php">
    <div class="menubtn" >
     Profile
    </div>
</a>
<a href="appointmentdoctor.php">
    <div class="menubtn"id="active">
     Appointments
    </div></a>

<a href="doctorserve.php">
    <div class="menubtn" >
         Serve info
    </div></a>
<a href="sessionkill.php">
    <div class="menubtn">
     Logout
    </div>
</a>
       </div>
      
       <div id="display"style="text-align: left;">
           <div class="win1">

           <div id="errorbox" ><center>Insertion failed. Enter valid Patient ID
            <button onclick="none()">X</button></center>
        </div>
        <div class="form">
            <div id="caption">Add to Visit</div>
          <div class="frmlable">
              Patient ID:
              <span>Disease:</span>
              <span>Suggestions:</span>
          </div>
          <div class="frmfield">
              <!--Form here-->
            <form action="makevisitdoc.php" method="post">
                <input type="text" name="ptid"value="<?php echo $ptid;?>" placeholder="Enter valid patient id" required><br><br>
                <select name="diss" required>
                <?php
                $result=mysqli_query($con,"SELECT diss_name from dissexprt where doc_id='$docid'");
                    while($data=mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $data['diss_name'];?>"><?php echo $data['diss_name'];?></option>
                <?php } ?>
                </select><br><br>
                <input type="text" name="sug"value=" " placeholder="Add suggestions" >
               
          </div>
         <div id="btn"> <button type="submit" name="sbtn">Add Visit</button></div>
        </form></div>

            
            </div>
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
    </body>
    <span id="footer">&copy Footer</span>
    <script>
        function none(){
            document.getElementById("errorbox").setAttribute("style","display:none;");
        }</script>
</html>
<?php
    if(isset($_POST['sbtn'])){
        $ptid=$_POST['ptid'];
        $date=date("Y-m-d");
        $diss=$_POST['diss'];
        $sug=$_POST['sug'];
        $sql="INSERT INTO `visits`(`pt_id`, `doc_id`, `visit_date`, `diss_name`, `suggestions`) VALUES ('$ptid','$docid','$date','$diss','$sug')";
        $result=mysqli_query($con,$sql);
        if($result){
            if($_SESSION['del']=="true"){
            $sql="delete from appointments where pt_id='$ptid' and doc_id='$docid'";
             mysqli_query($con,$sql);
             $_SESSION['del']="false";
            }
        header("Location:appointmentdoctor.php");
        }
        else{
            ?>
            <script>
    document.getElementById("errorbox").setAttribute("style","display:block");
    </script>
        <?php
        }
    }
}
else
header("Location:doctorlogin.php");
?>