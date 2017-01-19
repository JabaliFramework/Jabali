<?php 

    $title = 'Comments';
    include ('admin-header.php');  ?>
        <main class="mdl-layout__content mdl-color--white-100">
        <?php
         include 'config/db.php';
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM pot_comments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    echo "<center><h1>All Comments</h1>";
    echo "<table><tr>
    <th>ID</th>
    <th>Email</th>
    <th>Name</th>
    <th>Comment</th>
    <th>Date Posted</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["email"]."</td>
        <td>".$row["nicename"]."</td>
        <td>".$row["comment"]."</td>
        <td>".$row["comment_date"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<center><br><h2>No comments found!</h2></center>";
    echo "</center>";
}
    mysqli_close($conn);
    ?>
   
</main>
    <p style="display: none;" id="notification">Success!</p>
    <?php 
    
include ('admin-footer.php'); ?>