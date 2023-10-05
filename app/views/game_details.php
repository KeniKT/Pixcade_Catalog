<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixcade</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <header>
        <img class="logo" src="../../public/assets/images/logos/Group 3.png">
        <div class="bar"></div>
        <form class="search-bar" action="../controllers/game_controller.php" method="POST">
            <div id="search-bar-section">
                <input id="search-bar-input" type="search" placeholder="Search">
                <input name="go-button" class="button" id="search-button" type="submit" value="Go">
            </div>
            <div id="filter-section">
                <select class="filter-select" name="genre" id="">
                    <option value="-">None</option>
                    <option value="-">Action</option>
                    <option value="-">Adventure</option>
                    <option value="-">Real-Time Strategy</option>
                </select>

                <select class="filter-select" name="platform" id="">
                    <option value="-">None</option>
                    <option value="-">Windows</option>
                    <option value="-">OSX</option>
                    <option value="-">Linux</option>
                </select>
            </div>
        </form>
        <div class="bar"></div>
        <div id="profile-header-section">
            <img id="profile-image" src="../../public/assets/images/logos/Rectangle 25.png">
            <div id="profile-link">
                <a href="">Welcome, User</a>
                <a id="logout-link" href="">Logout</a>
            </div>
        </div>
    </header>
    <div class = "main-body">
        <div id="full-details-section">
            <div id="main-details-section">
                <img id="banner-image" src="../../public/assets/images/banners/image 8.png" alt="">
                <div id="title-platform">
                    <p id="large-game-title">Heat Signature</p>
                    <div id="platform-logos">
                        <img class="platform-logo" src="../../public/assets/images/logos/windows-10-logo-svgrepo-com 1.png" alt="">
                        <img class="platform-logo" src="../../public/assets/images/logos/windows-10-logo-svgrepo-com 1.png" alt="">
                        <img class="platform-logo" src="../../public/assets/images/logos/windows-10-logo-svgrepo-com 1.png" alt="">
                    </div>
                </div>
                <div id="game-detail-rating-genre">
                    <p id="game-detail-rating-text">Rating</p>
                    <p id="game-rating-value">6.8</p>
                    <div id="game-detail-genre-section">
                        <p id="game-detail-genre-text">Strategy</p>
                    </div>
                </div>
                <p id="game-description">Heat Signature is an action-packed, stealth-based game where players take on the role of a space-faring mercenary. In this game, players infiltrate enemy space stations, hijack ships, and complete daring missions using a combination of strategy, skill, and clever gadgets. With its unique blend of fast-paced gameplay, tactical decision-making, and thrilling space adventures, Heat Signature offers an immersive experience that keeps players on the edge of their seats.</p>
                <form id="review-form" action="">
                    <textarea name="genre" rows="6" cols="94" placeholder="Leave A Review."></textarea>
                    <input id="post-review-button" class="button" type="submit" value="Post Review">
                </form>
                <div class="reviews">
                </div>
            </div>
            <div id="game-screenshots-section">
                <img class="screenshot-image" src="../../public/assets/images/banners/image 8.png" alt="">
                <img class="screenshot-image" src="../../public/assets/images/banners/image 8.png" alt="">
                <img class="screenshot-image" src="../../public/assets/images/banners/image 8.png" alt="">
            </div>
        </div>
    </div>
</body>
</html>