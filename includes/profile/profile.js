function setProfileUsername() {
    username = sessionStorage.getItem('username');
    document.getElementById("username").innerHTML = username;

}

function logout() {
    sessionStorage.removeItem('loginStatus');
    sessionStorage.removeItem('username');
    location.href = '../../index.php';
}


setProfileUsername();
