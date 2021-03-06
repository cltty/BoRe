<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/chat.css">
    <script type="text/javascript" src="chat.js" defer></script>
    <title>Chat</title>
</head>
<body>
    <nav class="navbar">
        <div class="navbar__title">Chat Room</div>
    </nav>
    <main class="container">
        <div class="container__error-box">
            <ul id="errors"></ul>
        </div>
        <section class="container__side-menu">
            <button class="container__side-menu--button">
                <a href='../homepage/homepage.php'>Homepage</a>
            </button>
            <button class="container__side-menu--button">
                <a href='../profile/profile.php' >Check profile</a>
            </button>
            <button class="container__side-menu--button">
                <a href='../mybooks/mybooks.php' >Check books</a>
            </button>
            <button class="container__side-menu--button">
                <a href='history.php'>History</a>
            </button>
            <button class="container__side-menu--button">
                <a href='../homepage/homepage.php' >Go back</a>
            </button>
            <button class="container__side-menu--button">
                <a href='../../index.php' >Log out</a>
            </button>
        </section>
        <section class="container__chat">
            <div class="container__chat--messages">
                <ul class="messages-container">

                </ul>
            </div>
            <div class="container__chat--send">
                <textarea name="msg" id="msg" cols="30" rows="10"></textarea>
                <button id="send">Send</button>        
            </div>
        </section>
    </main>
</body>
</html>