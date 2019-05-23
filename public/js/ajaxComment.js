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
                success: function(reponsePHP) {
                    console.log(reponsePHP);


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