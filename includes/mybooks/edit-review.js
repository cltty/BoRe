var bookID = null;

function getBookID() {
    let urlString = window.location.href;
    let url = new URL(urlString);
    bookID = url.searchParams.get("id");
}

function loadBookReview() {
    let usrID = sessionStorage.getItem('userID');

    const request = new XMLHttpRequest();
    
    request.onload = () => {
        let responseObject = null;
        try {
            responseObject = JSON.parse(request.responseText);
        } catch(e) {
            console.error(e);
        }

        if(responseObject) {
            document.getElementById('title').value = responseObject[0]['book_name'];
            document.getElementById('author').value = responseObject[0]['author'];
            document.getElementById('pages').value = responseObject[0]['read_pages'];
            document.getElementById('genre').value = responseObject[0]['genre'];
            document.getElementById('review').value = responseObject[0]['review'];
        }
        
    }  
    request.open('GET', '../api/http/get-books.php?id=' + bookID);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send();
}

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

function handleUpdateReviewResponse(responseObject, message, username) {
    if(responseObject.status) {
        alert("You updated your review!");
        location.href = './mybooks.php'
        
    } else {
        console.log("NOT OK!");
        console.log(responseObject.messages);
        //document.getElementById("msg").value = '';
        //document.getElementById('error-box').innerHTML += '<span>' + responseObject.messages + '</span>';   
    }
}

function handleUpdateReviewRequest() {
   
    const form = {
        title: document.getElementById("title"),
        author: document.getElementById("author"),
        genre: document.getElementById("genre"),
        pages: document.getElementById("pages"),
        review: document.getElementById("review"),
        submit: document.getElementById("submitButton")
    };

    form.submit.addEventListener("click", () => {
        usr = sessionStorage.getItem('username');
        usrID = sessionStorage.getItem('userID');
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
                        handleUpdateReviewResponse(responseObject);
                    }
                };
                const requestData = `bookID=${bookID}&userID=${usrID}&username=${usr}&title=${form.title.value}&author=${form.author.value}&genre=${form.genre}&pages=${form.pages.value}&review=${form.review.value}`;
               
                request.open('POST', '../api/http/update-review.php');
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.send(requestData);
            break;
            case 0:
                alert("Cannot set an empty review!");
            break;
        }
    });
    
}

getBookID();
loadBookReview();
handleUpdateReviewRequest();
