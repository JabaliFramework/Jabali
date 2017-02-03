<?php 

    $title = 'Blog Masonry';
    include ('header.php');
    
    connect_db();
    check_db();

    $sql = "SELECT * FROM pot_posts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
    <main class="mdl-layout__content mdl-color--white-100" style="width:100%">
    <div class="container">

<?php 
    while($row = $result->fetch_assoc()) {
        $home_url = HOME;
    $post_id = $row["id"];
    $post_slug = $row["post_slug"];
    $post_url = $row["post_url"];
    $post_type = $row["post_type"];
    $post_title = $row["post_title"];
    $post_content = $row["post_content"];
    $post_excerpt = $row["post_excerpt"];
    $post_cat = $row["post_cat"];
    $post_tags = $row["post_tag"];
    $post_author = $row["post_author"];
    $post_status = $row["post_status"];
    $post_image = $row["post_image"];
    $post_image_url = $row["post_image_url"];
    $dates = $row["post_date"];
    list($date, $time) = split('[/. ]', $dates);
    ?>
    <div class="pot-row-padding pot-theme">
    <div class="pot-third pot-section" style="min-height:600px">
        <div class="pot-card-4">
        <a href="image?post_id=<?php echo "$post_id"; ?>&action=view">
        <img src="media/uploads/<?php echo "$post_image"; ?>" alt="<?php echo "$post_title"; ?>" style="width:100%;"></a>
        
        <?php include 'templates/share.php'; ?>
            <div class="pot-container pot-white">
            <b><h4><a href="?p=<?php echo "$post_id"; ?>" style="font-size: 30px;"><?php echo "$post_title"; ?></a></h4><b>
                <div class="card__meta">
                    Posted in: <a href="#"><?php echo "$post_cat"; ?></a><br>
                    Tagged: <?php

                            $string = preg_replace('/[.,]/', '', $post_tags);
                            $elements = (explode(" ",$string));
                            foreach($elements as $post_tag)
                            { ?>
                            <a href="./?tag=<?php echo "$post_tag"; ?>&action=view"><?php echo "$post_tag"; ?></a>
                            <?php
                            }?><br>
            <?php echo $post_excerpt; ?><a href="?p=<?php echo "$post_id"; ?>">...</a><br><a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored alignright" href="?p=<?php echo $post_id; ?>" style="clear: both;">VIEW</a>
                <div class="card__author-content">
                    By: <a href="#"><?php echo "$post_author"; ?></a><br>
                    <time>On <?php echo "$date"; ?></time>
                </div><br><br>
            </div>
        </div>
    </div>
    </div>
<?php
    } 
    } else {post_error_db();} 
mysqli_close($conn); ?>
</main>