function loadMessages() {
    const request = new XMLHttpRequest();
    request.onload = () => {
        let responseObject = null;
        try {
            responseObject = JSON.parse(request.responseText);
        } catch(e) {
            console.error(e);
        }
        if(responseObject) {
            let ul = document.getElementsByClassName('messages-container')[0]; 
            responseObject.forEach(function(entry) {
                let div = document.createElement('div');
                let span = document.createElement('span');
                let small = document.createElement('small');
                let li = document.createElement('li');
                let small2 = document.createElement('small');
                
                small.setAttribute('id', 'username');
                small.innerHTML = entry.username + '   ';
                li.innerHTML = entry.message;
                span.append(small);
                span.append(li);
                small2.setAttribute('id', 'time');
                small2.innerHTML = entry.created_at;

                div.append(span);
                div.append(small2);
                ul.append(div);
            });
        
        }
    };
            
    request.open('GET', '../api/http/get-messages.php?');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send();
}

function verifyMessage(message) {
    if(message.trim() === "") {
        return 0;
    }

    return 1;
}

function handleSendMessageResponse(responseObject, message, username) {
    if(responseObject.status) {
        console.log("OK!");
        let ul = document.getElementsByClassName('messages-container')[0];
        
        let div = document.createElement('div');

        let span = document.createElement('span');

        let small = document.createElement('small');
        small.setAttribute('id', 'username');
        small.innerHTML = username + '   ';
        let li = document.createElement('li');
        li.innerHTML = message;
        
        span.append(small);
        span.append(li);
        
        let small2 = document.createElement('small');
        small2.setAttribute('id', 'time');

        let currentDate = new Date();
        let dateTime = currentDate.getFullYear() + '-'
                       + currentDate.getDate() + '-'
                       + (currentDate.getMonth() + 1) + '-'
                       + currentDate.getHours() + ':'
                       + currentDate.getMinutes() + ':'
                       + currentDate.getSeconds();

        small2.innerHTML = dateTime;

        div.append(span);
        div.append(small2);

        ul.append(div);
        document.getElementById("msg").value = '';
    } else {
        console.log("NOT OK!");
        document.getElementById("msg").value = '';
        //document.getElementById('error-box').innerHTML += '<span>' + responseObject.messages + '</span>';   
    }
}

function handleSendMessageRequest() {
    const form = {
        message: document.getElementById("msg"),
        submit: document.getElementById("send")
    };

    form.submit.addEventListener("click", () => {
        usr = sessionStorage.getItem('username');

        checkResult = verifyMessage(form.message.value);
        switch(checkResult) {
            case 1:
                const request = new XMLHttpRequest();
                request.onload = () => {
                    let responseObject = null;
                    try {
                        responseObject = JSON.parse(request.responseText);
                    } catch(e) {
                        console.error(e);
                    }
                    if(responseObject) {
                        handleSendMessageResponse(responseObject, form.message.value, usr);
                    }
                };
                const requestData = `userID=${2}&username=${usr}&message=${form.message.value}`;
            
                request.open('POST', '../api/http/send-message.php');
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.send(requestData);
            break;
            case 0:
                console.log("Cannot send an empty message!");
            break;
        }
    });
    
}

loadMessages();
handleSendMessageRequest();