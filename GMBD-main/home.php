<?php
include("include/config.php");
session_start();
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Georgia Music Business Directory</title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">   
        
        <style>

        </style>
    </head>

<body>
    <?php include('include/navbar.php'); ?>


        <div id="SLIDE_BG">
            <div class="home_content text-center"  >
                                <div class="home_subtitle" style="padding-top: 10%"><h2 style=" -webkit-text-stroke-width: .5px; -webkit-text-stroke-color: black; color: white;">A directory for everything music in Georgia</h2></div>
                                <div class="home_title" style="padding-top: 10px"><h1 style="font-size:120px; -webkit-text-stroke-width: 2px; -webkit-text-stroke-color: black; color: white;">Georgia Music Business Directory</h1></div>
                                <div class="home_link" style="padding-bottom: 18%"><h2 style=" -webkit-text-stroke-width: .5px; -webkit-text-stroke-color: black; color: white;">Artist Directory, Music industry Directory, Venue Directory, and Upcoming Events</h2></div>
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
            
            
        });

    </script>
    <?php include('include/footer.php'); ?>
</body>
</html>