function verifyInput(title, author, pages) {
    if(title.trim() === "") {
        return 0;
    }
    if(title.trim() === "") {
        return 0;
    }
    if(title.trim() === "") {
        return 0;
    }
    return 1;
}

function handleAddReviewResponse(responseObject, message, username) {
    if(responseObject.status) {
        console.log("Review added!");
        document.getElementById("title").value = '';
        document.getElementById("author").value = '';
        document.getElementById("pages").value = '';
        document.getElementById("review").value = '';
    } else {
        console.log("NOT OK!");
        console.log(responseObject.messages);
        //document.getElementById("msg").value = '';
        //document.getElementById('error-box').innerHTML += '<span>' + responseObject.messages + '</span>';   
    }
}

function handleAddReviewRequest() {
   
    const form = {
        title: document.getElementById("title"),
        author: document.getElementById("author"),
        // genre: document.getElementById("genre").option[selectedIndex].text,
        genre: document.getElementById("genre"),
        pages: document.getElementById("pages"),
        review: document.getElementById("review"),
        submit: document.getElementById("submitButton")
    };

    form.submit.addEventListener("click", () => {
        console.log("This is the title" + form.title.value)
        usr = sessionStorage.getItem('username');
        let list = document.getElementById("genre");
        let chosenOption = list.options[list.selectedIndex].text;

        form.genre = chosenOption;

        checkResult = verifyInput(form.title.value, form.author.value, form.pages.value);
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
                        handleAddReviewResponse(responseObject);
                    }
                };
                const requestData = `username=${usr}&title=${form.title.value}&author=${form.author.value}&genre=${form.genre}&pages=${form.pages.value}&review=${form.review.value}`;
                console.log("Request data :  " + requestData);
                request.open('POST', '../api/http/add-review.php');
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.send(requestData);
            break;
            case 0:
                console.log("Cannot send an empty review!");
            break;
        }
    });
    
}

handleAddReviewRequest();