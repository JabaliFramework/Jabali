<?php
$title = "Posts JSON";
include ('../admin/functions.php');

connect_db();
check_db();

$sql = "SELECT username, email, nicename, bio, user_category, skills, website, avatar, user_avatar_url, cover, cap, reg_date FROM pot_users";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
	$array[] = $row;
}

header('Content-Type:Application/json');
echo json_encode($array);

} ?>