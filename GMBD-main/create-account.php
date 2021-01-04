<?php
include("include/config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<!-- HEADER -->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Georgia Music Business Directory - Register</title>

		<!-- Stylesheets -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
		    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
	</head>

    <body>
<!-- NAVIGATION -->
<?php include('include/navbar.php'); ?>
<div id="register-account-header">
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h1 id="register-account-title">Register New Account</h1>
    </div>
</div>
<!-- PAGE CONTENT -->
<div class="container-fluid">	
	<div class="row justify-content-center">
		<div class="col-md-6">    
            <div id="alert-message"></div>        
            <form class="register-form" method="POST" action="">
                <div class="form-group">
                    <input type="text" class="form-control" name="fname" id="fname" required="required" placeholder="Enter your first name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="lname" id="lname" required="required" placeholder="Enter your last name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username" required="required" placeholder="Enter your username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" required="required" placeholder="Enter your password">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" required="required" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <select required id="profession" class="form-control">
                        <option disabled selected>Select your profession</option>
                        <option id="artist-profession">Artist</option>
                        <option id="business-profession">Business</option>
                        <option id="venue-profession">Venue</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="pname" id="pname" required="required" placeholder="Enter your professional name or business name">
                </div>               
                <div class="text-center">
                    <button type="button" id="submit-btn" name="submit" class="btn btn-lg btn-primary" data-toggle="tooltip" title="Click to register a new account">Create Account</button>
                </div>
            </form>	  
		</div>
	</div>	
</div>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
		$(function () {
  			$('[data-toggle="tooltip"]').tooltip();
		})
	</script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#submit-btn').click( function () {
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var username = $('#username').val();
                var password = $('#password').val();
                var email = $('#email').val();
                var profession = $('#profession').val();
                var pname = $('#pname').val();
                $.ajax({
                    url: 'include/register.php',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        fname: fname,
                        lname: lname,
                        username: username,
                        password: password,
                        email: email,
                        profession: profession,
                        pname: pname
                    }, 
                    success: function(data) {  
                        getAlert(data);
                    }
                })
            })

            function getAlert(data) {
                if (data == 0) {
                    $('#alert-message').html('<div class="alert alert-success">You have successfully registered your account!</div>');
                } else if (data == 1) {
                    $('#alert-message').html('<div class="alert alert-warning">Username already exists. Try again.</div>');
                } else if (data == 2) {
                    $('#alert-message').html('<div class="alert alert-warning">Professional or Business name already exists. Try again.</div>');
                } else if (data == 3) {
                    $('#alert-message').html('<div class="alert alert-danger">Database error. Try again later.</div>');
                } else if (data == 4) {
                    $('#alert-message').html('<div class="alert alert-danger">Database error. Try again later.</div>');
                }
            }
        })

    </script>
</body>
</html>