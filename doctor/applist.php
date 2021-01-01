<?php
session_start();
include_once '../assets/conn/dbconnect.php';
if(!isset($_SESSION['doctorSession']))
{
header("Location: ../index.php");
}
$usersession = $_SESSION['doctorSession'];
$res=mysqli_query($con,"SELECT * FROM doctor WHERE doctorId=".$usersession);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Welcome Dr <?php echo $userRow['doctorFirstName'];?> <?php echo $userRow['doctorLastName'];?></title>
        <!-- Bootstrap Core CSS -->
        <!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
        <link href="assets/css/material.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="assets/css/sb-admin.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <!-- Custom Fonts -->
        
    </head>
    <body>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="doctordashboard.php">Welcome Dr <?php echo $userRow['doctorFirstName'];?> <?php echo $userRow['doctorLastName'];?></a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userRow['doctorFirstName']; ?> <?php echo $userRow['doctorLastName']; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           
                            <li class="divider"></li>
                            <li>
                                <a href="logout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="doctordashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="addschedule.php"><i class="fa fa-fw fa-clock-o"></i> Doctor Schedule</a>
                        </li>
                        <li>
                            <a href="patientlist.php"><i class="fa fa-fw fa-edit"></i> Patient List</a>
                        </li>
                        <li class="active">
                            <a href="applist.php"><i class="fa fa-fw fa-table"></i> Appoinment List</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <!-- navigation end -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header">
                            Appointment List
                            </h2>
                        </div>
                            <?php 
                                if ($userRow['degrees']=="" || $userRow['speciality']=="" || $userRow['doctorAddress']==""){
                                    // <!-- / notification start -->
                                    echo "<div class='row'>";
                                        echo "<div class='col-lg-12'>";
                                            echo "<div class='alert alert-danger alert-dismissable'>";
                                                echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                                                echo " <i class='fa fa-info-circle'></i>  <strong>Please complete your profile.</strong>" ;
                                            echo "  </div>";
                                        echo "</div>";
                                    // <!-- notification end --> 
                                }
                            ?>
                        
                    </div>
                    <!-- Page Heading end-->

                    <!-- panel start -->
                    <div class="panel panel-primary filterable">
                        <!-- Default panel contents -->
                       <div class="panel-heading">
                        <h3 class="panel-title">Appointment List of <?php echo "Dr. ".$userRow['doctorFirstName']." ".$userRow['doctorLastName']?> </h3>
                        </div>
                        <div class="panel-body">
                        <!-- Table -->
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="filters">
                                    <th><input type="text" class="form-control" placeholder="Patient ID" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Contact No." disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Day" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Date" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Start" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="End" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Status" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Complete" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Delete" disabled></th>
                                </tr>
                            </thead>
                            
                            <?php 
                            $doctorId=$_SESSION['doctorSession'];
                            $res=mysqli_query($con,"SELECT a.*, b.*,c.*
                                                    FROM patient a
                                                    JOIN appointment b
                                                    On a.icPatient = b.patientIc
                                                    JOIN doctorschedule c
                                                    On b.scheduleId=c.scheduleId
                                                    WHERE b.doctorId= '$doctorId'
                                                    Order By appId desc");
                                  if (!$res) {
                                    printf("Error: %s\n", mysqli_error($con));
                                    exit();
                                }
                            
                            while ($appointment=mysqli_fetch_array($res)) {
                                
                                if ($appointment['status']=='process') {
                                    $status="danger";
                                    $icon='remove';
                                    $checked='';

                                } else {
                                    $status="success";
                                    $icon='ok';
                                    $checked = 'disabled';
                                }
                                echo "<tbody>";
                                echo "<tr class='$status'>";
                                    echo "<td>" . $appointment['patientIc'] . "</td>";
                                    echo "<td>" . $appointment['patientFirstName'] . " ".$appointment['patientLastName'] . "</td>";
                                    echo "<td>" . $appointment['patientPhone'] . "</td>";
                                    echo "<td>" . $appointment['patientEmail'] . "</td>";
                                    echo "<td>" . $appointment['scheduleDay'] . "</td>";
                                    echo "<td>" . $appointment['scheduleDate'] . "</td>";
                                    echo "<td>" . $appointment['startTime'] . "</td>";
                                    echo "<td>" . $appointment['endTime'] . "</td>";
                                    echo "<td><span class='glyphicon glyphicon-".$icon."' aria-hidden='true'></span>".' '."". $appointment['status'] . "</td>";
                                    echo "<form method='POST'>";
                                    echo "<td class='text-center'><input type='checkbox' name='enable' id='enable' value='".$appointment['appId']."' onclick='chkit(".$appointment['appId'].",this.checked);' ".$checked."></td>";
                                    echo "<td class='text-center'><a href='#' id='".$appointment['appId']."' class='delete'><span class='fa fa-trash' aria-hidden='true'></span></a>
                            </td>";
                               
                            } 
                                echo "</tr>";
                           echo "</tbody>";
                       echo "</table>";
                       echo "<div class='panel panel-default'>";
                       echo "<div class='col-md-offset-3 pull-right'>";
                       echo "<button class='btn btn-primary' type='submit' value='Submit' name='submit'>Update</button>";
                        echo "</div>";
                        echo "</div>";
                        ?>
                    </div>
                </div>
<script type="text/javascript">
function chkit(uid, chk) {
   chk = (chk==true ? "1" : "0");
   var url = "checkdb.php?userid="+uid+"&chkYesNo="+chk;
   if(window.XMLHttpRequest) {
      req = new XMLHttpRequest();
   } else if(window.ActiveXObject) {
      req = new ActiveXObject("Microsoft.XMLHTTP");
   }
   req.open("GET", url, true);
   req.send(null);
}
</script>
                </div>
            </div>
        </div>
        <script src="../patient/assets/js/jquery.js"></script>
        <script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var appid = element.attr("id");
var info = 'id=' + appid;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "deleteappointment.php",
   data: info,
   success: function(){
 }
});
  $(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
 }
return false;
});
});
</script>
        <script src="../patient/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">
        </script>
    </body>
</html>