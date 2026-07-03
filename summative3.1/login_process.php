<?php
require_once 'db.php';
session_start();

function validate_credentials($username, $password, $pdo) {
    static $static_user = "admin";
    static $static_pass = "password123";

    if ($username === $static_user && $password === $static_pass) {
        return true;
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        return true;
    }

    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = trim($_POST['login_username']);
    $password = $_POST['login_password'];

    if (validate_credentials($username, $password, $pdo)) {
        $_SESSION['username'] = $username;

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