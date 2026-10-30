
//the top left thing
const home_btn = document.getElementById('home');
home_btn.addEventListener('click', function() {
    window.location.href = '../index.html';
});

//the top right one
const top_contact_btn = document.getElementById('topContact');
top_contact_btn.addEventListener('click', function() {
    window.location.href = '../comment.html';
});

//the bottom left thng
const about_btn = document.getElementById('about');
about_btn.addEventListener('click', function() {
    window.location.href = '../about.html';
});

//the bottom right one
const foot_contact_btn = document.getElementById('footContact');
foot_contact_btn.addEventListener('click', function() {
    window.location.href = 'php-to-html/remarks.html';
});
