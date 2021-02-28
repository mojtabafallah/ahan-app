(function ($) {
  $.fn.stack_slider = function (options) {
    function detect_active() {
      var get_active = $("#dp-slider .dp_item:first-child").data("class");
      $("#dp-dots li").removeClass("active");
      $("#dp-dots li[data-class=" + get_active + "]").addClass("active");
    }
    $("#dp-next").click(function () {
      var total = $(".dp_item").length;
      $("#dp-slider .dp_item:first-child")
        .hide()
        .appendTo("#dp-slider")
        .fadeIn();
      $.each($(".dp_item"), function (index, dp_item) {
        $(dp_item).attr("data-position", index + 1);
      });
      detect_active();
    });
    $("#dp-prev").click(function () {
      var total = $(".dp_item").length;
      $("#dp-slider .dp_item:last-child")
        .hide()
        .prependTo("#dp-slider")
        .fadeIn();
      $.each($(".dp_item"), function (index, dp_item) {
        $(dp_item).attr("data-position", index + 1);
      });
      detect_active();
    });
    $("#dp-dots li").click(function () {
      $("#dp-dots li").removeClass("active");
      $(this).addClass("active");
      var get_slide = $(this).attr("data-class");
      console.log(get_slide);
      $("#dp-slider .dp_item[data-class=" + get_slide + "]")
        .hide()
        .prependTo("#dp-slider")
        .fadeIn();
      $.each($(".dp_item"), function (index, dp_item) {
        $(dp_item).attr("data-position", index + 1);
      });
    });
    $("body").on("click", "#dp-slider .dp_item:not(:first-child)", function () {
      var get_slide = $(this).attr("data-class");
      console.log(get_slide);
      $("#dp-slider .dp_item[data-class=" + get_slide + "]")
        .hide()
        .prependTo("#dp-slider")
        .fadeIn();
      $.each($(".dp_item"), function (index, dp_item) {
        $(dp_item).attr("data-position", index + 1);
      });
      detect_active();
    });
    $.fn.swipe = function (callback) {
      var touchDown = false,
        originalPosition = null,
        $el = jQuery(this);

      function swipeInfo(event) {
        var x = event.originalEvent.pageX,
          y = event.originalEvent.pageY,
          dx;
        dx = x > originalPosition.x ? "right" : "left";
        return { direction: { x: dx }, offset: { x: x - originalPosition.x } };
      }
      $el.on("touchstart mousedown", function (event) {
        touchDown = true;
        originalPosition = {
          x: event.originalEvent.pageX,
          y: event.originalEvent.pageY,
        };
      });
      $el.on("touchend mouseup", function () {
        touchDown = false;
        originalPosition = null;
        flag = true;
      });
      $el.on("touchmove mousemove", function (event) {
        if (!touchDown) {
          return;
        }
        var info = swipeInfo(event);
        callback(info.direction, info.offset);
      });
      return true;
    };
    $("#slider img").on("dragstart", function (event) {
      event.preventDefault();
    });
    var settings = $.extend(
      {
        color: "transparent",
        background: "transparent",
        autoPlay: true,
        autoPlaySpeed: 3000,
        dots: true,
        arrows: true,
        drag: true,
        direction: "horizontal",
      },
      options
    );
    if (settings.dots !== true) {
      $("#dp-dots").hide();
    }
    if (settings.drag == true) {
      var flag = true;
      jQuery(".dp_item").swipe(function (direction, offset) {
        if (offset.x > 30 && flag) {
          flag = false;
          $("#dp-next").click();
        }
        if (offset.x < -30 && flag) {
          flag = false;
          $("#dp-prev").click();
        }
      });
    }
    if (settings.arrows !== true) {
      $("#dp-next, #dp-prev").hide();
    }
    if (settings.autoPlay == true) {
      setInterval(function () {
        $("#dp-next").click();
      }, settings.autoPlaySpeed);
    }
    if (settings.direction == "vertical") {
      $(".dp-wrap").addClass("vertical");
    }
    return this.css({ color: settings.color, background: settings.background });
  };
})(jQuery);
