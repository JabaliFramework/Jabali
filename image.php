<?php
/**
 * @package Jabali Framework
 * @subpackage Archives
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */

$title = "View Image";
include ('header.php');

connect_db();
check_db();
get_post();
 
if ($result->num_rows > 0) { ?>
        <main class="mdl-layout__content mdl-color--white-100" style="width:100%">
        <?php
    while($row = $result->fetch_assoc()) {
        $post_title = $row["post_title"];
        $image = $row["post_image"];
        $content = $row["post_content"];
        $tag = $row["post_tag"];
        $cat = $row["post_cat"];
        $author = $row["post_author"];
        $date = $row["created_at"];

        echo '<center><h1><?php echo "$post_title"; ?></h1></center>';
    ?>
    <div class="wrapper" style="display:block;">
            
            <div class="card radius shadowDepth1">
                <div class="card__image border-tlr-radius">
                    <img src="media/uploads/<?php echo "$image"; ?>" alt="<?php echo "$post_title"; ?>" style="width:100%;" class="border-tlr-radius">
                </div>

                <div class="card__content card__padding">
                    <div class="card__share">
                        <div class="card__social">  
                            <a class="share-icon facebook" href="#"><span class="fa fa-facebook"></span></a>
                            <a class="share-icon twitter" href="#"><span class="fa fa-twitter"></span></a>
                            <a class="share-icon googleplus" href="#"><span class="fa fa-google-plus"></span></a>
                        </div>

                        <a id="share" class="share-toggle share-icon" href="#"></a>
                    </div>

                    <div class="card__meta">
                        Featured Image for: <a href="read?post_id=<?php echo "$post_id"; ?>&action=view"><?php echo "$post_title"; ?></a><br>
                    </div>
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
} ?>
</main> <?php
}  
include ('footer.php'); ?>