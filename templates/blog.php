<?php 

    $title = 'Blog Main';
    include ('header.php');
    
    connect_db();
    check_db();

    $sql = "SELECT * FROM pot_posts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) { ?>

    <main class="mdl-layout__content mdl-color--white-100" style="width:100%">
    <div class="container">
        <?php
    while($row = $result->fetch_assoc()) {
        $post_id = $row["id"];
        $post_title = $row["post_title"];
        $image = $row["post_image"];
        $content = $row["post_content"];
        $excerpt = substr($content, 0,300);
        $tags = $row["post_tag"];
        $cat = $row["post_cat"];
        $author = $row["post_author"];
        $dates = $row["post_date"];
        list($date, $time) = split('[/. ]', $dates);

    ?>
    <div class="wrapper" style="display:block;">
            
            <div class="card radius shadowDepth1">
                <div class="card__image border-tlr-radius">
                    <div><img src="media/uploads/<?php echo "$image"; ?>" alt="<?php echo "$post_title"; ?>" style="height: 100%;padding:10px" class="border-tlr-radius"><div class="card__meta" style="margin-top: 20px;padding-left: 20px;">
                        Posted in: <a href="./?post_cat=<?php echo "$cat"; ?>&action=view"><?php echo "$cat"; ?></a><br>
                        Tagged: <?php

                            $string = preg_replace('/[.,]/', '', $tags);
                            $elements = (explode(" ",$string));
                            foreach($elements as $tag)
                            { ?>
                            <a href="./?post_tag=<?php echo "$tag"; ?>&action=view"><?php echo "$tag"; ?></a>
                            <?php
                            }

                       ?><br><br>
                        </div>
                    </div>
                </div>

                <div class="card__content card__padding">
                    <?php include 'templates/share.php'; ?>
                    
                    <b><h1><a href="?p=<?php echo "$post_id"; ?>&action=view" style="font-size: 30px"><?php echo "$post_title"; ?></a></h1><b>

                    <article class="card__article dot-ellipsis dot-resize-update" >

                        <?php echo $excerpt; ?><a href="?post_id=<?php echo "$post_id"; ?>&action=view"> ...</a>
                        <form name="post_view_form" action="./" method="GET">
                        <input type="hidden" name="p" value="<?php echo "$post_id"; ?>">
                        <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored alignright" type="submit" name="action" value="view" style="clear: both;">
                        </form>
                        <form name="cat_view_form" action="read" method="GET" style="display: none;" >
                        <input type="hidden" name="post_cat" value="<?php echo "$tag"; ?>">
                        <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored alignright" type="submit" name="action" value="view" style="clear: both;">
                        </form>
                    </article>
                </div>

                <div class="card__action">
                    
                    <div class="card__author">
                        <img src="assets/images/icon-16.png" alt="user">
                        <div class="card__author-content">
                            Published By: <a href="#"><?php echo "$author"; ?></a><time> on <?php echo "$date"; ?></time>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } 
    } else { post_error_db(); } 
mysqli_close($conn); ?> 
</main>