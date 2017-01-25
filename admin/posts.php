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

    if ($result->num_rows > 0) { ?>

    <center><h2>All Posts     <a style="padding-left:20px" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" href="post-new.php"><i class="material-icons">add</i><a/></h2></center>
    <div class="table table-responsive-vertical shadow-z-1" style="padding-left:15px; padding-right:15px;">
    <table id="table" class="mdl-data-table" cellspacing="0" width="100%"><tr>
    <th>ID</th>
    <th>Type</th>
    <th>Title</th>
    <th>Content</th>
    <th>Category</th>
    <th>Tag</th>
    <th>Author</th>
    <th>Date</th>
    <th>Actions</th></tr>'
    <?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $url = '../content/uploads/';
        $post_id = $row["id"];
        $post_type = $row["post_type"];
        $post_title = $row["post_title"];
        $image = $row["post_image"];
        $post_content = $row["post_content"];
        $tag = $row["post_tag"];
        $cat = $row["post_cat"];
        $author = $row["post_author"];
        $date = $row["created_at"]; ?>
        <tr>
        <td><?php echo "$post_id"; ?></td>
        <td><?php echo "$post_type"; ?></td>
        <td><?php echo "$post_title"; ?></td>
        <td><?php echo substr($post_content, 0,50); ?>...</td>
        <td><?php echo "$cat"; ?></td>
        <td><?php echo "$tag"; ?></td>
        <td><?php echo "$author"; ?></td>
        <td><?php echo "$date"; ?></td>
        <td><center>    <form name="post_view_form" action="../blog.php" method="GET">
        <input type="hidden" name="post_id" value="<?php echo "$post_id"; ?>">
        <input type="submit" name="action" value="view">
    </form>
    <br><form name="post_edit_form" action="post-edit.php" method="GET">
        <input type="hidden" name="post_id" value="<?php echo "$post_id"; ?>">
        <input type="submit" name="action" value="edit">
    </form>
    <br>
    <form name="post_delete_form" action="post-edit.php" method="GET">
        <input type="hidden" name="post_id" value="<?php echo "$post_id"; ?>">
        <input type="submit" name="action" value="delete">
    </form></center></td></tr>
    <?php
    } ?>
    </table>
    </div>

<?php
} else {
    echo "<center><br><h2>No posts found!</h2></center>";
}
    mysqli_close($conn);
    ?>
</main>
    <?php 
    
include ('admin-footer.php'); ?>