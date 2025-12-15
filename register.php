<?php
session_start();
$file = "users.json";
if (!file_exists($file)) file_put_contents($file, "[]");
$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";
$confirm = $_POST["confirm_password"] ?? "";
if ($name === "") { $_SESSION['error'] = "Name is required"; header("Location: registration.php"); exit; }
if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) { $_SESSION['error'] = "Invalid email address"; header("Location: registration.php"); exit; }
if (strlen($password) < 6) { $_SESSION['error'] = "Password must be at least 6 characters"; header("Location: registration.php"); exit; }
if ($password !== $confirm) { $_SESSION['error'] = "Passwords do not match"; header("Location: registration.php"); exit; }
$users = json_decode(file_get_contents($file), true);
foreach ($users as $u) {
    if (strcasecmp($u["email"], $email) === 0) { $_SESSION['error'] = "Email already registered"; header("Location: registration.php"); exit; }
}
$users[] = ["name"=>$name,"email"=>$email,"password"=>password_hash($password,PASSWORD_DEFAULT),"created_at"=>date("c")];
if (file_put_contents($file,json_encode($users,JSON_PRETTY_PRINT)) === false) $_SESSION['error']="Failed to save user data";
else $_SESSION['success']="Registration successful!";
header("Location: registration.php");
exit;
?>
