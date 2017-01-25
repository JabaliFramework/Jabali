<?php 

    $title = 'All Posts';
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
    echo '<center><h1>Blog</h1></center>';
    echo '<div class="wrapper" style="display: -webkit-flex;display: flex;">';
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
            <div class="card radius shadowDepth1" style="width:22%;max-width:25%; margin: 5px auto;display: block;" >
                <div class="card__image border-tlr-radius">
                    <img src="content/uploads/<?php echo "$image"; ?>" alt="<?php echo "$post_title"; ?>" style="float:left;width:300px;margin:10px" class="border-tlr-radius">
                </div>

                <div class="card__content card__padding">
                    <?php include 'share.php'; ?>

                    <div class="card__meta">
                        Posted in: <a href="#"><?php echo "$cat"; ?></a><br>
                        Tagged: <a href="#"><?php echo "$tag"; ?></a>
                    </div>

                    <b><h1 style="line-height: 200%;"><a href="#"><?php echo "$post_title"; ?></a></h1><b>

                    <article class="card__article dot-ellipsis dot-resize-update" >

                        <?php echo substr($content, 0,500); ?>
                        <form name="post_view_form" action="blog.php" method="GET">
                        <input type="hidden" name="post_id" value="<?php echo "$post_id"; ?>">
                        <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored alignright" type="submit" name="action" value="view" style="clear: both;">
                        </form>
                    </article>
                </div>

                <div class="card__action">
                    
                    <div class="card__author">
                        <img src="http://lorempixel.com/40/40/sports/" alt="user">
                        <div class="card__author-content">
                            Published By: <a href="#"><?php echo "$author"; ?></a><time> on <?php echo "$date"; ?></time>
                        </div>
                    </div>
                </div>
            </div>

    <?php
    } 
    } else {
        echo "<center><br><h2>No posts found!</h2></center>";
}

echo "</div>"; 
mysqli_close($conn);
    
include ('footer.php'); ?>