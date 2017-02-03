<div class="card__share">
    <div class="card__social">  
        <span class="share-icon facebook" id="sharingBtn"><i class="fa fa-facebook"></i></span>

        <a class="share-icon twitter" href="http://twitter.com/share?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>&via=@jfwork"><span class="fa fa-twitter"></span></a>

        <a class="share-icon instagram" href="#"><span class="fa fa-instagram"></span></a>

        <a class="share-icon googleplus" href="#"><span class="fa fa-google-plus"></span></a>

        <a class="share-icon whatsapp" href="whatsapp://send?text=<?php echo $post_title; ?>" data-action="share/whatsapp/share"><span class="fa fa-whatsapp"></span></a>

        <a class="share-icon email" href="mailto:sample@email.com" data-rel="external"><span class="fa fa-envelope"></span></a>
    </div>

    <a id="share" class="share-toggle share-icon" href="#"></a>
</div>



          <!-- The Modal -->
<div id="sharingModal" class="modal">

   <!-- Modal content -->
          <div class="modal-content">
            <div class="modal-header">
            <img src="assets/images/icon-16-w.png" style="margin: 0px;z-index: 2;width: 16px"> Share On Facebook  <i class="fa fa-facebook"></i>
              <span class="close alignright"">×</span>
            </div>
            <div class="modal-body">
            <modal>
            <iframe src="http://www.facebook.com/sharer.php?u=<?php echo $post_url; ?>" width="100%"></iframe>
            </modal>
            </div>
          </div>

</div>

          <!-- The Modal -->
<div id="twitterModal" class="modal">

   <!-- Modal content -->
          <div class="modal-content">
            <div class="modal-header">
            <img src="assets/images/icon-16-w.png" style="margin: 0px;z-index: 2;width: 16px"> Tweet Post  <i class="fa fa-twitter"></i>
              <span class="close alignright"">×</span>
            </div>
            <div class="modal-body">
            <modal>
            <iframe src="http://twitter.com/share?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>&via=@jfwork" width="100%"></iframe>
            </modal>
            </div>
          </div>

</div>

          <!-- The Modal -->
<div id="emailModal" class="modal">

   <!-- Modal content -->
          <div class="modal-content">
            <div class="modal-header">
            <img src="assets/images/icon-16-w.png" style="margin: 0px;z-index: 2;width: 16px"> Email Post  <i class="fa fa-envelope"></i>
              <span class="close">×</span>
            </div>
            <div class="modal-body">
            <modal>
            <form>
              <input type="email" name="mailto">
              <input type="hidden" name="subject">
              <input type="hidden" name="excerpt">
              <input type="hidden" name="url">
              <input type="submit" name="send" value="send">
            </form>
            </modal>
            </div>
          </div>

</div>