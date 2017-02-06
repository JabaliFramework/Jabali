<?php

$title = "Read Post";
include ('header.php');

connect_db();
check_db();

    $sql = 'SELECT * FROM pot_posts WHERE post_url='.$_GET["p"].'';
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
    <div class="wrapper" style="display:block;">
        <div class="card radius shadowDepth1">
            <div class="card__image border-tlr-radius">
                <img src="media/uploads/<?php echo "$image"; ?>" alt="<?php echo "$post_title"; ?>" style="width:100%;" class="border-tlr-radius">
            </div>

            <div class="card__content card__padding">

            <div class="card__meta">
                Posted in: <a href="#"><?php echo "$cat"; ?></a><br>
                Tagged: <a href="#"><?php echo "$tag"; ?></a>
            </div>
            <?php include 'templates/share.php'; ?>

            <article class="card__article">
            <b><h4><a href="read?post_id=<?php echo "$post_id"; ?>&action=view" style="font-size: 30px;"><?php echo "$post_title"; ?></a></h4></b>
            <?php echo "$content"; ?>
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
    
    <div class="wrapper" style="display:block;">
    <div class="mdl-card__supporting-text">
    <form id="admin-post-form" action="" method="POST" enctype="multipart/form-data">
            <h3>Add New Comment</h3>
            <p>Email Address:<input class="mdl-textfield__input" type="text" name="email" id="email" placeholder="" value="" /></p>
            <p>Name:<input class="mdl-textfield__input" type="text" name="nicename" id="nicename" placeholder="" value="" /></p>
            <p>Message:</p><textarea style="color: #000000" cols="140" rows="120" name="comment" id="comment" value="" ></textarea><script>CKEDITOR.replace( 'comment' );</script>
            <input type="hidden" name="read_unread" value="unread">
            <input type="hidden" name="type" value="post"><br>
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