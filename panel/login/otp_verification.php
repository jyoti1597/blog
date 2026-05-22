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
                <h2>OTP Verification</h2>
                <form action="#" method="POST">
                    <div class="row">
                        <p>An OTP has been sent to your email address. Please enter the OTP below to verify your account.<b>user@example.com</b></p>
                    </div>
                    <div class="row inputGroup">
                        <input type="otp" name="otp" placeholder="OTP" required>
                    </div>
                    <div class="row">
                        <a href="reset_password.php">Resend OTP</a>
                        <button type="submit">Verify OTP</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>