<?php 

    include ('header.php');
    
    connect_db();
    check_db();

    $sql = "SELECT * FROM pot_posts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
    <main class="mdl-layout__content mdl-color--white-100" style="width:100%">
    <div class="container" style="padding-left: 0px;padding-right: 0px;">

<?php 
    while($row = $result->fetch_assoc()) {
        $post_id = $row["id"];
        $post_title = $row["post_title"];
        $image = $row["post_image"];
        $content = $row["post_content"];
        $excerpt = substr($content, 0,300);
        $tag = $row["post_tag"];
        $cat = $row["post_cat"];
        $author = $row["post_author"];
        $dates = $row["post_date"];
        list($date, $time) = split('[/. ]', $dates);
    ?>
    <div class="pot-row-padding pot-theme">
    <div class="pot-third pot-section" style="min-height:600px">
        <div class="pot-card-4">
        <a href="image?post_id=<?php echo "$post_id"; ?>&action=view">
        <img src="media/uploads/<?php echo "$image"; ?>" alt="<?php echo "$post_title"; ?>" style="width:100%;"></a>
            <div class="pot-container pot-white">
            <?php include 'templates/social.php'; ?>
            <b><h4><a href="?id=<?php echo "$post_id"; ?>" style="font-size: 30px;"><?php echo "$post_title"; ?></a></h4><b>
                <div class="card__meta">
                    User Category: <a href="#"><?php echo "$cat"; ?></a><br>
                    User Skills: <a href="#"><?php echo "$tag"; ?></a>
                </div><?php echo $excerpt; ?>...<a href="?id=<?php echo "$post_id"; ?>&action=view"> Full Bio</a>

                <div class="card__author-content">
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
mysqli_close($conn); ?>
</main>