<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../../css/homepage.css">
  <script type="text/javascript" src="homepage.js" defer></script>

  <title>BORE</title>
</head>
<body>

  <header class="navbar-container">
    <section class="navbar-container__logo">BookReview</section>
    <section class="navbar-container__primaryBox">
      <a class="navbar-container__primaryBox--button" href="#">Home</a>
      <a class="navbar-container__primaryBox--button" href="../mybooks/mybooks.php">My books</a>
      <a class="navbar-container__primaryBox--button" href="../community/community.php">Community</a>
    </section>

    <div class="navbar-container__secondaryBox">
      <a class="navbar-container__secondaryBox--button" href="../profile/profile.php">
        <img src="https://img.icons8.com/material-outlined/24/000000/user--v1.png"/>
      </a>
      <a class="navbar-container__secondaryBox--button" href="../chat/chat.php">
        <img src="https://img.icons8.com/material-outlined/24/000000/chat.png"/>
      </a>
    </div>

  </header>

  <main class="main-container">
    <section class="main-container__leftColumn">
      <div class="main-container__leftColumn--firstItem">
        <h2>WHAT IS EVERYONE READING</h2>
        <span>
          <a href="../recommendation/recommendation.php">Take a look</a>
        </span>
      </div>

      <div class="main-container__leftColumn--secondItem">
        <h2>2020 READING CHALLENGE</h2>
        <h3>Challenge yourself!</h3>
        <div>
          <div>
            <p>2020 READING CHALLENGE</p>
            <img src="https://img.icons8.com/wired/64/000000/book-shelf.png"/>
          </div>
          <div>

            <p>I want to read<input type="number" id="challenge" placeholder="12" min="1">books in 2020</p>

            <button id="readingChallengeStartButton" onClick="startChallenge()">Start Challenge</button>

          </div>
        </div>
      </div>

      <div class="main-container__leftColumn--thirdItem">
        <h3>WANT TO READ</h3>
        <div>
          <img src="https://img.icons8.com/emoji/48/000000/open-book-emoji.png"/>
          <p>What do you want to read next?</p>
        </div>
        <a href="../recommendation/recommendation.php">Recommendation</a>
      </div>


    </section>

    <section class="main-container__middleColumn">
      <div class="main-container__middleColumn--primaryBox">

          <img src="../imgs/book_img.jpg" alt="">
          <div>
            <h2>Add a review</h2>
            <p>Add a review for a book you have just finished or almost
            finished.
            </p>
            <button><a href="../add-review/add-review.php">Click me</a></button>
          </div>
      </div>

      <div class="main-container__middleColumn--secondaryBox">
        <img src="../imgs/test-book.jpg" alt="Book">

        <div>
            <h2>Exactly What to Say: The Magic Words for Influence and Impact</h2>
            <p>by Phil M. Jones</p>
            <button onClick="wantToRead()">Want to read</button>
            <p>Often the decision between a customer choosing you over someone like you is your ability to know exactly what to say, when to say it, and how to make it count.
            Phil M. Jones…<a href="#">Continue reading</a>
            </p>
        </div>

      </div>

      <div class="main-container__middleColumn--tertiaryBox">
        <img src="../imgs/changed-mind.jpg" alt="Changed my mind">
        <div>
          <h2>Changed your opinion?</h2>
          <p>Update your review right now!Let the others know your opinion.</p>
          <button><a href="../mybooks/mybooks.php">UPDATE OPINION</a></button>
        </div>
      </div>
    </section>

    <section class="main-container__rightColumn">
      <h2>World Wide News</h2>

    </section>

  </main>
</body>
</html>
