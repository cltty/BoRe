<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/add-review.css">
    <script type="text/javascript" src="edit-review.js" defer></script>
    <title>Edit review</title>
</head>
<body>
    <section class="container">
        <div class="container__title-box">
            <h1 class="container__title-box--title">Edit</h1>
        </div>
        <div class="container__form">
            <span class="container__form--input-box">
                <label>Book Title</label>
                <input type="text" id="title" required>
            </span>
            <span class="container__form--input-box">
                <label>Author</label>
                <input type="text" id="author" required>
            </span>
            <span class="container__form--input-box">
                <label>Genre</label>
                <select id="genre">
                    <option value="Drama">Drama</option>
                    <option value="Romance">Romance</option>
                    <option value="SF">SF</option>
                    <option value="Novel" selected>Novel</option>
                </select>
            </span>
            <span class="container__form--input-box">
                <label>Pages read</label>
                <input type="text" id="pages" required>
            </span>
            <span class="container__form--input-box">
                <label>Review</label>
                <textarea name="" id="review" cols="30" rows="10"></textarea>
            </span>
            <span class="container__form--bttn-box">
                <button type="submit" id="submitButton">Submit</button>
            </span>
            
        </div>
    </section>
</body>
</html>