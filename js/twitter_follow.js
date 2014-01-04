/**
 * Basic twitter follow button script added from their API:
 * https://dev.twitter.com/docs/follow-button
 */
!function(d,s,id){

    var js,scripts=d.getElementsByTagName(s),fjs=scripts[scripts.length-1];

    if(!d.getElementById(id)){js=d.createElement(s);js.id=id;
        js.src="//platform.twitter.com/widgets.js";

        // Modified by RW - insert the twitter script all the way at the end, not in the head:
        fjs.parentNode.insertBefore(js,fjs.nextSibling);
    }

    // Show the button after the script is loaded:
    js.onreadystatechange = js.onload = function () {
        setTimeout(function(){
            $('.twitter-follow-button').css({opacity : '1'});
        }, 1000);
    }

}(document,"script","twitter-wjs");