const profileSection = document.querySelector('.profileSection');
const logoutBtn = document.querySelector('.logoutBtn');

if (profileSection && logoutBtn) {

    profileSection.addEventListener('click', () => {

        if (logoutBtn.style.display === 'block') {
            logoutBtn.style.display = 'none';
        } else {
            logoutBtn.style.display = 'block';
        }

    });

}

const toggleBtn = document.querySelector('.toggle');
const sidebar = document.querySelector('.sidebar');
const closeBtn = document.querySelector('.closeBtn');
if (toggleBtn && sidebar && closeBtn) {

    toggleBtn.addEventListener('click', () => {    
        sidebar.style.display = 'grid';
        closeBtn.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
        sidebar.style.display = 'none';
        closeBtn.style.display = 'none';
    });
}

// login form

$(document).ready(function () {

    $('#loginForm').submit(function (e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '../db/login_process.php',
            data: formData,
            cache: false,
            dataType:'text',
            success: function (response) {
                let data = $.parseJSON(response);               
                if (data.status == 'success') {

                    window.location.href = '../../all_pages/dashboard.php';

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

// function save_data(){

//     var form_element = document.getElementsByClassName('form_data');

//     var form_data = new FormData();

//     for(var count = 0; count < form_element.length; count++){

//         form_data.append(form_element[count].name, form_element[count].value);
//     }

//     document.getElementById('submit').disabled = true;

//     var ajax_request = new XMLHttpRequest();

//     ajax_request.open('POST', '../db/login_process.php', true);

//     ajax_request.send(form_data);

//     ajax_request.onreadystatechange = function(){

//         if(ajax_request.readyState == 4 && ajax_request.status == 200){

//             document.getElementById('submit').disabled = false;

//             // response from php
//             var response = ajax_request.responseText;

//             if(response == 'success'){

//                 window.location.href = '../all_pages/dashboard.php';

//             }else{

//                 document.getElementById('loginError').innerHTML = response;

//             }
//         }
//     }
// }
