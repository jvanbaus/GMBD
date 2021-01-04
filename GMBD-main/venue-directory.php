<!DOCTYPE html>


<?php
//--------------- FILTER---------------//
include('include/config.php');
session_start();
//$capacity = '';
//$query = "SELECT DISTINCT Capacity FROM Venue ORDER BY Capacity ASC";
//$statement = $connect->prepare($query);
//$statement->execute();
//$result = $statement->fetchAll();
//foreach($result as $row)
//{
// $capacity .= '<option value="'.$row['Capacity'].'">'.$row['Capacity'].'</option>';
//}

?>

<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Venue Directory</title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">     
    </head>

    <body>
        <?php include('include/navbar.php'); ?>

        <div id="venue-directory-header">
		    <div class="d-flex flex-column align-items-center justify-content-center">
                <h1>Venue Directory</h1>
            </div>
		</div>

        <div class="container" style="padding-top:30px">
            <!-- filters -->
            <div id="filters" role="tablist">
                <div class="card">
                    <div class="card-header" role="tab" id="filters-head">
                        <h5 style="margin-bottom:0;"><a href="#filters-collapse" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="filters-collapse">
                            Filters
                        </a></h5>
                    </div>
                    <div id="filters-collapse" class="collapse" role="tabpanel" aria-labelledby="filters-head" data-parent="#filters">
                        <div class="card-body">
                            <div class="row">
                                <!-- capacity range filter -->
                                <div class="col-auto form-inline">
                                    <label for="capacity-range" class="col-form-label"><strong>Capacity Range:</strong></label>
                                    <div class="capacity-range">
                                        <input type="number" class="form-control" id="minCapacity">
                                        <input type="number" class="form-control" id="maxCapacity">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button type="button" class="btn btn-primary btn-width" id="apply-filters">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- venue table -->
            <div class="row">
                <div class="col-sm-12">
                    <table id="venue-table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-toggle="tooltip" title="Sort by name">Venue Name</th>
                                <th data-toggle="tooltip" title="Sort by capacity">Capacity</th>
                                <th data-toggle="tooltip" title="Sort by number">Phone Number</th>
                                <th data-toggle="tooltip" title="Sort by email">Email</th>
                                <th data-toggle="tooltip" title="Sort by city">City</th>
                                <th data-toggle="tooltip" title="Sort by state">State</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <?php include('include/footer.php'); ?>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            // filter variables
            var min = '';
            var max = '';

            fetch_data();
            function fetch_data() {                
                var dataTable = $('#venue-table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "dom": '<"top"f>t<"bottom"ip>',
                    "ajax": {
                        url: "include/fetch-venue.php",
                        type: "POST",
                        data: {
                            min: min,
                            max: max
                        }
                    }
                });
            };

            // link click to go to profile
            $('#venue-table').on('click', '#profile-name', function() {
                var id = $(this).parent('div').data('id');
                var name = $(this).text();

                toProfile(id, name);
            })

            // send to profile
            function toProfile(id, name) {
                $.ajax({
                    url: 'include/to-venue-profile.php',
                    method: 'POST',
                    data: {
                        id: id,
                        name: name
                    }, success: function(data) {
                        if (data != 'error') {
                            window.location.assign(data);
                        } else {
                            alert("error");
                        }
                    }
                })
            }

            // filters
            $('#apply-filters').click(function () {
                if ($('#minCapacity').val()) {
					min = $('#minCapacity').val();
					if ($('#maxCapacity').val()) {
						max = $('#maxCapacity').val();
					} else {
						max = 999999;
					}
				} else {
                    min = 0;
					if ($('#maxCapacity').val()) {
						max = $('#maxCapacity').val();
					} else {
						max = 999999;
					}
				}
                
                $('#venue-table').DataTable().destroy();
                fetch_data();
            });
            
        });

    </script>    
    </body>
</html>