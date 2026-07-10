<?php
require_once 'db.php';
session_start();

if (!isset($_SESSION['acc_id']) || $_SESSION['accesslevel'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_user'])) {
    $fname = trim($_POST['first_name']);
    $mname = trim($_POST['middle_name']);
    $lname = trim($_POST['last_name']);
    $uname = trim($_POST['username']);
    $pass = $_POST['password'];
    $cpass = $_POST['confirm_password'];
    $bday = trim($_POST['birthday']);
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact_number']);
    $level = $_POST['accesslevel'];

    if ($pass !== $cpass) {
        $msg = "Passwords do not match.";
    } else {
        $check = $pdo->prepare("SELECT id FROM system_accounts WHERE username = ? OR email = ?");
        $check->execute([$uname, $email]);
        if ($check->fetch()) {
            $msg = "Username or Email already exists.";
        } else {
            $hashed = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO system_accounts (first_name, middle_name, last_name, username, password, birthday, email, contact_no, accesslevel, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'active')");
            $stmt->execute([$fname, $mname, $lname, $uname, $hashed, $bday, $email, $contact, $level]);
            header("Location: Admin_home.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #fff;
        margin: 20px;
    }

    .form-container {
        border: 2px solid #000;
        border-radius: 12px;
        padding: 25px;
        max-width: 450px;
        margin: 0 auto;
        position: relative;
    }

    .back-link {
        position: absolute;
        top: 20px;
        right: 20px;
        color: #00f;
        text-decoration: none;
        font-size: 14px;
    }

    h1 {
        margin-top: 0;
        font-size: 24px;
        font-weight: bold;
    }

    .subtitle {
        font-size: 14px;
        margin-bottom: 15px;
        color: #333;
    }

    .form-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    label {
        font-size: 14px;
        width: 140px;
        text-align: left;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
        width: 260px;
        padding: 4px;
        border: 1px solid #7a7a7a;
        border-radius: 2px;
        box-sizing: border-box;
    }

    .btn-container {
        text-align: center;
        margin-top: 20px;
    }

    button {
        padding: 6px 30px;
        background: #e1e1e1;
        border: 1px solid #adadad;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .error {
        color: red;
        font-size: 13px;
        margin-bottom: 10px;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="form-container">
        <a href="Admin_home.php" class="back-link">Back</a>
        <h1>Add User</h1>
        <div class="subtitle">Fill Up Form</div>
        <?php if (!empty($msg)): ?><div class="error"><?php echo $msg; ?></div><?php endif; ?>
        <form action="Admin_adduser.php" method="POST">
            <div class="form-row"><label>First Name:</label><input type="text" name="first_name" required></div>
            <div class="form-row"><label>Middle Name:</label><input type="text" name="middle_name"></div>
            <div class="form-row"><label>Last Name:</label><input type="text" name="last_name" required></div>
            <div class="form-row"><label>Username:</label><input type="text" name="username" required></div>
            <div class="form-row"><label>Password:</label><input type="password" name="password" required></div>
            <div class="form-row"><label>Confirm Password:</label><input type="password" name="confirm_password"
                    required></div>
            <div class="form-row"><label>Birthday:</label><input type="text" name="birthday" placeholder="May 1, 1992"
                    required></div>
            <div class="form-row"><label>Email:</label><input type="email" name="email" required></div>
            <div class="form-row"><label>Contact Number:</label><input type="text" name="contact_number" required></div>
            <div class="form-row">
                <label>Access Level:</label>
                <select name="accesslevel">
                    <option value="user">User</option>
                    <option value="admin">Administrator</option>
                </select>
            </div>
            <div class="btn-container"><button type="submit" name="submit_user">Submit</button></div>
        </form>
    </div>
</body>

</html>