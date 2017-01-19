<?php 

    $title = 'All Posts';
    include ('admin-header.php'); 
    ?>
        <main class="mdl-layout__content mdl-color--white-100">
        <?php
         include 'config/db.php';
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM pot_posts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    echo '<center><h2>All Posts     <a style="padding-left:20px" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" href="post-new.php"><i class="material-icons">add</i><a/></h2></center>';
    echo '<div class="table-responsive-vertical shadow-z-1" style="padding-left:10px; padding-right:10px; text-decoration-color: white;">';
    echo '<table id="table" class="table table-hover table-mc-light-blue sortable" style="width:100%; text-decoration-color: #ffffff; border-spacing: 15px;" border="1"><tr>
    <th>ID</th>
    <th>Type</th>
    <th>Title</th>
    <th>Content</th>
    <th>Thumbnail</th>
    <th>Category</th>
    <th>Tag</th>
    <th>Author</th>
    <th>Date</th>
    <th>Actions</th></tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr>
        <td>'.$row["id"].'</td>
        <td>'.$row["post_type"].'</td>
        <td>'.$row["post_title"].'</td>
        <td>'.$row["post_content"].'</td>
        <td><img src="../content/uploads/'.$row["post_image"].'" alt="'.$row["post_title"].'" style="float:left;width:180px;margin:10px"></td>
        <td>'.$row["post_cat"].'</td>
        <td>'.$row["post_tag"].'</td>
        <td>'.$row["post_author"].'</td>
        <td>'.$row["created_at"].'</td>
        <td><center>    <form name="post_edit_form" action="post-edit.php" method="GET">
        <input type="hidden" name="post_id" value="'.$row["id"].'">
        <input type="submit" name="edit" value="edit">
    </form>
    <br>
    <form name="post_delete_form" action="post-edit.php" method="GET">
        <input type="hidden" name="post_id" value="'.$row["id"].'">
        <input type="submit" name="edit" value="delete">
    </form></center></td></tr>';
    }
    echo "</table>";
    echo "</div>";
} else {
    echo "<center><br><h2>No posts found!</h2></center>";
}
    mysqli_close($conn);
    ?>
</main>
    <?php 
    
include ('admin-footer.php'); ?>