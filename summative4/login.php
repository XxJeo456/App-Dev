<?php
require_once 'db.php';
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $user_input = trim($_POST['username']);
    $password_input = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM system_accounts WHERE username = ?");
    $stmt->execute([$user_input]);
    $account = $stmt->fetch();

    if ($account && password_verify($password_input, $account['password'])) {
        if ($account['status'] === 'disable') {
            $error = "This account is disabled please contact the administrator";
        } else {
            $_SESSION['acc_id'] = $account['id'];
            $_SESSION['username'] = $account['username'];
            $_SESSION['accesslevel'] = $account['accesslevel'];

            if ($account['accesslevel'] === 'admin') {
                header("Location: Admin_home.php");
                exit();
            } else {
                header("Location: user_home.php");
                exit();
            }
        }
    } else {
        $error = "Invalid Username or Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log-In Form</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f3f4f6;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .login-box {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        width: 340px;
        border: 1px solid #ccc;
    }

    h2 {
        margin-top: 0;
        font-size: 22px;
        color: #111;
    }

    .error-msg {
        color: #000;
        font-weight: bold;
        background: #ffccd5;
        border: 1px solid #ff4d6d;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 6px;
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #aaa;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 5px;
        margin: 15px 0;
        font-size: 14px;
    }

    button {
        width: auto;
        padding: 10px 25px;
        background: #e1e1e1;
        color: #000;
        border: 1px solid #adadad;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    button:hover {
        background: #d4d4d4;
    }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Log-In Form</h2>
        <?php if (!empty($error)): ?>
        <div class="error-msg"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="rem">
                <label for="rem">Remember Me</label>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
        <div class="link-row">
            <p>Dont have an account? <a class="login-link" href="index.php">Register here</a></p>
        </div>
    </div>
</body>

</html>