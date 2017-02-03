<?php 
    $title = "Add New Post";
    include ('admin-header.php');  ?>
        <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-card__supporting-text">
                    <form id="admin-post-form" action="" method="POST" enctype="multipart/form-data">
                            <p>Post Title:<input class="mdl-textfield__input" type="text" name="post_title" id="post_title" placeholder="Add Title Here" value="<?php echo $post_title; ?>" style="max-width: 50%"/></p>
                            <p>Post Type: <input class="mdl-textfield__input" style="max-width: 50%" type="text" id="post_type" name="post_type" value="" list="post_types">
                            <datalist id="post_types">
                            <option value="Article">Article</option>
                            <option value="Page">Page</option>
                            </datalist></p>
                            <p>Post Content:</p><textarea class="mdl-textfield__input" type="text" rows="10" name="post_content" id="post_content" value="<?php echo $post_content; ?>"" ></textarea><script>CKEDITOR.replace( 'post_content' );</script>
                            <p>Post Category: <input class="mdl-textfield__input" type="text" name="post_category" list="post_categories" value="<?php echo $post_categories; ?>"" style="max-width: 50%">
                            <datalist id="post_categories">
                            <option value="Uncategorized">Article</option></datalist></p>
                            <p>Post Tags:<input class="mdl-textfield__input" type="text" name="post_tags" id="post_tags" placeholder="e.g Poetry" value="<?php echo $post_tags; ?>"" style="max-width: 50%"/></p>
                            <p>Featured Image:<input class="mdl-textfield__input" type="file" name="post_image" id="post_image" value="" style="max-width: 25%"/></p>
                            <input type="hidden" name="post_authors" value="admin">
                            <input type="hidden" name="status" value="published">
                            <input type="submit" name="action" value="PUBLISH" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    </form>
                </div>
        </main>
    <?php
    if(isset($_POT["action"])){
    
    connect_db();
    check_db();

    featured_image_uploads();

    create_post();
    
    $conn->close();
}
inc_afooter(); ?> 