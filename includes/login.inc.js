function verifyLoginInput(username, password, passwordRepeat, email) {
    if(username.trim() === "") {
        return 1;
    }
    if(password.trim() === "") {
        return 2;
    }

    return 0;
}

function handleLoginResponse(responseObject, username) {
    if(responseObject.status) {
        sessionStorage.setItem("loginStatus", true);
        sessionStorage.setItem("username", username);
        sessionStorage.setItem("userID", responseObject.messages.userID);
        location.href = 'includes/homepage/homepage.php';
    } else {
        document.getElementById('username').value = '';
        document.getElementById('password').value = '';

        let ul = document.getElementById('errors'); 
        ul.innerHTML = '';  
        document.getElementsByClassName('container__error-box')[0].style.visibility = 'visible';
        
        responseObject.messages.forEach(message => {
            let li = document.createElement('li');
            li.innerHTML = message;
            ul.append(li);
        });
        setTimeout(function(){ document.getElementsByClassName('container__error-box')[0].style.visibility = 'hidden'; }, 3000);
    }
}
function handleLoginRequest() {
    const form = {
        username: document.getElementById("username"),
        password: document.getElementById("password"),
        submit: document.getElementById("login-submit-button"),
        messages: document.getElementById("login-form-messages")
    };
    
    form.submit.addEventListener("click", () => {
        const request = new XMLHttpRequest();
    
        checkResult = verifyLoginInput(form.username.value, form.password.value);

        switch(checkResult) {
            case 0: 
                request.onload = () => {
                    let responseObject = null;
                    try {
                        responseObject = JSON.parse(request.responseText);
                    } catch(e) {
                        console.error(e);
                    }
                    if(responseObject) {
                        handleLoginResponse(responseObject, form.username.value);
                    }
                };
                const requestData = `username=${form.username.value}&password=${form.password.value}`;
               
                request.open('POST', 'includes/api/http/user-login.php');
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.send(requestData);

            break;
            case 1: 
                alert("Empty username field!");
            break;
            case 2: 
                alert("Empty password field!");
            break;
                  
        }
    });
}

handleLoginRequest();

