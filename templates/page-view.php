<?php

$title = "View Page";
include ('header.php');

connect_db();
check_db();

    $sql = 'SELECT * FROM pot_posts WHERE id='.$_GET["page"].''; //AND post_type='Page'
    $result = $conn->query($sql);

    if ($result->num_rows > 0) { ?>
<main class="mdl-layout__content mdl-color--white-100" style="width:100%">
<div class="container">
<?php
while($row = $result->fetch_assoc()) {
$page_title = $row["post_title"];
$image = $row["post_image"];
$content = $row["post_content"];
$tag = $row["post_tag"];
$cat = $row["post_cat"];
$author = $row["post_author"];
$dates = $row["post_date"];
list($date, $time) = split('[/. ]', $dates);

echo '<center><h1><?php echo "$page_title"; ?></h1></center>';
?>
    <div class="wrapper" style="display:block;">
        <div class="card radius shadowDepth1">
            <div class="card__image border-tlr-radius">
                <img src="media/uploads/<?php echo "$image"; ?>" alt="<?php echo "$page_title"; ?>" style="width:100%;" class="border-tlr-radius">
            </div>

            <div class="card__content card__padding">

            <div class="card__meta">
            </div>
            <?php include 'templates/share.php'; ?>

            <article class="card__article">
            <h4><a href="?page=<?php echo "$post_id"; ?>" style="font-size: 30px;"><?php echo "$page_title"; ?></a></h4>
            <div class="card__author">
                    <img src="assets/images/icon-16.png" alt="user">
                    <div class="card__author-content">
                        By: <a href="#"><?php echo "$author"; ?></a><br>
                        <time>Published on <?php echo "$date"; ?></time>
                    </div>
            </div><br>
            <?php echo "$content"; ?>
            </article>
            
            </div>
        </div>
    </div>
</div>

</main>
    <?php
    } 
    } else {
        echo "<center><br><h2>Page not found!</h2></center>";
    mysqli_close($conn);
}