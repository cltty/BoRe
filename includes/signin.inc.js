function verifyInput(username, password, passwordRepeat, email) {
    if(username.trim() === "") {
        return 1;
    }
    if(password.trim() === "") {
        return 2;
    }
    if(passwordRepeat.trim() === "") {
        return 3;
    }
    if(email.trim() === "") {
        return 4;
    }
    if(password != passwordRepeat) {
        return 5;
    }

    return 0;
}

function handleSigninResponse(responseObject) {
    if(responseObject.status) {
        alert("Sign in successful!You will be redirected to Login page.")
        location.href = './login.php';
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

function handleSigninRequest() {
    const form = {
        username: document.getElementById("username"),
        password: document.getElementById("password"),
        passwordRepeat: document.getElementById("passwordRepeat"),
        email: document.getElementById("email"),
        submit: document.getElementById("signin-submit-button"),
        messages: document.getElementById("signin-form-messages")
    };
    
    form.submit.addEventListener("click", () => {
        checkResult = verifyInput(form.username.value, form.password.value, form.passwordRepeat.value, form.email.value);
        
        switch(checkResult) {
            case 0:
                const request = new XMLHttpRequest();
                request.onload = () => {
                    let responseObject = null;
                    try {
                        responseObject = JSON.parse(request.responseText);
                    } catch(e) {
                        console.error(e);
                        alert("Something went wrong.Try again later.");
                    } 
                    if(responseObject) {
                        handleSigninResponse(responseObject);
                    }
                };    
                const requestData = `username=${form.username.value}&password=${form.password.value}&passwordRepeat=${form.passwordRepeat}&email=${form.email.value}`
                request.open('POST', 'includes/api/http/user-signin.php');
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.send(requestData);
            break;
            case 1: 
                alert("Empty username field!");
            break;
            case 2: 
                alert("Empty password field!");
            break;
            case 3: 
                alert("Empty password repeat!");
            break;
            case 4: 
                alert("Empty email field!");
            break;
            case 5:
                alert("Passwords do not match!");
            break;
            case 6:
                alert("Forbiden characters used!");
            break;        
        }
    })
}

handleSigninRequest();