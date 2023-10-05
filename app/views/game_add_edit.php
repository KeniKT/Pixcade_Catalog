<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Game</title>
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
    <div class="main-body">
        <div class="h2-center">
            <h2>Add Game</h2>
        </div>
        <form action="">
            <input type="text" placeholder="Game Title">
            <input type="text" placeholder="Caption">
            <div class="banner-upload">
                <p >Upload a Banner</p>
                <input class="file-upload" type="file" accept="image/*">
            </div>
            <div class="screenshot-upload">
                <p>Upload Screenshots</p>
                <div class="screenshot-files">
                    <input class="file-upload" type="file" accept="image/*">
                    <input class="file-upload" type="file" accept="image/*">
                    <input class="file-upload" type="file" accept="image/*">
                </div>
            </div>
            <textarea name="genre" rows="6" cols="94" placeholder="Description"></textarea>
            <select name="genre" id="genre-select">
                <option value="">Action</option>
                <option value="">Adventure</option>
                <option value="">Real-Time Strategy</option>
            </select>
            <input type="date" placeholder="Date">
            <div class="platform-section">
                <p>Platform</p>
                <div id="platform-selection">
                    <div class="check-item">
                        <input class="check" type="checkbox" name="win" id="windows" value="Windows">
                        <p class="platform-label">Windows</p>
                    </div>
                    <div class="check-item">
                        <input class="check" type="checkbox" name="win" id="windows" value="Windows">
                        <p class="platform-label">OSX</p>
                    </div>
                    <div class="check-item">
                        <input class="check" type="checkbox" name="win" id="windows" value="Windows">
                        <p class="platform-label">Linux</p>
                    </div>
                </div>
            </div>
            <input class = "button" type="submit" value="Save Changes">
        </form>
    </div>
 
</body>
</html>