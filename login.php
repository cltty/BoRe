<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="includes/login.inc.js" defer></script>
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <section class="container">
        <div class="container__title-box">
            <h1 class="container__title-box--title">Book review</h1>
        </div>
        <div class="container__error-box">
            <ul id="errors"></ul>
        </div>
        <div class="container__form">
            <span class="container__form--input-box">
                <label>Username</label>
                <input type="text" id="username" required>
            </span>
            <span class="container__form--input-box">
                <label>Password</label>
                <input type="password" id="password" required>
            </span>
            <span class="container__form--bttn-box">
                <button type="submit" id="login-submit-button">Log in</button>
            </span>
            <span class="container__form--link-box">
                Not registered?<a href="signin.php">Create an acount</a>
            </span>
        </div>
    </section>
    
</body>
</html>