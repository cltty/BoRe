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
            
    request.open('GET', '../api/http/get-messages.php?history=true');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send();
}

loadMessages();