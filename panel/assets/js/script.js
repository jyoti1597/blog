const profileSection = document.querySelector('.profileSection');
const logoutBtn = document.querySelector('.logoutBtn');

profileSection.addEventListener('click', () => {

    if (logoutBtn.style.display === 'block') {
        logoutBtn.style.display = 'none';
    } else {
        logoutBtn.style.display = 'block';
    }

});

const toggleBtn = document.querySelector('.toggle');
const sidebar = document.querySelector('.sidebar');
const closeBtn = document.querySelector('.closeBtn');

toggleBtn.addEventListener('click', () => {    
    sidebar.style.display = 'grid';
    closeBtn.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sidebar.style.display = 'none';
    closeBtn.style.display = 'none';
});