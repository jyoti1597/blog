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

// $(document).ready(function() {
//     $('#loginForm').submit(function(e) {
//         e.preventDefault();
//         var formData = $(this).serialize();
//         $.ajax({
//             type: 'POST',
//             url: '../db/login_process.php',
//             data: formData,
//             success: function(response) {
//                 if (response === 'success') {
//                     window.location.href = '../all_pages/dashboard.php';
//                 } else {
//                     $('#loginError').text('Invalid username or password');
//                 }
//             }
//         });
//     });
// });


function save_date