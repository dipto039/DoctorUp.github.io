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
if (isset($_POST['submit'])) {
    //variables
    $doctorFirstName = $_POST['doctorFirstName'];
    $doctorLastName = $_POST['doctorLastName'];
    $doctorPhone = $_POST['doctorPhone'];
    $doctorEmail = $_POST['doctorEmail'];
    $doctorAddress = $_POST['doctorAddress'];
    $degrees=$_POST['degrees'];
    $speciality=$_POST['speciality'];
    
    $res=mysqli_query($con,"UPDATE doctor SET doctorFirstName='$doctorFirstName', doctorLastName='$doctorLastName', doctorPhone='$doctorPhone', doctorEmail='$doctorEmail', doctorAddress='$doctorAddress', degrees='$degrees', speciality='$speciality' WHERE doctorId=".$_SESSION['doctorSession']);
    // $userRow=mysqli_fetch_array($res);
    
    header( 'Location: doctordashboard.php' ) ;
    
}
    
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
                        <li class="active">
                            <a href="doctordashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="addschedule.php"><i class="fa fa-fw fa-clock-o"></i> Doctor Schedule</a>
                        </li>
                        <li>
                            <a href="patientlist.php"><i class="fa fa-fw fa-edit"></i> Patient List</a>
                        </li>
                        <li>
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
                            Dashboard
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

                    <div class="panel panel-primary">

                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Doctor Details</h3>
                        </div>
                        <!-- panel heading end -->

                        <div class="panel-body">
                        <!-- panel content start -->
                          <div class="container">
            <section style="padding-bottom: 50px; padding-top: 50px;">
                <div class="row">
                    <!-- start -->
                    <!-- USER PROFILE ROW STARTS-->
                    <div class="row">
                        
                        <div class="col-md-9 col-sm-9  user-wrapper">
                            <div class="description">
                                <h3> <?php echo $userRow['doctorFirstName']; ?> <?php echo $userRow['doctorLastName']; ?> </h3>
                                <hr />
                                
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        
                                        
                                        <table class="table table-user-information" align="center">
                                            <tbody>
                                                
                                                
                                                <tr>
                                                    <td>Doctor ID</td>
                                                    <td><?php echo $userRow['doctorId']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td><?php echo $userRow['doctorAddress']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Contact Number</td>
                                                    <td><?php echo $userRow['doctorPhone']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><?php echo $userRow['doctorEmail']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Degrees</td>
                                                    <td><?php echo $userRow['degrees']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Speciality</td>
                                                    <td><?php echo $userRow['speciality']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Birthdate</td>
                                                    <td><?php echo $userRow['doctorDOB']; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class='col-md-offset-3 pull-right'>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update Profile</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    <!-- USER PROFILE ROW END-->
                    <div class="col-md-4">
                        
                        <!-- Large modal -->
                        
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Update Profile information</h4>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="<?php $_PHP_SELF ?>" method="post" >
                                            <table class="table table-user-information">
                                                <tbody>
                                                    <tr>
                                                        <td>Doctor's ID:</td>
                                                        <td><?php echo $userRow['doctorId']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>First Name:</td>
                                                        <td><input type="text" class="form-control" name="doctorFirstName" value="<?php echo $userRow['doctorFirstName']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Last Name</td>
                                                        <td><input type="text" class="form-control" name="doctorLastName" value="<?php echo $userRow['doctorLastName']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone number</td>
                                                        <td><input type="text" class="form-control" name="doctorPhone" value="<?php echo $userRow['doctorPhone']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><input type="text" class="form-control" name="doctorEmail" value="<?php echo $userRow['doctorEmail']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td><textarea class="form-control" name="doctorAddress"  ><?php echo $userRow['doctorAddress']; ?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Degrees</td>
                                                        <td><textarea class="form-control" name="degrees"  ><?php echo $userRow['degrees']; ?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Speciality</td>
                                                        <td><textarea class="form-control" name="speciality"  ><?php echo $userRow['speciality']; ?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="submit" name="submit" class="btn btn-info" value="Update Info"></td>                                                            
                                                        </tr>
                                                    </tbody>
                                                    
                                                </table>
                                                
                                                
                                                
                                            </form>
                                            <!-- form end -->
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <br /><br/>
                        </div>
                        
                    </div>
                        <!-- panel content end -->
                        <!-- panel end -->

<script type="text/javascript">
function chkit(uid, chk) {
   chk = (chk==true ? "1" : "0");
   var url = "checkdb.php?userid="+uid+"&chkYesNo="+chk;
   if(window.XMLHttpRequest) {
      req = new XMLHttpRequest();
   } else if(window.ActiveXObject) {
      req = new ActiveXObject("Microsoft.XMLHTTP");
   }
   // Use get instead of post.
   req.open("GET", url, true);
   req.send(null);
}
</script>


 
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->


       
        <!-- jQuery -->
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
        <!-- Bootstrap Core JavaScript -->
        <script src="../patient/assets/js/bootstrap.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
         <!-- script for jquery datatable start-->
        <script type="text/javascript">
            /*
            Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
            */
            $(document).ready(function(){
                $('.filterable .btn-filter').click(function(){
                    var $panel = $(this).parents('.filterable'),
                    $filters = $panel.find('.filters input'),
                    $tbody = $panel.find('.table tbody');
                    if ($filters.prop('disabled') == true) {
                        $filters.prop('disabled', false);
                        $filters.first().focus();
                    } else {
                        $filters.val('').prop('disabled', true);
                        $tbody.find('.no-result').remove();
                        $tbody.find('tr').show();
                    }
                });

                $('.filterable .filters input').keyup(function(e){
                    /* Ignore tab key */
                    var code = e.keyCode || e.which;
                    if (code == '9') return;
                    /* Useful DOM data and selectors */
                    var $input = $(this),
                    inputContent = $input.val().toLowerCase(),
                    $panel = $input.parents('.filterable'),
                    column = $panel.find('.filters th').index($input.parents('th')),
                    $table = $panel.find('.table'),
                    $rows = $table.find('tbody tr');
                    /* Dirtiest filter function ever ;) */
                    var $filteredRows = $rows.filter(function(){
                        var value = $(this).find('td').eq(column).text().toLowerCase();
                        return value.indexOf(inputContent) === -1;
                    });
                    /* Clean previous no-result if exist */
                    $table.find('tbody .no-result').remove();
                    /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
                    $rows.show();
                    $filteredRows.hide();
                    /* Prepend no-result row if all rows are filtered */
                    if ($filteredRows.length === $rows.length) {
                        $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
                    }
                });
            });
        </script>
        <!-- script for jquery datatable end-->

    </body>
</html>