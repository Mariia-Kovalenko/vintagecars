
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="/src/css/registration.css">
    <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@400;600;700&display=swap"
    rel="stylesheet">
</head>
<body>
    <div class="form-autor">
        <form action="/src/signup.php" class="form" method="post">
            <label for="first_name">First name</label>
            <input class="input" type="text" name="first_name" placeholder="Enter your first name">

            <label for="last_name">Last name</label>
            <input class="input" type="text" name="last_name" placeholder="Enter your last name">

            <label for="login">Login</label>
            <input class="input" type="text" name="login" placeholder="Enter your login">

            <label for="mail">Email</label>
            <input class="input" type="email" name="email" placeholder="Enter your email">

            <label for="country">Country</label>
            <input class="input" type="text" name="country" placeholder="Enter your country">

            <label for="password">Password</label>
            <input class="input" type="password" name="password" placeholder="Enter your password">
            <button class="button" type="submit">Sign Up</button>
            <p class="hint">
                Already have an account?  <a href="/src/authorize.php" class="sign-link">Log In</a> or go <a href="/src/index.php" class="sign-link">Home</a>
            </p>
        </form>
    </div>
</body>
</html>