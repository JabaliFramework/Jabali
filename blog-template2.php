<?php 

    $title = 'Blog';
    include ('header.php');
    include ('navbar.php');  ?>
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
    ?>

    <div class="pot-container pot-padding-32 pot-theme-d1">
  <h1><?php echo "$title"; ?></h1>
    </div>

<?php 
    while($row = $result->fetch_assoc()) {
        $post_id = $row["id"];
        $post_title = $row["post_title"];
        $image = $row["post_image"];
        $content = $row["post_content"];
        $tag = $row["post_tag"];
        $cat = $row["post_cat"];
        $author = $row["post_author"];
        $date = $row["created_at"];
    ?>
    <div class="pot-row-padding pot-theme">
    <div class="pot-third pot-section" style="min-height:600px">
        <div class="pot-card-4">
        <img src="content/uploads/<?php echo "$image"; ?>" alt="<?php echo "$post_title"; ?>" style="width:100%;">
            <div class="pot-container pot-white">
            <h4><?php echo "$post_title"; ?></h4>
                <div class="card__meta">
                    Posted in: <a href="#"><?php echo "$cat"; ?></a><br>
                    Tagged: <a href="#"><?php echo "$tag"; ?></a>
                </div><br>
            <?php echo substr($content, 0,210); ?>...

                <form name="post_view_form" action="blog.php" method="GET">
                <input type="hidden" name="post_id" value="<?php echo "$post_id"; ?>">
                <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored alignright" type="submit" name="action" value="view" style="clear: both;">
                </form>
                <div class="card__author-content">
                    Published By: <a href="#"><?php echo "$author"; ?></a><time> on <?php echo "$date"; ?></time>
                </div><br><br>
            </div>
        </div>
    </div>
    </div>
<?php
    } 
    } else {
        echo "<center><br><h2>No posts found!</h2></center>";
} 
mysqli_close($conn);
    
include ('footer.php'); ?>