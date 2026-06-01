
//logout button show or hide
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

// sidebar show and hide in mobile view
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

// Convert textarea into rich text editor
var easyMDE = new EasyMDE({ 
    element: document.getElementById('description') , 
    status: false  // This hides the entire status bar
});
//modal delete button function
function openModal(id){
    document.getElementById('deleteModal'+id).style.display = 'flex';
}

function closeModal(id){
    document.getElementById('deleteModal'+id).style.display = 'none';
}

$(document).ready(function () {
    //common form submit for all form
    $('.common-form-method').submit(function (e) {
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
                    $('.message').text(response.message).css('background', '#b5fbb4').css('color','#05d405').fadeIn();
                    setTimeout(function () {
                        $('.message').fadeOut();
                        location.reload();
                    }, 3000);

                } else {

                    $('.message').text(response.message).css('background', '#fbb4b4').css('color','red').fadeIn();
                    setTimeout(function () {
                        $('.message').fadeOut();
                        location.reload();
                    }, 3000);
                }
            },
            error: function () {

                $('.message').text('Something went wrong').css('background', '#fbb4b4').css('color','red').fadeIn();
                setTimeout(function () {
                    $('.message').fadeOut();
                    location.reload();
                }, 3000);
            }
        });
    });


    //delete form 
    $('.delete-form').submit(function(e){
       e.preventDefault();
       var formData = new FormData(this);
       $.ajax({
            data: formData,
            type: 'POST',
            url: '../db/insert-data.php',
            dataType:'json',
            success: function (response) {
                if (response.status == 'success') {

                     $('.message').text(response.message).css('background', '#b5fbb4').css('color','#05d405').fadeIn();
                    setTimeout(function () {
                        $('.message').fadeOut();
                        location.reload();
                    }, 3000);

                    closeModal(response.id);

                } else {
                    $('.message').text(response.message).css('background', '#fbb4b4').css('color','red').fadeIn();
                    setTimeout(function () {
                        $('.message').fadeOut();
                        location.reload();
                    }, 3000);
                }
            },
        });
    });
    //post approval form 
    $('.approval-form').submit(function(e){
       e.preventDefault();
       var formData = new FormData(this);
       $.ajax({
            data: formData,
            type: 'POST',
            url: '../db/insert-data.php',
            dataType:'json',
            success: function (response) {
                if (response.status == 'success') {
                    $('.message').text(response.message).css('background', '#b5fbb4').css('color','#05d405').fadeIn();
                    setTimeout(function () {
                        $('.message').fadeOut();
                        location.reload();
                    }, 4000);


                } else {
                    $('.message').text(response.message).css('background', '#fbb4b4').css('color','red').fadeIn();
                    setTimeout(function () {
                        $('.message').fadeOut();
                        location.reload();
                    }, 4000);
                }
            },
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

