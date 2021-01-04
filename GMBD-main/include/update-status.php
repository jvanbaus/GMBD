<?php
include('config.php');

$table = mysqli_real_escape_string($db, $_POST['table']);
$status = mysqli_real_escape_string($db, $_POST['status']);
$id = mysqli_real_escape_string($db, $_POST['id']);

$id_type = '';
if ($table == 'Artist') {
    $id_type = 'artistId';
} else if ($table == 'Business') {
    $id_type = 'BusinessID';
} else if ($table == 'Venue') {
    $id_type = 'VenueID';
}

$query = "UPDATE $table SET Status = '$status' WHERE $id_type = '$id'";

$result = mysqli_query($db, $query);

if ($result) {
    $data = 0;
} else {
    $data = 1;
}

echo $data;
?>