/*my lovely util functions*/
/*active class*/

function activate() {
  this.name = "active";
  this.init = function (el) {
    el.addClass("active").siblings().removeClass("active");
  }
}
/*get size of element*/
function size() {
  this.width = function (el) {
    return el.width();
  }
  this.height = function (el) {
    return el.height();
  }
}

function bgSizeMatch(el) {
  var activeW = el.width();
  alter.nav.css({
    "background-size": activeW + "px 100px"
  });
}

function bgPos() {
  this.init = function (el) {
    offset = el.position().left;
    corrections = el.parent().offset().left;
    offset = offset - corrections;
    alter.nav.animate({
      "background-position": offset + "px"
    });
  }
}

function adjust() {
  this.init = function (el) {
    var adjustActive = el.index() + 1;
    return adjustActive;
  }
}

function slide() {
  this.init = function (multiplier) {
    var amount = multiplier * $(window).width();
    return amount + "px";
  }
}

/*element vars*/
var alter = {
  nav: $(".slide-tab .navbar-nav"),
  navItem: $(".slide-tab ul:not(.control) li"),
  navItemActive: $(".slide-tab ul:not(.control) li.active"),
  navControl: $(".control"),
}

/*what utils we are using today*/
bgSizeMatch($(".active"));
size = new size();
active = new activate();
bgPos = new bgPos();
adjust = new adjust();
slide = new slide();

slideTab = { //main function
  init: function () {

    alter.navItem.click(function (e) {
      bgSizeMatch($(this));
      active.init($(this));
      bgPos.init($(this));
      
      /*Prototyping scroll reset offset center*/
      var offset = $(this).position().left;
    
      
      var index = $(this).index();
      var clickAmount = slide.init(index);

      $(".content").parent().parent().animate({
        scrollLeft: clickAmount + "px"
      }, 300);
    });

    alter.navItem.each(function () {
      $(".panes").append("<div class='content'><div class='col-md-10 col-md-offset-1 ratio-2:1 inner'><ul class='slot'><li class='icon col-md-1 ratio-1:1'>1</li><li class='icon col-md-1 ratio-1:1'>2</li><li class='icon col-md-1 ratio-1:1'>3</li><li class='icon col-md-1 ratio-1:1'>4</li><li class='icon col-md-1 ratio-1:1'>5</li><li class='icon col-md-1 ratio-1:1'>6</li></ul></div></div>");
    });


    //measure total child width, designed responsively too.
    var acumWidth = 0;
    alter.navItem.each(function () {
      var itemWidth = $(this).width();
      acumWidth += itemWidth;
      //corrcetion
      var controlWidth = alter.navControl.width();
      $(this).parent().css({
        "width": acumWidth + controlWidth + "px"
      });
    });



    $(window).bind('resizeEnd', function () {
      //get the new window size and return it from this special event
    });


    function tab() {
      this.left = function () {
        var prev = $(".active").prev();
        var prevI = $(".active").prev().index();
        var leftAmount = slide.init(prevI);

        active.init(prev);
        bgPos.init(prev);
        bgSizeMatch(prev);

        $(".content").parent().parent().animate({
          scrollLeft: leftAmount + "px"
        }, 300);
      }
      this.right = function () {
        var next = $(".active").next();
        var nextI = $(".active").next().index();
        var rightAmount = slide.init(nextI);

        active.init(next);
        bgPos.init(next);
        bgSizeMatch(next);

        $(".content").parent().parent().animate({
          scrollLeft: rightAmount + "px"
        }, 300);
      }
    }
    tab = new tab();

    $(".half[data='right'] .click").click(function () {
      tab.right();
    });
    $(".half[data='left'] .click").click(function () {
      tab.left();
    });
    $(".half").swipe({
      swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
        if (direction == "left") {
          tab.right();
        } else if (direction == "right") {
          tab.left();
        }
      }
    });
  }
}

$(function () {
  $(slideTab.init);
});