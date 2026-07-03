<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

$cookie_user = isset($_COOKIE['remember_user']) ? $_COOKIE['remember_user'] : '';
$cookie_pass = isset($_COOKIE['remember_pass']) ? $_COOKIE['remember_pass'] : '';
$cookie_checked = isset($_COOKIE['remember_user']) ? 'checked' : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            margin: 0;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            box-sizing: border-box;
        }
        .form-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
        }
        h2 {
            margin: 0 0 24px 0;
            color: #1a1a1a;
            font-size: 28px;
            font-weight: 700;
            text-align: center;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 600;
            color: #4a5568;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 15px;
            transition: all 0.2s ease;
            background-color: #f8fafc;
            color: #334155;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #2563eb;
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(37, 99, 233, 0.1);
            outline: none;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 20px 0;
        }
        .checkbox-group input[type="checkbox"] {
            width: 16px;
            height: 16px;
            cursor: pointer;
        }
        .checkbox-group label {
            text-transform: none;
            letter-spacing: normal;
            font-weight: 500;
            font-size: 14px;
            color: #475569;
            margin: 0;
            cursor: pointer;
        }
        button {
            width: 100%;
            padding: 14px;
            background-color: #2563eb;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        button:hover {
            background-color: #1d4ed8;
        }
        .error-banner {
            color: #dc2626;
            background-color: #fef2f2;
            border: 1px solid #fca5a5;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            text-align: center;
            margin-bottom: 20px;
        }
        .toggle-link {
            display: block;
            margin-top: 20px;
            font-size: 14px;
            text-align: center;
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }
        .toggle-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-card">
        <h2>Login</h2>
        <?php 
        if (isset($_GET['error'])) {
            echo "<div class='error-banner'>".htmlspecialchars($_GET['error'])."</div>";
        }
        ?>
        <form action="login_process.php" method="POST">
            <div class="form-group">
                <label for="login_username">Username</label>
                <input type="text" id="login_username" name="login_username" value="<?php echo htmlspecialchars($cookie_user); ?>" required>
            </div>
            <div class="form-group">
                <label for="login_password">Password</label>
                <input type="password" id="login_password" name="login_password" value="<?php echo htmlspecialchars($cookie_pass); ?>" required>
            </div>
            <div class="form-group checkbox-group">
                <input type="checkbox" id="remember" name="remember" <?php echo $cookie_checked; ?>>
                <label for="remember">Remember Me</label>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
        
        <a class="toggle-link" href="index.php">Don't have an account? Register here</a>
    </div>

</body>
</html>