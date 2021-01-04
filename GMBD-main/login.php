<?php
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);

include("include/config.php");
session_start();

$error_login = false;
   
if($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from form 
	
	$myusername = mysqli_real_escape_string($db,$_POST['username']);
	$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
	
	$sql = "SELECT * from Users WHERE Username = '$myusername' and Password = '$mypassword'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
	$count = mysqli_num_rows($result);
	
	// If result matched $myusername and $mypassword, table row must be 1 row
	// send user to home page for their account type
	
	if($count == 1) {
		  
	  	$row2 = mysqli_fetch_assoc($result);
		$ut = $row['AccountTypeID'];
		
		$usertype = '';
		if ($ut == 0) {
			$usertype = 'Admin';
		} else if ($ut == 1) {
			$usertype = 'Artist';
		} else if ($ut == 2) {
			$usertype = 'Business';
		} else if ($ut == 3) {
			$usertype = 'Venue';
		}

        $_SESSION['login_user'] = $myusername;
		$_SESSION['user_type'] = $usertype;
		if ($usertype == 'Admin') {			 
			header("Location: admin-dashboard.php");
		} elseif ($usertype == 'Artist') {
			header("Location: home.php");
		} elseif ($usertype == 'Venue') {
			header("Location: home.php");
		} elseif ($usertype == 'Business') {
			header("Location: home.php");
		}
		          
    } else {
        $error_login = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
	<!-- HEADER -->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sign In</title>

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

<!-- PAGE CONTENT -->
<div id="sign-in-form" class="container-fluid">
	
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div id="home-accordion" role="tablist">
				<div class="card">			
					<div class="card-header" role="tab" id="login-heading">
						<h2 class="mb-0 text-center"> <a id="login-accordion" data-toggle="collapse" href="#login-collapse" role="button" aria-expanded="true" aria-controls="login-collapse">Sign In</a></h2>
					</div>
					<div id="login-collapse" class="collapse show" role="tabpanel" aria-labelledby="login-heading" data-parent="#home-accordion">
			      		<div class="card-body">
							<form class="sign-in-form" method="POST" action="">
								<div class="form-group">
									<input type="text" class="form-control" name="username" id="username" required="required" placeholder="Enter your username">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="password" id="password" required="required" placeholder="Enter your password">
								</div>
								<div class="text-center">
									<input type="submit" id="submit" name="submit" class="btn btn-lg btn-primary" value="SIGN IN" data-toggle="tooltip" data-placement="bottom" title="Click to sign in">
								</div>
							</form>
							<?php
								if ($error_login) { ?>
									<div class="alert alert-warning">The Username and Password combination you entered is incorrect.</div>
									<?php $error_login = false;
								}
							?>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" role="tab" id="create-account-heading">
						<h2 class="mb-0 text-center"> <a id="create-account-accordion" href="#create-account-collapse" role="button" data-toggle="collapse" expanded="false" aria-controls="create-account-collapse">New? Sign up for an account</a></h2>
					</div>
					<div id="create-account-collapse" class="collapse" role="tabpanel" aria-labelledby="create-account-heading" data-parent="#home-accordion">
			      		<div class="card-body text-center">
							<p><a href="create-account.php" role="button" class="btn btn-lg btn-primary" data-toggle="tooltip" data-placement="bottom" title="Click to create a new account">Create Account Form</a></p>
						</div>
					</div>
				</div>			  
		  	</div>
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
	
	<?php include('include/footer.php'); ?>
</body>
</html>
