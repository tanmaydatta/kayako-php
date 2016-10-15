'use strict';
// var URL = "http://localhost:8000/tweet";
var URL = "http://slim-tanmay.herokuapp.com/tweet";
var max_id;
var insertCard = function(username, text, rt) {
    return ' <div class="row card"> \
                <div class="top-heading"> \
                    <h2 class="ui header">@' + username + '</h2> \
                </div> \
                <div  class="content">\
                    <div class="row">\
                        <h4 class="ui header">' + text + '\
                        </h4>\
                    </div>\
                    <div class="row rt">\
                        <h3 class="ui header">\
                            RT: ' + rt + '\
                        </h3>\
                    </div>\
                </div>\
            </div>';
}
$("#submit_button").click(function(e) {
    e.preventDefault();
    $("#results").html('');
    max_id = 999999999999999999;
    $.get( URL + "?q=" + $("#q").val() + "&max_id=" + max_id, function( data ) {
        data.tweets.forEach( function (tweet) {
            $("#results").append(insertCard(tweet.user.screen_name, tweet.text, tweet.retweet_count));
            max_id = Math.min(max_id, tweet.id);
        });
        max_id = max_id - 1;
    });
});
$("#load").click(function() {
    if(max_id==1) return;
    $("#load").addClass("loading");
    $.get( URL + "?q=" + $("#q").val() + "&max_id=" + max_id, function( data ) {
        $("#load").removeClass("loading");
        data.tweets.forEach( function (tweet) {
            $("#results").append(insertCard(tweet.user.screen_name, tweet.text, tweet.retweet_count));
            max_id = Math.min(max_id, tweet.id);
        });
        max_id = max_id - 1;
    });
});