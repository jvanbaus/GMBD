<?php
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);

include('config.php');

$columns = array('VenueName', 'Capacity', 'PhoneNumber', 'Email', 'City', 'State');

$query = "SELECT * FROM Venue WHERE (Status = 1) ";

// filters
if(isset($_POST['min'], $_POST['max']) && $_POST['min'] != '' && $_POST['max'] != '') {
    $min = mysqli_real_escape_string($db, $_POST['min']);
    $max = mysqli_real_escape_string($db, $_POST['max']);
    $query .= "AND (Capacity >= '$min' AND Capacity <= '$max') ";
}

if(isset($_POST["search"]["value"])) {
    $query .= ' 
        AND (VenueName LIKE "%'.$_POST["search"]["value"].'%"
        OR City LIKE "%'.$_POST["search"]["value"].'%" 
        OR ZipCode LIKE "%'.$_POST["search"]["value"].'%") 
        ';
}

if (isset($_POST["order"])) {
    $query .= ' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
    ';
} else {
    $query .= ' ORDER BY VenueName ASC ';
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
    $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['VenueName'].'"><a href="#" id="profile-name">'.$row['VenueName'].'</a></div>';
    $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['Capacity'].'">'.$row['Capacity'].'</div>';
    $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['PhoneNumber'].'">'.$row['PhoneNumber'].'</div>';
    $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['Email'].'">'.$row['Email'].'</div>';
    $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['City'].'">'.$row['City'].'</div>';        
    $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['State'].'">'.$row['State'].'</div>';

    $data[] = $sub_array;   
}

function get_all_data($db) {
    $query = "SELECT * FROM Venue WHERE Status = 1";
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

?>

