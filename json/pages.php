<?php
$title = "Posts JSON";
include ('../admin/functions.php');

connect_db();
check_db();

$sql = 'SELECT * FROM pot_posts WHERE post_type="Page"';
    $result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
	$array[] = $row;
}

header('Content-Type:Application/json');
echo json_encode($array);

} ?>