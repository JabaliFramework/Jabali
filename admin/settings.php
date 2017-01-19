<?php 

    $title = 'All Settings';
    include ('admin-header.php');  ?>
        <main class="mdl-layout__content mdl-color--white-100">
        <?php
         include 'config/db.php';
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

		// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT id, dbhost, dbname, dbuser, dbpass merch_name, merch_id, sag_password, merch_callback FROM pot_options";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    echo "<center><h1>All Settings</h1>";
    echo "<table><tr>
    <td>ID</td>
    <td>DB Name</td>
    <td>DB User</td>
    <td>Merch Name</td>
    <td>Merch ID</td>
    <td>SAG Pass</td>
    <td>Merch Callback</td></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {

        echo "<tr>
        <th>".$row["id"]."</th>
        <th>".$row["dbname"]."</th>
        <th>".$row["dbuser"]."</th>
        <th>".$row["merch_name"]."</th>
        <th>".$row["merch_id"]."</th>
        <th>".$row["sag_password"]."</th>
        <th>".$row["merch_callback"]."</th></tr>";
    }
    echo "</table>";
    echo $row["id"];
} else {
    echo "0 results";
    echo "</center>";
}
	mysqli_close($conn);
    ?>
   
</main>
    <p style="display: none;" id="notification">Success!</p>
    <?php 
    
include ('admin-footer.php'); ?>