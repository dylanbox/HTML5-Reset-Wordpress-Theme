(function($){

    causeRepaintsOn = $("h1");

    $(window).resize(function() {
      causeRepaintsOn.css("z-index", 1);
    });

})(window.jQuery);