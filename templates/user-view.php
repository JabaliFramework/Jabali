<?php

$title = "View User";
include ('header.php');

connect_db();
check_db();
//get_post();
    $sql = 'SELECT * FROM pot_posts WHERE id='.$_GET["id"].'';
    //$conn = $GLOBALS['conn'];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) { ?>

<main class="mdl-layout__content mdl-color--white-100" style="width:100%">
<div class="container">
<?php
while($row = $result->fetch_assoc()) {
$post_title = $row["post_title"];
$image = $row["post_image"];
$content = $row["post_content"];
$tag = $row["post_tag"];
$cat = $row["post_cat"];
$author = $row["post_author"];
$dates = $row["post_date"];
list($date, $time) = split('[/. ]', $dates);

echo '<center><h1><?php echo "$post_title"; ?></h1></center>';
?>
<style> .fishes { z-index: 1; } .fish { position:relative; left: 10px; bottom: 80px; z-index: 2; } </style>
    <div class="wrapper" style="display:block;">
        <div class="card radius shadowDepth1">

            <div class="card__image border-tlr-radius">
                <img src="media/uploads/<?php echo "$image"; ?>" alt="<?php echo "$post_title"; ?>" style="width:100%;" class="fishes border-tlr-radius">
                <img src="media/uploads/<?php echo "$image"; ?>" alt="<?php echo "$post_title"; ?>" style="width:40%;" class="fish border-tlr-radius">
            </div>

            <div class="card__content card__padding">

            <?php include 'templates/social.php'; ?>

            <div class="card__meta">
                User Category: <a href="#"><?php echo "$cat"; ?></a><br>
                User Skills: <a href="#"><?php echo "$tag"; ?></a>
            </div>

            <article class="card__article">
            <b><h4><a href="?id=<?php echo "$post_id"; ?>&action=view" style="font-size: 30px;"><?php echo "$post_title"; ?></a></h4></b>
            <?php echo "$content"; ?>
            </article>
            </div>

            <div class="card__action">
                
                <div class="card__author">
                    <img src="assets/images/icon-16.png" alt="user">
                    <div class="card__author-content">
                        Joined: <time><?php echo "$date"; ?></time>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="wrapper" style="display:block;">
    <div class="mdl-card__supporting-text">
    <form id="admin-post-form" action="" method="POST" enctype="multipart/form-data">
            <h4>Contact <?php echo "$post_title"; ?></h4>
            <p>Email Address:<input class="mdl-textfield__input" type="text" name="email" id="email" placeholder="" value="" /></p>
            <p>Name:<input class="mdl-textfield__input" type="text" name="nicename" id="nicename" placeholder="" value="" /></p>
            <p>Message:</p><textarea class="mdl-textfield__input" type="text" rows="10" name="comment" id="comment" value="" ></textarea><script>CKEDITOR.replace( 'comment' );</script>
            <input type="hidden" name="read_unread" value="unread">
            <input type="hidden" name="type" value="user"><br>
            <input type="submit" name="submit" value="SUBMIT" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
    </form>
    </div>
    </div>
</div>

</main>
    <?php
    } 
    } else {
        echo "<center><br><h2>Post not found!</h2></center>";
    mysqli_close($conn);
}
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    connect_db();
    check_db();

    $sql = "INSERT INTO pot_comments (email, nicename, comment, read_unread, type)
        VALUES ('".$_POST["email"]."','".$_POST["nicename"]."','".$_POST["comment"]."','".$_POST["read_unread"]."','".$_POST["type"]."')";

        if ($conn->multi_query($sql) === TRUE) {
            echo "<script type = \"text/javascript\">
                        alert(\"New Comment Submitted!\");
                    </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    mysqli_close($conn);
}