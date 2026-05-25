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
                    <input type="email" name="useremail" placeholder="Enter your email Id" required>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <button type="submit">Login</button>
                </form>
                <div id="loginError" class="error"></div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
        <script src="../assets/js/script.js"></script>
    </body>
</html>