        <script>
    $(document).ready(function($) {

    $('.card__share > a').on('click', function(e){ 
        e.preventDefault() // prevent default action - hash doesn't appear in url
        $(this).parent().find( 'div' ).toggleClass( 'card__social--active' );
        $(this).toggleClass('share-expanded');
    });

    });
    </script>
    <div class="card__share">
            <div class="card__social">  
                <a class="share-icon facebook" href="#"><span class="fa fa-facebook"></span></a>
                <a class="share-icon twitter" href="#"><span class="fa fa-twitter"></span></a>
            </div>

            <a id="share" class="share-toggle share-icon" href="#"></a>
        </div>