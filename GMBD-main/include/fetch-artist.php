<?php
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);

include('config.php');

$columns = array('artistName', 'genre', 'website', 'email');

$query = "SELECT * FROM Artist WHERE (Status = 1) ";

// filters
if (isset($_POST['genre0'], $_POST['genre1'], $_POST['genre2'], $_POST['genre3'], $_POST['genre4'], $_POST['genre5'], 
        $_POST['genre6'], $_POST['genre7']) &&
        $_POST['genre0'] != '' && $_POST['genre1'] != '' && $_POST['genre2'] != '' && $_POST['genre3'] != '' && 
        $_POST['genre4'] != '' && $_POST['genre5'] != '' && $_POST['genre6'] != '' && $_POST['genre7'] != '') {
            if (!($_POST['genre0'] == "0" && $_POST['genre1'] == "0" && $_POST['genre2'] == "0" && $_POST['genre3'] == "0" && 
            $_POST['genre4'] == "0" && $_POST['genre5'] == "0" && $_POST['genre6'] == "0" && $_POST['genre7'] == "0")) {                
                $genre = array($_POST['genre0'], $_POST['genre1'], $_POST['genre2'], $_POST['genre3'], $_POST['genre4'], $_POST['genre5'], $_POST['genre6'], $_POST['genre7']);
                $c = 0;
                for ($i = 0; $i < count($genre); $i++) {
                    if ($genre[$i] != "0") {
                        $g = $genre[$i];
                        if ($c == 0) {                
                            $query .= 'AND (genre LIKE "%'.$g.'%"';
                        } else {                
                            $query .= ' OR genre LIKE "%'.$g.'%"';
                        }
                        $c++;
                    }
                }
                $query .= ")";
            } 
}

if(isset($_POST["search"]["value"])) {
    $query .= ' 
        AND (artistName LIKE "%'.$_POST["search"]["value"].'%"
        OR genre LIKE "%'.$_POST["search"]["value"].'%") 
        ';
}

if (isset($_POST["order"])) {
    $query .= ' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
    ';
} else {
    $query .= ' ORDER BY artistName ASC ';
}

$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($db, $query));

$result = mysqli_query($db, $query . $query1);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    if ($row['Status'] == 1) {
        $sub_array = array();
        $sub_array[] = '<div class="update" data-id="'.$row["artistId"].'" data-column="'.$row['artistName'].'"><a href="#" id="profile-name">'.$row['artistName'].'</a></div>';
        $sub_array[] = '<div class="update" data-id="'.$row["artistId"].'" data-column="'.$row['genre'].'">'.$row['genre'].'</div>';
        $sub_array[] = '<div class="update" data-id="'.$row["artistId"].'" data-column="'.$row['website'].'">'.$row['website'].'</div>';
        $sub_array[] = '<div class="update" data-id="'.$row["artistId"].'" data-column="'.$row['email'].'">'.$row['email'].'</div>';
    
        $data[] = $sub_array;
    }
}

function get_all_data($db) {
    $query = "SELECT * FROM artist WHERE Status = 1";
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

