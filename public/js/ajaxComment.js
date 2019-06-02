/*
*
* ./public/js/ajaxComment.js
* */

    $(function () {
        $("#contact").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url:'ajax/comment',
                data:{
                    body: $('#body').val(),
                    post: $('#post').val(),
                    user: $('#user').val()
                },
                method: 'get',
                success: function(user) {
                    //console.log(user);

                    $('.post-reply').removeClass('post-reply').addClass('post-reply-2');
                    var base = window.location.origin;

                    $html = "<div class=\"post-reply\">\n" +
                            "    <div class=\"image-reply-post\" style=\"background: url("+base+"/storage/"+user['avatar']+") no-repeat; background-size: 100%; \"></div>\n" +
                            "    <div class=\"name-reply-post\">"+user['name']+"</div>\n" +
                            "    <div class=\"text-reply-post\">"+$('#body').val()+"</div>\n" +
                            "</div>";

                    $('.white').after($html);
                    $('#body').val("");

                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    $('#err').html(msg);
                },
            })
        });
    });