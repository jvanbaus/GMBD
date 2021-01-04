<?php
include("include/config.php");
session_start();

// code to put profile session variable to $name
$name = $_SESSION['name'];
$id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $name ?>'s Profile</title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">     
    </head>

<body>
    <?php include('include/navbar.php'); ?>
    
	<!-- for jquery to get profile info from server -->
	<div hidden id="profile-id"><?php echo $id ?></div>
	<div id="venue-directory-header">
		<div class="d-flex flex-column align-items-center justify-content-center">
			<h1><?php echo $name ?></h1>
		</div>
	</div>

	<!-- PROFILE -->
    <div class="container">
    	<div class="row">
    		<div class="col-sm-8">
          		<!-- BIO -->
          		<div id="bio-section" style="padding-bottom: 24px;">
            		<h3>Biography</h3>
            			<p id="biography"></p>
				 </div>
				 <!-- CATEGORIES -->
				 <div id="category-section">
					 <h3>Category</h3>
					 	<p id="category"></p>
					 	<p id="subcategory"></p>
				 </div>
			</div>
			<div class="col-sm-4">
				<!-- LINKS -->
				<div id="links-section">
					<h3>Website</h3>
						<p id="website"></p>
					<h3>Email</h3>
						<p id="email"></p>
					<h3>Location</h3>
						<p id="location"></p>
				</div>
			</div>
     	</div>
    </div>



  </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            get_profile();
            
            // ajax function to get profile info; pass profile id to function then send to include/fetch-venue-profile.php
            function get_profile() {
                var id = $('#profile-id').text();
                $.ajax({
                    url: 'include/fetch-business-profile.php',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        id: id
                    }, success: function(data) {
						displayProfile(...data);
                    }
                })
			}
			
			// displays profile info from db on profile page
			function displayProfile(...data) {
				$('#biography').text(data[0]);
				$('#category').text(data[1]);
				$('#subcategory').text(data[2]);
				
				$('#website').html('<a href="'+data[3]+'">'+data[3]+'</a>');
				$('#email').text(data[4]);
				$('#location').html(data[5]+', '+data[6]+', '+data[7]+' '+data[8]);
			}

        })
    </script>
</body>
</html>

