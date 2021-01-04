<?php
include('config.php');
session_start();
/*
create session variable to hold profile data or use get ajax

*/
if (isset($_POST['id'], $_POST['name'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);

    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;

    $data = "artist-profile.php";
    echo $data;

}   else {
    $data = "error";
    echo $data;
}

?>