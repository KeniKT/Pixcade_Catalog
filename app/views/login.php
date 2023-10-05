<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <header>
        <img class = "logo" src="../../public/assets/images/logos/Group 3.png">
    </header>
    <div class = "main-body">
        <div class="h2-center">
            <h2>Welcome Back!</h2>
        </div>
        <form action="../controllers/login_controller.php" method="POST">
            <input name="email" type="text" placeholder="Email">
            <input name="password" type="password" placeholder="Password">
            
            <input class="button" type="submit" value="Sign-in">
            <p>Don't Have An Account?</p>
            <a href="./register.php">Sign-up</a>
        </form>
    </div>
    
</body>
</html>