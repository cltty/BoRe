function checkLogin() {
    status = sessionStorage.getItem("loginStatus");
    username = sessionStorage.getItem("username");
    if(status) {
        console.log(username + " is logged in");
    } else {
        console.log("Not logged in");
    }
}

function loadUsername() {
    username = sessionStorage.getItem("username");
    document.getElementById("user").innerHTML = username;
    console.log(username);
}

function loadRSS() {
    console.log("Hello");
    username = sessionStorage.getItem('username');
    userID = sessionStorage.getItem('userID');
    console.log(userID +  " : " + username);
    let container = document.getElementsByClassName("main-container__rightColumn")[0];
    
    const url = 'http://newsapi.org/v2/top-headlines?country=us&apiKey=d42c316f5d894238ba5054556eea19f4';
    fetch(url)
    .then(response => response.json())
    .then(jsonResponse => {
        console.log(jsonResponse);
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


loadRSS();