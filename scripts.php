<?php
/**
 * @package Jabali Framework
 * @subpackage Main
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */
 ?>
    <script src="assets/js/jquery-3.1.1.min.js" ></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.dotdotdot.min.js" ></script>
    <script src="assets/js/ckeditor/ckeditor.js"></script>
    <script src="assets/js/sort-table.js"></script>
    <script src="assets/js/jssor.slider-22.1.8.mini.js"></script>
    <script language="Javascript">
    <!-- Allows only numeric chars -->
    function isNumberKey(evt) 
    {
        var charCode=(evt.which)?evt.which:event.keyCode
        if(charCode>31&&(charCode<48||charCode>57))
        return false;return true;
    }
    </script>
    <script>
    $(document).ready(function($) {

    $('.card__share > a').on('click', function(e){ 
        e.preventDefault() // prevent default action - hash doesn't appear in url
        $(this).parent().find( 'div' ).toggleClass( 'card__social--active' );
        $(this).toggleClass('share-expanded');
    });

    });
    </script>

    <script>
    $(document).ready(function($) {

    $('.card__share > a').on('click', function(e){ 
        e.preventDefault() // prevent default action - hash doesn't appear in url
        $(this).parent().find( 'div' ).toggleClass( 'card__social_me--active' );
        $(this).toggleClass('share-expanded');
    });

    });
    </script>
    <script>
    $(document).ready(function(){
        $("#hide").click(function(){
            $("modal").hide();
        });
        $("#show").click(function(){
            $("modal").show();
        });
    });
    </script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_SlideoTransitions = [
              [{b:0,d:1160,x:783,e:{x:6}}],
              [{b:1160,d:840,x:667,y:34,e:{x:12,y:3}}],
              [{b:2780,d:520,x:-272,e:{x:6}},{b:4000,d:600,x:276,e:{x:5}}],
              [{b:3300,d:640,y:-145,e:{y:6}},{b:4000,d:600,y:149,e:{y:5}}],
              [{b:2020,d:760,y:-319,e:{y:6}},{b:4000,d:600,x:-320,e:{x:5}}],
              [{b:0,d:2000,x:-320,y:1200}],
              [{b:0,d:3000,x:-320,y:1200}],
              [{b:0,d:4000,x:-320,y:1200}],
              [{b:20,d:20000,x:1000}],
              [{b:20,d:1600,x:800}],
              [{b:0,d:1000,x:-767,e:{x:6}},{b:21000,d:1000,x:-807,e:{x:5}}],
              [{b:20,d:500,r:-360}],
              [{b:20,d:500,r:-360}],
              [{b:-1,d:1,o:-0.35}],
              [{b:100,d:100,o:-1,e:{o:32}},{b:2300,d:100,o:1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:100,d:100,o:1,e:{o:32}},{b:200,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:200,d:100,o:1,e:{o:32}},{b:300,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:300,d:100,o:1,e:{o:32}},{b:400,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:400,d:100,o:1,e:{o:32}},{b:500,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:500,d:100,o:1,e:{o:32}},{b:600,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:600,d:100,o:1,e:{o:32}},{b:700,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:700,d:100,o:1,e:{o:32}},{b:800,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:800,d:100,o:1,e:{o:32}},{b:900,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:900,d:100,o:1,e:{o:32}},{b:1000,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:1000,d:100,o:1,e:{o:32}},{b:1100,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:1100,d:100,o:1,e:{o:32}},{b:1200,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:1200,d:100,o:1,e:{o:32}},{b:1300,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:1300,d:100,o:1,e:{o:32}},{b:1400,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:1400,d:100,o:1,e:{o:32}},{b:1500,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:1500,d:100,o:1,e:{o:32}},{b:1600,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:1600,d:100,o:1,e:{o:32}},{b:1700,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:1700,d:100,o:1,e:{o:32}},{b:1800,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:1800,d:100,o:1,e:{o:32}},{b:1900,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:1900,d:100,o:1,e:{o:32}},{b:2000,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:2000,d:100,o:1,e:{o:32}},{b:2100,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:2100,d:100,o:1,e:{o:32}},{b:2200,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:2200,d:100,o:1,e:{o:32}},{b:2300,d:100,o:-1,e:{o:32}}],
              [{b:-1,d:1,o:-1},{b:100,d:600,o:0.2},{b:700,d:4300,o:0.2}]
            ];

            var jssor_1_options = {
              $AutoPlay: true,
              $LazyLoading: 1,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions,
                $Breaks: [
                  [{d:2000,b:4000}],
                  [{d:5000,b:5000}],
                  [{d:2000,b:21000}],
                  [{d:10000,b:5000}]
                ],
                $Controls: [{r:0},{r:0},{r:0},{r:20},{r:20},{r:20},{r:20},{r:100},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100,e:2400},{r:100}]
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 980);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*responsive code end*/
        });
    </script>
    