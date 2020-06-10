function loadBooks() {
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
            if(responseObject.length == 0) {
                alert('You have no books under review.Add some!');
                location.href = '../homepage/homepage.php';
            }

            let tbody = document.getElementsByClassName("container__table--body")[0];

            responseObject.forEach(function(entry) {
                
                let tr = document.createElement('tr');
                
                let td1 = document.createElement('td');
                td1.innerHTML = entry['book_name'];
                tr.append(td1);

                let td2 = document.createElement('td');
                td2.innerHTML = entry['author'];
                tr.append(td2);

                let td3 = document.createElement('td');
                td3.innerHTML = entry['genre'];
                tr.append(td3);
 
                let td4 = document.createElement('td');
                td4.innerHTML = entry['read_pages'];
                tr.append(td4);

                let td5 = document.createElement('td');
                td5.innerHTML = entry['review'];
                tr.append(td5);

                let td6 = document.createElement('td');
                let button = document.createElement('button');
                button.innerHTML = 'Edit';
                button.setAttribute('id', entry['id']);
                button.setAttribute('onClick', 'editReview(id)');
                td6.append(button);
                tr.append(td6);
                

                tbody.append(tr);

            });
        
        }
    }  
    request.open('GET', '../api/http/get-books.php?userID=' + usrID);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send();
}


function editReview(id) {
    console.log("I will edit the review with diz id : " + id);
    location.href = 'edit-review.php?id=' + id;
}

loadBooks();