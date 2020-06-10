<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/profile.css">
    <script type="text/javascript" src="profile.js" defer></script>
    <title>Profile</title>
</head>
<body>
    <main class="container">
        <div class="container__title-box">
            <h1 class="container__title-box--title">Book review</h1>
        </div>
        
        <section class="container__info-box">
            <div id="username"></div>   
            <div>
                <button>Change Username</button>
            </div><div>
                <button>Change Email</button>
            </div>
            <div>
                <button>Delete Account</button>
            </div>
            <div>
                <button onclick="logout()">Log Out</button>
            </div>
            <div>
                <button>
                    <a href="../homepage/homepage.php">Go Back</a>
                </button>
            </div>
        </section>
    </main>
</body>
</html>     