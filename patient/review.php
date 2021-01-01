<?php
session_start();
// include_once '../connection/server.php';
include_once '../assets/conn/dbconnect.php';
if(!isset($_SESSION['patientSession']))
{
header("Location: ../index.php");
}
$res=mysqli_query($con,"SELECT * FROM patient WHERE icPatient=".$_SESSION['patientSession']);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<?php
if (isset($_POST['submit'])) {
	$icpatient=$_SESSION['patientSession'];
	$doctorId = $_POST['doctorId'];
	$review = $_POST['review'];
	$sql="insert into review (icPatient,doctorId,review) values('$icpatient','$doctorId','$review')";
	$res=mysqli_query($con,$sql);

if($res){
	header( 'Location: review.php' ) ;
}
else
{
?>
<script type="text/javascript">
alert('Something went wrong. Please try again.');
</script>
<?php
}

}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Patient Dashboard</title>
		<!-- Bootstrap -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/default/style.css" rel="stylesheet">
		<!-- <link href="assets/css/default/style1.css" rel="stylesheet"> -->
		<link href="assets/css/default/blocks.css" rel="stylesheet">
		<link href="assets/css/date/bootstrap-datepicker.css" rel="stylesheet">
		<link href="assets/css/date/bootstrap-datepicker3.css" rel="stylesheet">
		<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
		<!--Font Awesome (added because you use icons in your prepend/append)-->
		<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
		<!-- <link href="assets/css/material.css" rel="stylesheet"> -->
	</head>
	<body>
		
		<!-- navigation -->
		<nav class="navbar navbar-default " role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="patient.php"><img alt="Brand" src="assets/img/docup_logo.svg" height="40px"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<ul class="nav navbar-nav">
							<li><a href="patient.php">Home</a></li>
							<!-- <li><a href="profile.php?patientId=<?php echo $userRow['icPatient']; ?>" >Profile</a></li> -->
							<li><a href="patientapplist.php?patientId=<?php echo $userRow['icPatient']; ?>">Appointment</a></li>
							<li><a href="review.php?patientId=<?php echo $userRow['icPatient']; ?>">Review</a></li>
						</ul>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userRow['patientFirstName']; ?> <?php echo $userRow['patientLastName']; ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="profile.php?patientId=<?php echo $userRow['icPatient']; ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
								</li>
								<li>
									<a href="patientapplist.php?patientId=<?php echo $userRow['icPatient']; ?>"><i class="glyphicon glyphicon-file"></i> Appointment</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="patientlogout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- navigation -->
		
		<div class="container">
			<section style="padding-bottom: 50px; padding-top: 50px;">
				<div class="row">
					<!-- start -->
					<!-- USER PROFILE ROW STARTS-->
					<div class="row">
						<div class="col-md-3 col-sm-3">
							
							<div class="user-wrapper">
								<img src="assets/img/dp.svg" class="img-responsive" />
								<div class="description">
									<h4><?php echo $userRow['patientFirstName']; ?> <?php echo $userRow['patientLastName']; ?></h4>
									<hr />
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Post a Review!</button>
								</div>
							</div>
						</div>
						
						<div class="col-md-9 col-sm-9  user-wrapper">
							<div class="description">
								<h3><?php echo "Review of the Doctors" ?></h3>
								<hr />
								
								<div class="panel panel-default">
									<div class="panel-body">
										
										
										<table class="table table-user-information" align="center">
											<tbody>
												<thead>
													<tr>
														<th width="30%">Review About </th>
														<th width="40%">Detailed Review </th>
														<th width="30%">Review Posted By </th>
													</tr>
												</thead>
												<?php
												$sql="select * from review";
												$result=mysqli_query($con,$sql);
												while ($reviewRow = mysqli_fetch_array($result)) {
												
												$p_info = mysqli_query($con, "SELECT * from patient where icPatient=".$reviewRow['icPatient']);
												$p_info = mysqli_fetch_array($p_info);
												$p_info = $p_info['patientFirstName']." ".$p_info['patientLastName']." [ ".$p_info['icPatient']." ]";
												$d_info = mysqli_query($con, "SELECT * from doctor where doctorId=".$reviewRow['doctorId']);
												$d_info = mysqli_fetch_array($d_info);
												$d_info = "Dr. ". $d_info['doctorFirstName']." ".$d_info['doctorLastName']." [ ".$d_info['doctorId']." ]";
												?>

												<tr>
													<td> <?php echo $d_info ?></td>
													<td> <?php echo $reviewRow['review'] ?></td>
													<td> <?php echo $p_info ?></td> 
													
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
					<!-- USER PROFILE ROW END-->
					<!-- end -->
					<div class="col-md-4">
												
						<!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Post a Review!</h4>
									</div>
									<div class="modal-body">
										<!-- form start -->
										<form action="<?php $_PHP_SELF ?>" method="post" >
											<table class="table table-user-information">
												<tbody>
													<tr>
														<td>Your Name:</td>
														<td><?php echo $userRow['patientFirstName']. " ".$userRow['patientLastName'];?></td>
													</tr>
													<tr>
														<td>Doctor's Name:</td>
														<td>
															<select class="select form-control" id="scheduleday" name="doctorId" required>
																<?php
																$s="select * from doctor";
																$r=mysqli_query($con,$s);
																while($docRow=mysqli_fetch_array($r)):;
																	$name="[ ".$docRow['doctorId']." ] ".$docRow['doctorFirstName']." ".$docRow['doctorLastName'];
																	$id=$docRow['doctorId']
																?>
																<option value=<?php echo $id; ?>>
																	<?php echo $name; ?>
																</option>
																<?php endwhile; ?>

															</select>
														<td>
													</tr>
													<tr>
														<td>Write your review: </td>
														<td><textarea class="form-control" name="review" required>what's on your mind?</textarea></td>
													</tr>
													<tr>
														<td></td>
														<td>
														<div class='col-md-offset-3 pull-right'>
															<input type="submit" name="submit" class="btn btn-primary" value="Post Review">
														</div>	
														</td>
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
					<!-- ROW END -->
				</section>
				<!-- SECTION END -->
			</div>
			<!-- CONATINER END -->
			<script src="assets/js/jquery.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
			
		</body>
	</html>