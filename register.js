
function login_activate() {
    document.getElementById('signupForm').style.display = 'none';
    document.getElementById('loginForm').style.display = 'block';    
}

function signup_activate() {
    document.getElementById('signupForm').style.display = 'block';
    document.getElementById('loginForm').style.display = 'none'; 
}


// $(document).ready(function() {
//     $("#signupForm").hide();
//     $("#loginForm").show();
// });