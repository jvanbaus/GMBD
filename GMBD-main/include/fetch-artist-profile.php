<?php include('config.php');

$id = mysqli_real_escape_string($db, $_POST['id']);

$query = "SELECT * FROM Artist WHERE artistId = '$id'";

$result = mysqli_query($db, $query);

$data = array();
while ($row = mysqli_fetch_array($result)) {
    $data[] = $row['Biography'];
    $data[] = $row['genre'];
    $data[] = $row['facebook'];
    $data[] = $row['twitter'];
    $data[] = $row['instagram'];
    $data[] = $row['website'];
    $data[] = $row['email'];
    $data[] = $row['City'];
    $data[] = $row['State'];

}

echo json_encode($data);

?>