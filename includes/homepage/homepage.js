function loadRSS() {
    username = sessionStorage.getItem('username');
    userID = sessionStorage.getItem('userID');
    let container = document.getElementsByClassName("main-container__rightColumn")[0];
    
    const url = 'http://newsapi.org/v2/top-headlines?country=us&apiKey=d42c316f5d894238ba5054556eea19f4';
    fetch(url)
    .then(response => response.json())
    .then(jsonResponse => {
        for(i = 0; i < 11; i++) {
            let div = document.createElement("div");
            let a = document.createElement("a");
            let img = document.createElement("img");
            
            a.setAttribute("href", jsonResponse['articles'][i]['url']);
            a.setAttribute("class", "main-container__rightColumn--article");
            img.setAttribute("src", jsonResponse['articles'][i].urlToImage);
            
            div.append(img);
            div.append(a);
            container.append(div);

            document.getElementsByClassName("main-container__rightColumn--article")[i].innerHTML = jsonResponse['articles'][i].title;
        }
    })
    .catch(err => {
      console.error('Fetch error:', err);
    });
}

function wantToRead() {
    alert("The others will know that you want to read this books!");
    let usr = sessionStorage.getItem('username');
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
            //do nothing.
        }
    };
    let content = " wants to read 'Exactly What To Say' By Phill Jones";
    const requestData = `userID=${usrID}&username=${usr}&content=${content}`;           
    request.open('POST', '../api/http/add-news.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(requestData);
}

function startChallenge() {
    alert("The others will about your goal!");
    let usr = sessionStorage.getItem('username');
    let usrID = sessionStorage.getItem('userID');
    let count = document.getElementById("challenge").value;

    const request = new XMLHttpRequest();
   
    request.onload = () => {
        let responseObject = null;
        try {
            responseObject = JSON.parse(request.responseText);
        } catch(e) {
            console.error(e);
        }
        
        if(responseObject) {
            //do nothing.
        }
    };
    let content = " wants to read " + count + " books this year";
    const requestData = `userID=${usrID}&username=${usr}&content=${content}`;           
    request.open('POST', '../api/http/add-news.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(requestData);
}



loadRSS();