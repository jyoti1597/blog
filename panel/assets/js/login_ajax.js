//login


$(document).ready(function () {
    $('#loginForm').submit(function (e) {

        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            data: formData,
            type: 'POST',
            url: '../db/login_process.php',
            dataType:'json',
            'cache': false,
            success: function (response) {

                //var data = JSON.parse(response); 
                //  console.log(data.status);

                //var data = $.parseJSON(response); 
                if (response.status == 'success') {

                    window.location.href = '../all_pages/dashboard.php';

                } else {

                    $('#loginError').text(response.message);
                }
            },

            error: function () {

                $('#loginError').text('Something went wrong');
            }
        });

    });
});
