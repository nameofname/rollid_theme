$(document).ready(function() {
    function resizeHomeText() {
        var newSize = ($('.line-3 span').eq(1).width() / 100) * 150; /* 90% of container */
        $('.line span').css('font-size', newSize);
    }
    $(window).on('resize', resizeHomeText);
});
