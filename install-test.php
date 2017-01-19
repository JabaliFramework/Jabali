<?php
include 'admin/config/db.php';
?>
<!doctype html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Fetch Posts</title>
      <link rel="stylesheet" type="text/css" href="assets/css/tables.css">
    </head>
    <body>
<?php
      $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

		// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT id, dbhost, dbname, dbuser, merch_name, merch_id, sag_password, merch_callback FROM pot_options";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    echo "<center><h1>All Posts</h1>";
    echo "<table><tr>
    <th>ID</th>
    <th>DB Name</th>
    <th>DB User</th>
    <th>Merch Name</th>
    <th>Merch ID</th>
    <th>SAG Pass</th>
    <th>Merch Callback</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["dbname"]."</td>
        <td>".$row["dbuser"]."</td>
        <td>".$row["merch_name"]."</td>
        <td>".$row["merch_id"]."</td>
        <td>".$row["sag_password"]."</td>
        <td>".$row["merch_callback"]."</td></tr>";
    }
    echo "</table>";

    echo "<p>Title: ".$row["merch_name"]."</p>";
} else {
    echo "0 results";
    echo "</center>";
}
	mysqli_close($conn);
		?>

	<!-- Responsive table starts here -->
	<!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
	<div class="table table-hover table-mc-light-blue">
	</div>
    </body>
    </html>