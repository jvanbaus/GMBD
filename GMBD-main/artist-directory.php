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
        <title>Artist Directory</title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">     
    </head>

    <body>
        <?php include('include/navbar.php'); ?>

        <div id="artist-directory-header">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <h1>Artist Directory</h1>
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
                                <!-- genre filter -->
                                <div class="form-group" id="choose-genre">
                                    <label for="choose-genre"><strong>Genre</strong></label>
                                    <div class="form-inline">
                                        <input type="checkbox" value="rock" id="rock" name="choose-genre" class="form-check"><label for="rock">Rock</label>
                                    </div>
                                    <div class="form-inline">
                                        <input type="checkbox" value="pop" id="pop" name="choose-genre" class="form-check"><label for="pop">Pop</label>
                                    </div>
                                    <div class="form-inline">
                                        <input type="checkbox" value="hip hop" id="hip-hop" name="choose-genre" class="form-check"><label for="hip-hop">Hip Hop</label>
                                    </div>
                                    <div class="form-inline">
                                        <input type="checkbox" value="rap" id="rap" name="choose-genre" class="form-check"><label for="rap">Rap</label>
                                    </div>
                                    <div class="form-inline">
                                        <input type="checkbox" value="country" id="country" name="choose-genre" class="form-check"><label for="country">Country</label>
                                    </div>
                                    <div class="form-inline">
                                        <input type="checkbox" value="folk" id="folk" name="choose-genre" class="form-check"><label for="folk">Folk</label>
                                    </div>
                                    <div class="form-inline">
                                        <input type="checkbox" value="r&b" id="r-b" name="choose-genre" class="form-check"><label for="r-b">R&B</label>
                                    </div>
                                    <div class="form-inline">
                                        <input type="checkbox" value="electronic" id="electronic" name="choose-genre" class="form-check"><label for="electronic">Electronic</label>
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
            <!-- artist table -->
            <div class="row">
                <div class="col-sm-12">
                    <table id="artist-table" class="table table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th data-toggle="tooltip" title="Sort by name">Artist Name</th>
                                <th data-toggle="tooltip" title="Sort by genre">Genre</th>
                                <th data-toggle="tooltip" title="Sort by website">Website</th>
                                <th data-toggle="tooltip" title="Sort by email">Email</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        
    <!-- FOOTER -->
    <?php include('include/footer.php'); ?>

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var filters = [];
            fetch_data();

            // table creation from db
            function fetch_data() {
                var dataTable = $('#artist-table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "dom": '<"top"f>t<"bottom"ip>',
                    "order": [],
                    "ajax": {
                        url: "include/fetch-artist.php",
                        type: "POST",
                        data: {
                            genre0: filters[0],
                            genre1: filters[1],
                            genre2: filters[2],
                            genre3: filters[3],
                            genre4: filters[4],
                            genre5: filters[5],
                            genre6: filters[6],
                            genre7: filters[7]
                        }
                    }
                });
            }; 

            // link click to go to profile
            $('#artist-table').on('click', '#profile-name', function() {
                var id = $(this).parent('div').data('id');
                var name = $(this).text();

                toProfile(id, name);
            })

            // ajax call to redirect to profile
            function toProfile(id, name) {
                $.ajax({
                    url: 'include/to-artist-profile.php',
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
            $(document).on('click', '#apply-filters', function () {
                //type filters
                filters = [];
				$.each($('input[name="choose-genre"'), function() {
					if ($(this).is(':checked')) {
						filters.push($(this).val());
					} else {
						filters.push(0);
					}
				});
                
                $('#artist-table').DataTable().destroy();
                fetch_data();
            });
            
        });

    </script>
    </body>
</html>