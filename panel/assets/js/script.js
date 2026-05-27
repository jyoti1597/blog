

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

$(document).ready(function () {
    $('#common-form-method').submit(function (e) {
         e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            data: formData,
            type: 'POST',
            url: '../db/insert-data.php',
            dataType:'json',
            'cache': false,
            processData:false,
            contentType:false,
            success: function (response) {
                if (response.status == 'success') {

                    setTimeout(function () {
                        location.reload();
                        $('#message').text(response.message);
                    }, 3000);

                } else {

                    $('#message').text(response.message);
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
