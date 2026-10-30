//For the headers anf the bottom one
//the top left thing
    const home_btn = document.getElementById('home');
        if (home_btn) {
            home_btn.addEventListener('click', function() {
                window.location.href = './index.html';
            });
        }

//the top right one
    const top_contact_btn = document.getElementById('topContact');
        if (top_contact_btn) {
            top_contact_btn.addEventListener('click', function() {
                window.location.href = 'comment.html';
            });
        }

//the bottom left thng
    const about_btn = document.getElementById('about'); 
        if (about_btn) {
            about_btn.addEventListener('click', function() {
                window.location.href = 'about.html';
            });
        }

//the bottom right one
    const foot_contact_btn = document.getElementById('footContact');
        if (foot_contact_btn) {
            foot_contact_btn.addEventListener('click', function() {
                window.location.href = 'php-to-html/remarks.html';
            });
        }

//cookie buttons 

//the og
    const og_btn = document.getElementById('og_btn');
        if (og_btn) {
            og_btn.addEventListener('click', function() {
                window.location.href = 'cookies/og.html';
            });
        }

//the crunh/graham
    const crunch_btn = document.getElementById('crunch_btn');
        if (crunch_btn) {
            crunch_btn.addEventListener('click', function() {
                window.location.href = 'cookies/graham.html';
            });
        }

//the sweet/smore
    const sweet_btn = document.getElementById('sweet_btn');
        if (sweet_btn) {
            sweet_btn.addEventListener('click', function() {
                window.location.href = 'cookies/smores.html';
            });
        }

//matcha/shrek
    const shrek_btn = document.getElementById('shrek_btn');
        if (shrek_btn) {
            shrek_btn.addEventListener('click', function() {
                window.location.href = 'cookies/matcha.html';
            });
        }

//contacts
    const browse_btn = document.getElementById('browse_btn');
        if (browse_btn) {
            browse_btn.addEventListener('click', function() {
                window.location.href = 'index.html';
            });
        }

/* hotbox */
    const hitbox_btn = document.getElementById('hitbox_btn');
        if (hitbox_btn) {
            hitbox_btn.addEventListener('click', function() {
                window.location.href = 'php/admin_login.php';
            });
        }

/* comment homebutton/ spoiled kid */
      const anotherHome_btn = document.getElementById('anotherHome');
        if (anotherHome_btn) {
            anotherHome_btn.addEventListener('click', function() {
                window.location.href = '../index.html';
            });
        }

