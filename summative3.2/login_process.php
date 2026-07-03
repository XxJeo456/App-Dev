<?php
require_once 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = trim($_POST['login_username']);
    $password = $_POST['login_password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        if (isset($_POST['remember'])) {
            setcookie("remember_user", $username, time() + (86400 * 30), "/");
            setcookie("remember_pass", $password, time() + (86400 * 30), "/"); 
        } else {
            setcookie("remember_user", "", time() - 3600, "/");
            setcookie("remember_pass", "", time() - 3600, "/");
        }

        header("Location: home.php");
        exit();
    } else {
        header("Location: index.php?error=Invalid Username or Password");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>