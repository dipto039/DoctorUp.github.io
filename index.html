<?php
include_once 'assets/conn/dbconnect.php';
?>


<!-- login -->
<!-- check session -->
<?php
session_start();
// session_destroy();
if (isset($_SESSION['patientSession']) != "") {
header("Location: patient/patient.php");
}
if (isset($_POST['login']))
{
$id = mysqli_real_escape_string($con,$_POST['id']);
$password  = mysqli_real_escape_string($con,$_POST['password']);

$res = mysqli_query($con,"SELECT * FROM patient WHERE icPatient = '$id'");
$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
if (mysqli_num_rows($res)>0){
    if ($row['password'] == $password){
        $_SESSION['patientSession'] = $row['icPatient'];
        header("Location: patient/patient.php");
    }
}
else {
    $res = mysqli_query($con,"SELECT * FROM doctor WHERE doctorId = '$id'");
    $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
    if (mysqli_num_rows($res)>0){
        if ($row['password'] == $password){
            $_SESSION['doctorSession'] = $row['doctorId'];
            header("Location: doctor\doctordashboard.php");
        }
    }
    
?>
<script>
alert('wrong input ');
</script>
<?php
}
}
?>
<!-- register -->
<?php
if (isset($_POST['signup'])) {
$userType= mysqli_real_escape_string($con,$_POST['userType']);
$FirstName= mysqli_real_escape_string($con,$_POST['FirstName']);
$LastName= mysqli_real_escape_string($con,$_POST['LastName']);
$Email= mysqli_real_escape_string($con,$_POST['Email']);
$id= mysqli_real_escape_string($con,$_POST['id']);
$password= mysqli_real_escape_string($con,$_POST['password']);
$month= mysqli_real_escape_string($con,$_POST['month']);
$day= mysqli_real_escape_string($con,$_POST['day']);
$year= mysqli_real_escape_string($con,$_POST['year']);
$DOB= $year . "-" . $month . "-" . $day;
$Gender= mysqli_real_escape_string($con,$_POST['Gender']);
//INSERT
if ($userType=="patient"){
    $query = " INSERT INTO patient (  icPatient, password, patientFirstName, patientLastName,  patientDOB, patientGender,   patientEmail )
    VALUES ( '$id', '$password', '$FirstName', '$LastName', '$DOB', '$Gender', '$Email' ) ";
}
else{
    $query = " INSERT INTO doctor (  doctorId, password, doctorFirstName, doctorLastName,  doctorDOB, doctorGender, doctorEmail )
    VALUES ( '$id', '$password', '$FirstName', '$LastName', '$DOB', '$Gender', '$Email' ) ";
}
$result = mysqli_query($con, $query);

// echo $result;
if( $result )
{
?>
<script type="text/javascript">
alert('Register success. Please Login to make an appointment.');
</script>
<?php
}
else
{
?>
<script type="text/javascript">
alert('User already registered. Please try again');
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
        <title>Doctor's Appointment Application</title>
        <!-- Bootstrap -->
        <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style1.css" rel="stylesheet">
        <link href="assets/css/blocks.css" rel="stylesheet">
        <link href="assets/css/date/bootstrap-datepicker.css" rel="stylesheet">
        <link href="assets/css/date/bootstrap-datepicker3.css" rel="stylesheet">
        <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
        <!-- <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />  -->

        <!--Font Awesome (added because you use icons in your prepend/append)-->
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link href="assets/css/material.css" rel="stylesheet">
    </head>
    <body>
        <!-- navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img alt="Brand" src="assets/img/docup_logo.svg" height=40px></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                    
                    <ul class="nav navbar-nav navbar-right">
                        

                        <li><a href="#" data-toggle="modal" data-target="#myModal">Sign Up</a></li>
                   
                        <li>
                            <p class="navbar-text">Already have an account?</p>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <form class="form" role="form" method="POST" accept-charset="UTF-8" >
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="id" placeholder="ID Number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="password">Password</label>
                                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="login" id="login" class="btn btn-primary btn-block">Sign in</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navigation -->

        <!-- modal container start -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Sign Up</h3>
                    </div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <form action="<?php $_PHP_SELF ?>" method="POST" accept-charset="utf-8" class="form" role="form">
                                        <h4>It's free and always will be.</h4>

                                        <label>Signup As : </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="userType" value="patient" required/>patient
                                        </label>
                                        <label class="radio-inline" >
                                            <input type="radio" name="userType" value="doctor" required/>doctor
                                        </label>
                                        <br>
                                        
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <input type="text" name="FirstName" value="" class="form-control input-lg" placeholder="First Name" required />
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <input type="text" name="LastName" value="" class="form-control input-lg" placeholder="Last Name" required />
                                            </div>
                                        </div>

                                        
                                        <input type="text" name="Email" value="" class="form-control input-lg" placeholder="Your Email"  required/>
                                        <input type="number" name="id" value="" class="form-control input-lg" placeholder="Your IC Number"  required/>
                                        
                                        
                                        <input type="password" name="password" value="" class="form-control input-lg" placeholder="Password"  required/>
                                        
                                        <input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirm Password"  required/>
                                        <label>Birth Date</label>
                                        <div class="row">
                                            
                                            <div class="col-xs-4 col-md-4">
                                                <select name="month" class = "form-control input-lg" required>
                                                    <option value="">Month</option>
                                                    <option value="01">Jan</option>
                                                    <option value="02">Feb</option>
                                                    <option value="03">Mar</option>
                                                    <option value="04">Apr</option>
                                                    <option value="05">May</option>
                                                    <option value="06">Jun</option>
                                                    <option value="07">Jul</option>
                                                    <option value="08">Aug</option>
                                                    <option value="09">Sep</option>
                                                    <option value="10">Oct</option>
                                                    <option value="11">Nov</option>
                                                    <option value="12">Dec</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <select name="day" class = "form-control input-lg" required>
                                                    <option value="">Day</option>
                                                    <option value="01">1</option>
                                                    <option value="02">2</option>
                                                    <option value="03">3</option>
                                                    <option value="04">4</option>
                                                    <option value="05">5</option>
                                                    <option value="06">6</option>
                                                    <option value="07">7</option>
                                                    <option value="08">8</option>
                                                    <option value="09">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <select name="year" class = "form-control input-lg" required>
                                                    <option value="">Year</option>
                                                    
                                                    <option value="1981">1981</option>
                                                    <option value="1982">1982</option>
                                                    <option value="1983">1983</option>
                                                    <option value="1984">1984</option>
                                                    <option value="1985">1985</option>
                                                    <option value="1986">1986</option>
                                                    <option value="1987">1987</option>
                                                    <option value="1988">1988</option>
                                                    <option value="1989">1989</option>
                                                    <option value="1990">1990</option>
                                                    <option value="1991">1991</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1997">1997</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1999">1999</option>
                                                    <option value="2000">2000</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2011">2011</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2013">2013</option>
                                                </select>
                                            </div>
                                        </div>
                                        <label>Gender : </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="Gender" value="male" required/>Male
                                        </label>
                                        <label class="radio-inline" >
                                            <input type="radio" name="Gender" value="female" required/>Female
                                        </label>
                                        <br>
                                        <span class="help-block">By clicking Create my account, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</span>
                                        
                                        <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="signup" id="signup">Create my account</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
        <!-- modal container end -->

        <!-- 1st section start -->
        <section id="promo-1" class="content-block promo-1 min-height-600px bg-offwhite">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <h2>Make appointment today!</h2>
                        <p>This is Doctor's Schedule. Please <span class="label label-danger">login</span> to make an appointment. </p>
                            
                        <!-- date textbox -->
                       
                        <div class="input-group" style="margin-bottom:10px;">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar">
                                </i>
                            </div>
                            <input class="form-control" id="date" name="date" value="<?php echo date("Y-m-d")?>" onchange="showUser(this.value)"/>
                        </div>
                       
                        <!-- date textbox end -->

                        <!-- script start -->
                        <script>

                            function showUser(str) {
                                
                                if (str == "") {
                                    document.getElementById("txtHint").innerHTML = "";
                                    return;
                                } else { 
                                    if (window.XMLHttpRequest) {
                                        // code for IE7+, Firefox, Chrome, Opera, Safari
                                        xmlhttp = new XMLHttpRequest();
                                    } else {
                                        // code for IE6, IE5
                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                    xmlhttp.onreadystatechange = function() {
                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                                        }
                                    };
                                    xmlhttp.open("GET","getuser.php?q="+str,true);
                                    console.log(str);
                                    xmlhttp.send();
                                }
                            }
                        </script>
                        
                        <!-- script start end -->
                     
                        <!-- table appointment start -->
                        <div id="txtHint"><b> </b></div>
                        
                        <!-- table appointment end -->
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- first section end -->

        <!-- Fourth section start -->
        <section id="content-1-9" class="content-1-9 content-block">
            <div class="container">
                <div class="underlined-title">
                    <h1>Get in Touch</h1>
                    <hr>
                </div>
                <h4 style="color: rgb(0, 0, 0);  text-align: center;">Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h4>
            </div>
        </section>
        <!-- forth section end -->
        <!-- footer start -->
        <div class="copyright-bar bg-black">
            <div class="container">
                <p class="pull-left medium">© Doctor Up! <br></p>
                <p class="pull-right medium">Developed by: <a href ="https://smdipto.netlify.com/">Shakib M. Dipto </a></p>
            </div>
        </div>
        <!-- footer end -->
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/date/bootstrap-datepicker.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="assets/js/transition.js"></script>
    <script src="assets/js/collapse.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
    })
    </script>
    <!-- date start -->
  
<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })

    })

</script>

    <!-- date end -->
   
</body>
</html>
