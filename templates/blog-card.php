<?php 

    $title = 'Blog';
    include ('header.php');
    
    connect_db();
    check_db();

    $sql = "SELECT * FROM pot_posts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
    <main class="mdl-layout__content mdl-color--white-100" style="width:100%">
    <div class="container">

<?php 
    while($row = $result->fetch_assoc()) {
        $post_id = $row["id"];
        $post_title = $row["post_title"];
        $image = $row["post_image"];
        $content = $row["post_content"];
        $excerpt = substr($content, 0,200);
        $tag = $row["post_tag"];
        $cat = $row["post_cat"];
        $author = $row["post_author"];
        $dates = $row["post_date"];
list($date, $time) = split('[/. ]', $dates);
    ?>
    <style type="text/css">
        *, *:before, *:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

html, body{
  height: 100%;
  min-height: 100%;
  margin: 0;
  padding: 0;
}
body {
  background-color: #fcfcfc;
  font-family: 'Montserrat', sans-serif;
  text-align: center;
}
.pricing-table {
  text-align: center;
}

/* Each pricing-item*/
.pricing-item {
  border-radius: 3px;
  display: inline-block;
  width: 260px;
  height: auto;
  background: #fff;
  margin: 20px;
  vertical-align: top;
  position: relative;
  overflow: hidden;
  box-shadow: 0 1.5px 4px rgba(0, 0, 0, 0.24), 0 1.5px 6px rgba(0, 0, 0, 0.12);
  -webkit-transition: all .2s cubic-bezier(.3, .6, .2, 1.8);
  transition: all .2s cubic-bezier(.3, .6, .2, 1.8);
  &:hover {
      -webkit-transform: scale(1.04);
      -ms-transform: scale(1.04);
      transform: scale(1.04);
      box-shadow: 0 3px 12px rgba(0, 0, 0, 0.23), 0 3px 12px rgba(0, 0, 0, 0.16);
  }
  .pricing-title{
    width: 100%;
    color: white;
    display: block;
    position: relative;
    background: #0074D9;
    padding: 7px;
    font-weight: bold;
    font-size: 20px;
    //background: #FF4136;
    //background: #2ECC40;
  }
  &.pricing-featured .pricing-title{
    background: #FF4136;
  }
}


/* pricing-value */
.pricing-value {
  width: 180px;
  height: 180px;
  padding-top: 46px;
  border-radius: 50%;
  color: #fff;
  font-size: 46px;
  font-weight: 300;
  margin: 10px auto;
}
.pricing-value .smallText {
  font-size: 14px;
}
.pricing-value .undertext {
  display: block;
  font-size: 16px;
}
.pricing-item .pricing-value {
  background: #0074D9;
  border: 2px solid #0074D9;
}
.pricing-item.pricing-featured .pricing-value{
  background: #FF4136;
  border: 2px solid #FF4136;
}

/* List */
.pricing-item .pricing-features {
  margin: 10px 0;
  padding: 0;
  list-style: none;
  & li {
    display: block;
    width: 90%;
    height: 40px;
    line-height: 40px;
    font-size: 15px;
    font-weight: 400;
    border-bottom: 1px solid rgba( 0, 0, 0, 0.2);
    margin: 0 auto;
    .keywords {
      font-weight: bold;
    }
  }
}

.button {
  width: 140px;
  height: 38px;
  font-weight: 300;
  font-size: 16px;
  line-height: 32px;
  margin: 0 auto;
  background: #fff;
  color: #0074D9;
  border: 2px solid #0074D9;
  cursor: pointer;
  margin-bottom: 10px;
  //vertical-align: middle;
  -webkit-transition: .2s ease-out;
  -moz-transition: .2s ease-out;
  -o-transition: .2s ease-out;
  -ms-transition: .2s ease-out;
  transition: .2s ease-out;
  /*-webkit-box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2), 0 2px 3px rgba(0, 0, 0, 0.05);
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2), 0 2px 3px rgba(0, 0, 0, 0.05);*/
  &:hover{
    background: #0074D9;
    color: #fff;
    border: none;
    -webkit-box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
    box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
  }
}
.pricing-item.pricing-featured .button{
  color: #FF4136;
  border: 2px solid #FF4136;
  &:hover{
    background: #FF4136;
    color: #fff;
  }
}
.selected {
  z-index: 10;
  width: 180px;
  height: 32px;
  padding: 0 20px;
  font-size: 12px;
  line-height: 25px;
  text-align: center;
  color: #fff;
  font-weight: bold;
  box-shadow: 0px 2px 5px #888888;
  background: gold;
  border-top: 5px solid gold;
  border-bottom: 5px solid gold;
  //background: #palegoldenrod;
  transform: rotate(35deg);
  position: absolute;
  right: -47px;
  top: 17px;
}
    </style>

    <div class="pot-row-padding pot-theme">
    <h1>Material Design Responsive Pricing Tables</h1>
<div class="pricing-table">
  
  <div class="pricing-item">
    <div class="pricing-title">
      BÁSICO
    </div>
    <div class="pricing-value">R$19.<span class="smallText">90</span>
      <span class="undertext">/Mês</span>
    </div>
    <ul class="pricing-features">
      <li><span class="keywords">1GB</span> Armazenamento</li>
      <li>Banda <span class="keywords">ilimitada</span></li>
      <li><span class="keywords">10 Contas</span> de email</li>
      <li><span class="keywords">50gb</span> Transferência</li>
    </ul>
    <div class="button">Comprar</div>
  </div>
  
  <div class="pricing-item pricing-featured">
    <div class='selected'>Recomendado</div>
    <div class="pricing-title">
      PRO
    </div>
    <div class="pricing-value">R$39.<span class="smallText">90</span>
      <span class="undertext">/Mês</span>
    </div>
    <ul class="pricing-features">
      <li><span class="keywords">5GB</span> Armazenamento</li>
      <li>Banda <span class="keywords">ilimitada</span></li>
      <li><span class="keywords">100 Contas</span> de email</li>
      <li><span class="keywords">100gb</span> Transferência</li>
    </ul>
    <div class="button">Comprar</div>
  </div>
  
</div>
    </div>
    </div>

<form action="">
<fieldset class="rating">
    <legend>Please rate:</legend>
    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
</fieldset>

</form>
<style type="text/css">
  /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
   follow these rules. Every browser that supports :checked also supports :not(), so
   it doesn’t make the test unnecessarily selective */
.rating:not(:checked) > input {
    position:absolute;
    top:-9999px;
    clip:rect(0,0,0,0);
}

.rating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:200%;
    line-height:1.2;
    color:#ddd;
    text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:before {
    content: '? ';
}

.rating > input:checked ~ label {
    color: #f70;
    text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
    color: gold;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
    color: #ea0;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > label:active {
    position:relative;
    top:2px;
    left:2px;
} </style>




<?php
    } 
    } else {post_error_db();} 
mysqli_close($conn); ?>

<div class="container">
<div class="col-xs-8 col-sm-6 col-md-6">
<h2>Featured Products</h2>
<div id="myCarousel" class="vertical-slider carousel vertical slide col-md-12" data-ride="carousel">
<div class="row">
    <div class="col-md-4">
        <span data-slide="next" class="btn-vertical-slider glyphicon glyphicon-circle-arrow-up "
            style="font-size: 30px;color: red"></span>  
    </div>
    <div class="col-md-8"> 
    </div>
</div>
<br />
<!-- Carousel items -->
<div class="carousel-inner">
    <div class="item active">
        <div class="row">
            <div class="col-xs-6 col-sm-5 col-md-5">
                <img src="media/uploads/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>" width="100%" class="thumbnail;" />
                    <?php echo $product_title; ?>
            </div>
           
        </div>
        <!--/row-fluid-->
    </div>
    <!--/item-->
</div>
<div class="row">
    <div class="col-md-4">
        <span data-slide="prev" class="btn-vertical-slider glyphicon glyphicon-circle-arrow-down"
            style="color: #008080; font-size: 30px"></span>
    </div>
    <div class="col-md-8">
    </div>
</div>
</div>
</div>
</div>
</main>