<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            <h2>Welcome</h2>
        </div>
        <form action="../controllers/registration_controller.php" method="POST">
            <input name="first_name" type="text" placeholder="First Name" required>
            <input name="last_name" type="text" placeholder="Last Name" required>
            <input name="displayName" type="text" placeholder="Display Name" required>
            <input name="email" type="email" placeholder="Email" required>
            <input name="password" type="password" placeholder="Password" required>
            <input name="dateOfBirth" type="date" placeholder="Date" required>
            <select name="userType" id="account-type-select" placeholder="Email" required>
                <option value="Gamer">Gamer</option>
                <option value="Developer">Developer</option>
            </select>
            <input class = "button" type="submit" value="Sign-up">
            <p>Already Have An Account?</p>
            <a href="./login.php">Sign-in</a>
        </form>
    </div>
    
</body>
</html>