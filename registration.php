<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Windows Style Registration</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="center-screen">
    <img id="windows-btn" src="https://upload.wikimedia.org/wikipedia/commons/5/5f/Windows_logo_-_2012.svg" alt="Windows Logo">
</div>
<div class="login-panel" id="login-panel">
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <label>Name</label>
        <input type="text" name="name" placeholder="Enter your name" required>
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" placeholder="Confirm your password" required>
        <button type="submit">Register</button>
    </form>
    <div class="message">
        <?php
        if (isset($_SESSION['error'])) {
            echo '<p class="error">'.htmlspecialchars($_SESSION['error']).'</p>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo '<p class="success">'.htmlspecialchars($_SESSION['success']).'</p>';
            unset($_SESSION['success']);
        }
        ?>
    </div>
</div>
<script>
const winBtn = document.getElementById("windows-btn");
const panel = document.getElementById("login-panel");
let isOpen = false;
winBtn.addEventListener("click", () => {
    isOpen = !isOpen;
    panel.classList.toggle("show", isOpen);
});
</script>
</body>
</html>
