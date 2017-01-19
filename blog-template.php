<?php 

    $title = 'All Posts';
    include ('header.php');  ?>
        <main class="mdl-layout__content mdl-color--white-100" style="width:100%">
        <?php
         include 'admin/config/db.php';
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM pot_posts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    echo '<center><h1>All Posts</h1></center>';
    while($row = $result->fetch_assoc()) {

        foreach ($result as $id) {
            # code...

        echo '<div class="items">
          <div class="item"><div style="width:100%;padding-left:15px; display:block"><div style="display:block;">
        <h2><b>'.$row["post_title"].'<b></h2>
        <span><img src="content/uploads/'.$row["post_image"].'" alt="'.$row["post_title"].'" style="float:left;width:180px;margin:10px">'.$row["post_content"].'</span></div>
        <p style="display:block;">
        <b>Post Type: </b>'.$row["post_type"].'<br>
        <b>Category: </b>'.$row["post_cat"].'<br>
        <b> Tags: </b>'.$row["post_tag"].'</p>
        <p>Published by <b>'.$row["post_author"].'</b> on '.$row["created_at"].'</p><hr></div></div></div>';
    ?>
    </main>
    <?php
    }
    } 
    } else {
        echo "<center><br><h2>No posts found!</h2></center>";
} 
mysqli_close($conn);
    
include ('footer.php'); ?>