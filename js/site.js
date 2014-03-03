$(document).ready(function() {

    /**
     * Resize the text on the home page
     */
    function resizeHomeText() {
        var newSize = ($('.line-3 span').eq(1).width() / 100) * 150; /* 90% of container */
        $('.line span').css('font-size', newSize);
    }

    // IF we are on the home page, set up event listener to resize home page text on resize:
    if ($('#home').length) {
        $(window).on('resize', resizeHomeText);
    }

    // IF a div of class .last-tweet is present, then fetch the last tweet and populate the div:
    if ($('.last-tweet').length) {
        $.getJSON('/wp-content/themes/rollid_theme/api/last_tweet.php', function (data) {})
            .done(function (data) {
                $('.last-tweet .tweet').text(data['text']);
            })
            .fail(function (data) {
                $('.last-tweet').hide();
            });
    }

});
