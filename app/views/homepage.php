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
        <div class="h2-left">
            <h2>Recent Releases</h2>
        </div>
        <div class="games-grid">
            <div class="game-card">
                <img id="game-image" src="../../public/assets/images/banners/image 8.png">
                <div id="game-title-platform">
                    <a href="" id="game-title">Heat Signature</a>
                    <img id="platform-icon" src="../../public/assets/images/logos/windows-10-logo-svgrepo-com 1.png">
                </div>
                <div id="game-rating-genre">
                    <p id="game-rating-text">Rating</p>
                    <p id="game-rating-value">6.8</p>
                    <div id="game-genre-section">
                        <p id="game-genre-text">Strategy</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>