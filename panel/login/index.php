<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard UI</title>
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/media.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <!-- Main Content -->
        <div class="loginContainer">
            <div class="loginCard">
                <img src="../assets/images/logo_image.png" alt="Logo">
                <h2>Login</h2>
                <form id="loginForm" method="POST">
                    <input type="email" name="email" class="form_data" placeholder="Enter your email Id" required>
                    <input type="password" name="password" class="form_data" placeholder="Enter your password" required>
                    <button type="submit" name="submit" id="submit">Login</button>
                </form>
                <div id="loginError" class="error"></div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
        <script src="../assets/js/login_ajax.js"></script>
    </body>
</html>