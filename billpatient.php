<?php
session_start();
@$con=mysqli_connect("localhost","id20677486_root","/Hdh\Ui917S~|oF1","id20677486_hospital");
if(!$con)
die("Database connection failed");
if($_SESSION['ckpt']=="true"){
    $ptid=$_SESSION['pt_id'];

    
    $sql="SELECT * from bills where pt_id='$ptid' order by statuss";

    $result=mysqli_query($con,$sql);
    
    if($result){
       $count=mysqli_num_rows($result);
?>
<html>
<div id="caption">HOSPITAL MANAGEMENT SYSTEM<br>Please Login for your Services</div>
    <head>
        <title>Dashboard bills</title>
        <link href="hospital.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div>
       <div id="menu" style="height: 610px;">
           <img src="patient.png" height="200"width="200">
<b><?php echo $_SESSION['name'];?><br>Welcome to the Hospital</b>
<a href="patientdashboard.php">
    <div class="menubtn" >
     Profile
    </div>
</a>
<a href="appointmentpatient.php">
    <div class="menubtn">
     Appointments
    </div></a>

<a href="visitpatient.php">
    <div class="menubtn" >
         Visits info
    </div></a>
<a href="billpatient.php">
    <div class="menubtn"id="active">
        Bills info
    </div></a>

<a href="sessionkill.php">
    <div class="menubtn">
     Logout
    </div>
</a>
       </div>
      
       <div id="display" style="text-align: left;">
            <div class="win1">
                <div id="caption">Visits History</div>
                <?php
                if($count==0){
                ?>
                <div class="doclist">
                    <b style="font-size: larger;">You have no bill record yet. <a href="appointmentpatient.php">Make Appointments</a></b>
                </div>
                <?php
                }
                else{
                ?>
                <table align="center">
                    <tr>
                        <th>Bill No.</th>
                        <th>Bill Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                        
                    </tr>
                    <?php
                        while($data=mysqli_fetch_array($result)){    
                    ?>
                    <tr>
                        <td><?php echo $data['bill_no']?></td>
                        <td><?php 
                            echo $data['cause'];
                        ?></td>
                        <td><?php echo $data['amount']?></td>
                        <td><?php echo $data['paid_date']?></td>
                        <?php
                            if($data['statuss']=="Paid"){
                        ?>
                        <td style="color:green;font-weight:bold"><?php echo $data['statuss']?></td>
                        <?php
                        }
                        else
                        {
                        ?>
                            <td style="color:red;font-weight:bold"><?php echo $data['statuss']?></td>
                    <?php
                         }
                    ?>
                        
                    </tr>
                    <?php
                        }
                        ?>
                   </table>
                   <div class="doclist" style="margin-top:10px">
                    <b style="font-size: larger;color:red"><?php 
                    $data2=mysqli_fetch_array(mysqli_query($con,"SELECT count('bill_no') as c from bills where pt_id='$ptid' and statuss='Due'"));
                    echo "Number of Due Bills: ".$data2['c'];?></b>
                </div>
                        <?php
                    }
                    ?>
                
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
       </div> 
        </div>
    </body>
    <span id="footer">&copy Footer</span>
</html>
<?php
}
else
echo "Query error";
}
else
header("Location:patientlogin.php");
?>