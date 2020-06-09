<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signin.css">
    <script type="text/javascript" src="includes/signin.inc.js" defer></script>
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

            <span class="container__form--input-box">
                <label>Repeat password</label>
                <input type="password" id="passwordRepeat" required>
            </span>
            
            <span class="container__form--input-box">
                <label>Email</label>
                <input type="email" id="email" required>
            </span>

            <span class="container__form--bttns-box">
                <button type="submit" id="signin-submit-button">Sign in</button>
                <button type="reset">Reset</button>
            </span>
        </div> 
    </section>
</body>
</html>
