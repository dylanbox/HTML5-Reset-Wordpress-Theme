jQuery(document).ready(function($)
{
$(".tfdate").datepicker({
    dateFormat: 'D, M d, yy',
    showOn: 'button',
    buttonImage: '/wp-content/themes/osborn-voice/images/icon-datepicker.png',
    buttonImageOnly: true,
    numberOfMonths: 3

    });
});