<?php
session_start();


include("db.php"); // Ensure correct path

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Use password_verify() if passwords are hashed
        if ($password === $user['password']) { 
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

            // Ensure session persists
            session_regenerate_id(true);

            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid Username or password.";
        }
    } else {
        $error = "No user found.";
    }
}
?>

  
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<style>-->
    <!--    .login_container {-->
    <!--        display: flex;-->
    <!--        justify-content: center;-->
    <!--        width: 100%;-->
    <!--        height: 80vh;-->
    <!--        align-items: center;-->
    <!--    }-->
    <!--    .login_box {-->
    <!--        border-radius: 10px;-->
    <!--        background-color: #fff;-->
    <!--        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;-->
    <!--        width: 24rem;-->
    <!--        padding: 2rem;-->
    <!--    }-->
    <!--    .login_box button {-->
    <!--        background-color: rgb(95 111 255);-->
    <!--        color: #fff;-->
    <!--        border: none;-->
    <!--        padding: .5rem 0;-->
    <!--        width: 100%;-->
    <!--        border-radius: .375rem;-->
    <!--    }-->
    <!--    .login_box h1, .login_box p {-->
    <!--        text-align: start;-->
    <!--    }-->
    <!--    .form-group {-->
    <!--        position: relative;-->
    <!--    }-->
    <!--    .form-control {-->
            <!--padding-right: 40px;-->
    <!--        font-size: 16px;-->
    <!--    }-->
    <!--    .toggle-password {-->
    <!--        position: absolute;-->
    <!--        right: 10px;-->
    <!--        top: 50%;-->
    <!--        transform: translateY(-50%);-->
    <!--        cursor: pointer;-->
    <!--        font-size: 18px;-->
    <!--    }-->
    <!--</style>-->
</head>
<body>
  <style>
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        width: 100%;
        max-width: 1200px;
        padding: 20px;
    }

    .login_container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .login_box {
        border-radius: 16px;
        background-color: #fff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        width: 24rem;
        padding: 2.5rem;
        transform: translateY(-5%);
        transition: all 0.3s ease;
    }

    .login_box:hover {
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }

    .login_box h2 {
        color: #2d3748;
        font-size: 1.75rem;
        margin-bottom: 0.5rem;
        text-align: center;
        font-weight: 600;
    }

    .login_box p {
        color: #718096;
        text-align: center;
        margin-bottom: 2rem;
        font-size: 0.95rem;
    }

    .form-group {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        padding-right: 40px;
        font-size: 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        transition: all 0.3s ease;
        background-color: #f8fafc;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.2);
        background-color: #fff;
    }

    .form-control::placeholder {
        color: #a0aec0;
    }

    .toggle-password {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 1.1rem;
        color: #a0aec0;
        transition: color 0.2s ease;
    }

    .toggle-password:hover {
        color: #667eea;
    }

    .login_box button {
        background-color: #667eea;
        color: #fff;
        border: none;
        padding: 0.75rem;
        width: 100%;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 0.5rem;
    }

    .login_box button:hover {
        background-color: #5a67d8;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .login_box button:active {
        transform: translateY(0);
    }

    /* Error message styling */
   .error {
        background-color: #fff5f5;
        padding: 0.75rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        text-align: center;
        border-left: 4px solid #fc8181;
    }

    /* Responsive adjustments */
    @media (max-width: 480px) {
        .login_box {
            width: 90%;
            padding: 1.5rem;
        }
    }
</style>
<div class="container">
    <div class="login_container">
        <div class="login_box">
           
              <h2>Login</h3>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            <p>Please sign in to access the admin panel</p>
            <form method="POST">
                <div class="form-group">
                    <input type="text" placeholder="User" class="form-control" name="email" required />
                </div>
                <div class="form-group">
                    <input type="password" id="password" placeholder="Password" class="form-control" name="password" required />
                    <i class="fa fa-eye toggle-password" id="togglePassword"></i>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const passwordInput = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");

        togglePassword.addEventListener("click", function () {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePassword.classList.remove("fa-eye");
                togglePassword.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                togglePassword.classList.remove("fa-eye-slash");
                togglePassword.classList.add("fa-eye");
            }
        });
    });
</script>

</body>
</html>
