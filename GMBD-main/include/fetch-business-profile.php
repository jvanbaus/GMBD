<?php include('config.php');

$id = mysqli_real_escape_string($db, $_POST['id']);

$query = "SELECT * FROM BusinessProfs WHERE BusinessProfID = '$id'";

$result = mysqli_query($db, $query);

$data = array();
while ($row = mysqli_fetch_array($result)) {
    $data[] = $row['Biography'];
    $data[] = $row['Category'];
    $data[] = $row['Subcategory'];
    $data[] = $row['Website'];
    $data[] = $row['Email'];
    $data[] = $row['StreetAddress'];
    $data[] = $row['City'];
    $data[] = $row['State'];
    $data[] = $row['ZipCode'];

}

echo json_encode($data);

?>