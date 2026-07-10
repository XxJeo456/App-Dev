<?php
require_once 'db.php';
session_start();

if (isset($_SESSION['acc_id'])) {
    if ($_SESSION['accesslevel'] === 'admin') {
        header("Location: Admin_home.php");
    } else {
        header("Location: user_home.php");
    }
    exit();
}

$error = "";
$reg_msg = "";

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
            } else {
                header("Location: user_home.php");
            }
            exit();
        }
    } else {
        $error = "Invalid Username or Password";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $fname = trim($_POST['first_name']);
    $mname = trim($_POST['middle_name']);
    $lname = trim($_POST['last_name']);
    $uname = trim($_POST['reg_username']);
    $pass = $_POST['reg_password'];
    $cpass = $_POST['reg_confirm_password'];
    $bday = trim($_POST['birthday']);
    $email = trim($_POST['reg_email']);
    $contact = trim($_POST['contact_number']);

    if ($pass !== $cpass) {
        $reg_msg = "<div class='error-box'>Passwords do not match.</div>";
    } else {
        $check = $pdo->prepare("SELECT id FROM system_accounts WHERE username = ? OR email = ?");
        $check->execute([$uname, $email]);
        if ($check->fetch()) {
            $reg_msg = "<div class='error-box'>Username or Email already exists.</div>";
        } else {
            $hashed = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO system_accounts (first_name, middle_name, last_name, username, password, birthday, email, contact_no, accesslevel, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'user', 'active')");
            $stmt->execute([$fname, $mname, $lname, $uname, $hashed, $bday, $email, $contact]);
            $reg_msg = "<div class='success-box'>Registration successful! You can now log in.</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gateway Portal</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f3f4f6; 
            margin: 40px 20px; 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
        }
        .container {
            display: flex;
            gap: 40px;
            max-width: 700px;
            width: 100%;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
        }       
        .form-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 560px;
            box-sizing: border-box;
        }        
        h2 { 
            margin-top: 0; 
            font-size: 22px; 
            color: #111; 
            margin-bottom: 20px; 
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
            text-align: center; 
        }
        .error-box { 
            color: red; 
            font-size: 14px; 
            margin-bottom: 15px; 
            font-weight: bold; 
        }
        .success-box { 
            color: green; 
            font-size: 14px; 
            margin-bottom: 15px; 
            font-weight: bold; 
        }
        .form-group { 
            margin-bottom: 14px; 
        }
        label { 
            display: block; 
            margin-bottom: 4px; 
            font-size: 13px; 
            font-weight: bold; 
        }
        input[type="text"], input[type="email"], input[type="password"] { 
            width: 100%; 
            padding: 8px; 
            border: 1px solid #aaa; 
            border-radius: 4px; 
            box-sizing: border-box; 
        }
        button { 
            padding: 10px 25px; 
            background: #e1e1e1; 
            color: #000; 
            border: 1px solid #adadad; 
            border-radius: 4px; 
            cursor: pointer; 
            font-size: 14px; 
            width: 100%; 
            font-weight: bold; 
        }
        button:hover { 
            background: #d4d4d4; 
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-card">
        <h2>Register</h2>
        <?php echo $reg_msg; ?>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" required>
            </div>
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" name="middle_name">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="reg_username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="reg_password" required>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="reg_confirm_password" required>
            </div>
            <div class="form-group">
                <label>Birthday</label>
                <input type="text" name="birthday" placeholder="May 1, 1992" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="reg_email" required>
            </div>
            <div class="form-group">
                <label>Contact Number</label>
                <input type="text" name="contact_number" required>
            </div>
            <button type="submit" name="register">Register</button>
        </form>
         <div class="link-row">
            <p>Already have an account? <a class="login-link" href="login.php">Login here</a></p>
        </div>
    </div>
</div>
</body>
</html>