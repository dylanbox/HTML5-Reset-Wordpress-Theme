(function($){

    $(window).scroll(function(){

        var windowTop = $(window).scrollTop();
        var $el = $('#header');
        var headerHeight = $el.outerHeight();



        if (windowTop > headerHeight) {
            $el.addClass('active');
        }
        else {
            $el.removeClass('active');
        }

        $('#pageContent').css('padding-top', headerHeight);

    });

})(window.jQuery);

jQuery(document).ready(function($)
{
        var $el = $('#header');
        var headerHeight = $el.outerHeight();

        $('#pageContent').css('padding-top', headerHeight);
});