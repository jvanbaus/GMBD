<?php
include('config.php');

$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$profession = mysqli_real_escape_string($db, $_POST['profession']);
$fname = mysqli_real_escape_string($db, $_POST['fname']);
$lname = mysqli_real_escape_string($db, $_POST['lname']);
$pname = mysqli_real_escape_string($db, $_POST['pname']);

$usertype = '';
$p = '';
if ($profession == 'Artist') {
    $usertype = 1;
    $p = "artistName";
} else if ($profession == 'Business') {
    $usertype = 2;
    $p = "BusinessName";
} else if ($profession == 'Venue') {
    $usertype = 3;
    $p = "VenueName";
}

//check if username exists 
$username_exists = "SELECT Username FROM Users WHERE Username = '$username'";
$r = mysqli_query($db, $username_exists);
$num_rows = mysqli_num_rows($r);
if ($num_rows != 0) {
    // username exists error = 1
    $data = 1;
} else {
    mysqli_free_result($r);

    //check if pname exists        
    $pname_exists = "SELECT $p FROM $profession WHERE $p = '$pname'";
    $r = mysqli_query($db, $pname_exists);
    $num_rows = mysqli_num_rows($r);
    if ($num_rows != 0) {
        // pname exists error = 2
        $data = 2;
    } else {
        mysqli_free_result($r);

        // create new user
        $query = "INSERT IGNORE INTO Users (Username, Password, Email, AccountTypeID, FirstName, LastName) VALUES ('$username', '$password', '$email', '$usertype', '$fname', '$lname')";

        $result = mysqli_query($db, $query);

        if ($result) {        
            $userid = mysqli_insert_id($db);

            $query1 = "INSERT IGNORE INTO $profession ($p, Email, UserID) VALUES ('$pname', '$email', '$userid')";            

            if (mysqli_query($db, $query1)) {
                // success return = 0
                $data = 0;
            } else {
                // unsuccessful return error = 4
                $data = 4;
            } 
        } else {
            // unsuccessful return error = 3
            $data = 3;
        }
    }
}
echo $data;
?>