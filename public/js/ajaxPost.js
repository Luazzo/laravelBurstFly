/*
*
* ./public/js/ajaxComment.js
* */

    $(function () {
        $(".white > a").click(function (e) {
            e.preventDefault();
            let slug = $('img',this).attr('alt');
            //alert($('img',this).attr('alt'));
            $.ajax({
                url:'ajax/post/slug',
                data:{
                    slug: $('img',this).attr('alt')
                },
                method: 'get',
                success: function(post) {
                    console.log(post);

                   /* $('.post-reply').removeClass('post-reply').addClass('post-reply-2');

                    $html = "<div class=\"post-reply\">\n" +
                            "    <div class=\"image-reply-post\"></div>\n" +
                            "    <div class=\"name-reply-post\">"+user['name']+"</div>\n" +
                            "    <div class=\"text-reply-post\">"+$('#body').val()+"</div>\n" +
                            "</div>";

                    $('.white').after($html);*/

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