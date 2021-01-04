<?php
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);

include('config.php');

// artist table
if ($_POST['table'] == 'Artist') {
    $columns = array('artistName', 'Status');

    $query = "SELECT * FROM Artist ";


    if(isset($_POST["search"]["value"])) {
        $query .= ' 
            WHERE artistName LIKE "%'.$_POST["search"]["value"].'%"
            OR Status LIKE "%'.$_POST["search"]["value"].'%" 
            ';
    }

    if (isset($_POST["order"])) {
        $query .= ' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
        ';
    } else {
        $query .= ' ORDER BY Status ASC ';
    }

    $query1 = '';

    if ($_POST["length"] != -1) {
        $query1 .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    $number_filter_row = mysqli_num_rows(mysqli_query($db, $query));

    $result = mysqli_query($db, $query . $query1);

    $data = array();

    while ($row = mysqli_fetch_array($result)) {
        $sub_array = array();
        $status = '';
        if ($row['Status'] == 0) {
            $status = "Pending";
        } else if ($row['Status'] == 1) {
            $status = "Approved";
        } else {
            $status = "Denied";
        }

        $sub_array[] = '<div class="update" data-id="'.$row["artistId"].'" data-column="'.$row['artistName'].'"><a href="#" id="profile-name">'.$row['artistName'].'</a></div>';
        $sub_array[] = '<div class="update" data-id="'.$row["artistId"].'" data-column="'.$row['Status'].'">'.$status.'</div>';
        $sub_array[] = '<div class="btn-group" role="group" data-id="'.$row["artistId"].'">
                        <button type="button" name="approve" id="approve" data-toggle="tooltip" title="Approve User" class="btn btn-success">Approve</button>
                        <button type="button" name="pending" id="pending" data-toggle="tooltip" title="User Pending" class="btn btn-warning">Pending</button>
                        <button type="button" name="deny" id="deny" data-toggle="tooltip" title="Deny User" class="btn btn-danger">Deny</button></div></td>';

        $data[] = $sub_array;   
    }

    function get_all_data($db) {
        $query = "SELECT * FROM Artist";
        $result = mysqli_query($db, $query);
        return mysqli_num_rows($result);
    }

    $output = array(
        "draw"              =>  intval($_POST["draw"]),
        "recordsTotal"      =>  get_all_data($db),
        "recordsFiltered"   =>  $number_filter_row,
        "data"              =>  $data
    );

    echo json_encode($output);

    // business table
} else if ($_POST['table'] == 'Business') {
    $columns = array('BusinessName', 'Status');

    $query = "SELECT * FROM Business ";


    if(isset($_POST["search"]["value"])) {
        $query .= ' 
            WHERE BusinessName LIKE "%'.$_POST["search"]["value"].'%"
            OR Status LIKE "%'.$_POST["search"]["value"].'%" 
            ';
    }

    if (isset($_POST["order"])) {
        $query .= ' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
        ';
    } else {
        $query .= ' ORDER BY Status ASC ';
    }

    $query1 = '';

    if ($_POST["length"] != -1) {
        $query1 .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    $number_filter_row = mysqli_num_rows(mysqli_query($db, $query));

    $result = mysqli_query($db, $query . $query1);

    $data = array();

    while ($row = mysqli_fetch_array($result)) {
        $sub_array = array();
        $status = '';
        if ($row['Status'] == 0) {
            $status = "Pending";
        } else if ($row['Status'] == 1) {
            $status = "Approved";
        } else {
            $status = "Denied";
        }

        $sub_array[] = '<div class="update" data-id="'.$row["BusinessID"].'" data-column="'.$row['BusinessName'].'"><a href="#" id="profile-name">'.$row['BusinessName'].'</a></div>';
        $sub_array[] = '<div class="update" data-id="'.$row["BusinessID"].'" data-column="'.$row['Status'].'">'.$status.'</div>';
        $sub_array[] = '<div class="btn-group" role="group" data-id="'.$row["BusinessID"].'">
                        <button type="button" name="approve" id="approve" data-toggle="tooltip" title="Approve User" class="btn btn-success">Approve</button>
                        <button type="button" name="pending" id="pending" data-toggle="tooltip" title="User Pending" class="btn btn-warning">Pending</button>
                        <button type="button" name="deny" id="deny" data-toggle="tooltip" title="Deny User" class="btn btn-danger">Deny</button></div></td>';

        $data[] = $sub_array;   
    }

    function get_all_data($db) {
        $query = "SELECT * FROM Business";
        $result = mysqli_query($db, $query);
        return mysqli_num_rows($result);
    }

    $output = array(
        "draw"              =>  intval($_POST["draw"]),
        "recordsTotal"      =>  get_all_data($db),
        "recordsFiltered"   =>  $number_filter_row,
        "data"              =>  $data
    );

    echo json_encode($output);
   
    // venue table
} else if ($_POST['table'] == 'Venue') {
    $columns = array('VenueName', 'Status');

    $query = "SELECT * FROM Venue ";


    if(isset($_POST["search"]["value"])) {
        $query .= ' 
            WHERE VenueName LIKE "%'.$_POST["search"]["value"].'%"
            OR Status LIKE "%'.$_POST["search"]["value"].'%" 
            ';
    }

    if (isset($_POST["order"])) {
        $query .= ' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
        ';
    } else {
        $query .= ' ORDER BY Status ASC ';
    }

    $query1 = '';

    if ($_POST["length"] != -1) {
        $query1 .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    $number_filter_row = mysqli_num_rows(mysqli_query($db, $query));

    $result = mysqli_query($db, $query . $query1);

    $data = array();

    while ($row = mysqli_fetch_array($result)) {
        $sub_array = array();
        $status = '';
        if ($row['Status'] == 0) {
            $status = "Pending";
        } else if ($row['Status'] == 1) {
            $status = "Approved";
        } else {
            $status = "Denied";
        }

        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['VenueName'].'"><a href="#" id="profile-name">'.$row['VenueName'].'</a></div>';
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['Status'].'">'.$status.'</div>';
        $sub_array[] = '<div class="btn-group" role="group" data-id="'.$row["VenueID"].'">
                        <button type="button" name="approve" id="approve" data-toggle="tooltip" title="Approve User" class="btn btn-success">Approve</button>
                        <button type="button" name="pending" id="pending" data-toggle="tooltip" title="User Pending" class="btn btn-warning">Pending</button>
                        <button type="button" name="deny" id="deny" data-toggle="tooltip" title="Deny User" class="btn btn-danger">Deny</button></div></td>';

        $data[] = $sub_array;   
    }

    function get_all_data($db) {
        $query = "SELECT * FROM Venue";
        $result = mysqli_query($db, $query);
        return mysqli_num_rows($result);
    }

    $output = array(
        "draw"              =>  intval($_POST["draw"]),
        "recordsTotal"      =>  get_all_data($db),
        "recordsFiltered"   =>  $number_filter_row,
        "data"              =>  $data
    );

    echo json_encode($output);
}
?>