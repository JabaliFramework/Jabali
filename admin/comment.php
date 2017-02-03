<?php 

    $title = 'Read Comment';
    include ('admin-header.php');

    if(isset($_GET["id"])){

    connect_db();
    check_db();

    $sql = 'UPDATE pot_comments SET read_unread="read" WHERE id="'.$_GET["id"].'";';

    $sql .= 'SELECT * FROM pot_comments WHERE id="'.$_GET["id"].'"';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" >
                <div class="mdl-card__supporting-text">
                <div>
        <?php echo "
        <h4>Comment by ".$row["email"]."</h4>
        <b>Posted on: <b>".$row["comment_date"]."
        <h5>Name: ".$row["nicename"]."</h5>
        <h6>Comment:</h6> <blockquote>".$row["comment"]."</blockquote>";
        ?>
        </div>
                    <form id="admin-post-form" action="" method="POST" enctype="multipart/form-data">
                            <h3>Add Response</h3>
                            <p>Response:</p><textarea style="color: #000000" cols="140" rows="120" name="post_content" id="post_content" value="" ></textarea><script>CKEDITOR.replace( 'post_content' );</script>
                            <input type="submit" name="submit" value="RESPOND" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                            <input type="hidden" name="email" value="email@domain.com">
                            <input type="hidden" name="nicename" value="Admin">
                    </form>
                </div>
            </div>
        </main>
    </div>
    <?php
    } 
} else {
    echo "<center><br><h2>Comment not found!</h2></center>";
}

} 

if(isset($_POST["submit"])){

    connect_db();
    check_db();

    $sql = "INSERT INTO pot_comments (email, nicename, comment, read_unread)
    VALUES ('".$_POST["email"]."','".$_POST["nicename"]."','".$_POST["comment"]."','".$_POST["read_unread"]."')";

    if ($conn->multi_query($sql) === TRUE) {
        echo "<script type = \"text/javascript\">
                    alert(\"Response Created successfully!\");
                </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

inc_afooter(); ?> 