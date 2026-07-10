<?php
require_once 'db.php';
session_start();

if (!isset($_SESSION['acc_id']) || $_SESSION['accesslevel'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM system_accounts WHERE id = ?");
$stmt->execute([$_SESSION['acc_id']]);
$admin = $stmt->fetch();

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_pass'])) {
    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    $renew = $_POST['renew_password'];

    if (!password_verify($current, $admin['password'])) {
        $msg = "Current password context is invalid.";
    } elseif ($new !== $renew) {
        $msg = "Re-entered password confirmation mismatch.";
    } else {
        $hashed = password_hash($new, PASSWORD_DEFAULT);
        $update = $pdo->prepare("UPDATE system_accounts SET password = ? WHERE id = ?");
        $update->execute([$hashed, $_SESSION['acc_id']]);
        $msg = "Password updated successfully.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Password Reset - Admin</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #fff;
        margin: 20px;
    }

    .container {
        border: 2px solid #000;
        border-radius: 12px;
        padding: 25px;
        max-width: 480px;
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

    .layout-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .info-details p {
        margin: 5px 0;
        font-size: 14px;
    }

    h2.section-title {
        font-size: 22px;
        font-weight: bold;
        margin: 20px 0 10px 0;
        border: none;
        padding: 0;
    }

    .form-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    label {
        font-size: 14px;
        width: 160px;
    }

    input[type="password"] {
        width: 260px;
        padding: 4px;
        border: 1px solid #aaa;
        border-radius: 2px;
    }

    .btn-container {
        text-align: center;
        margin-top: 15px;
    }

    button {
        padding: 6px 25px;
        background: #e1e1e1;
        border: 1px solid #adadad;
        border-radius: 4px;
        cursor: pointer;
    }

    .status-msg {
        font-size: 13px;
        color: blue;
        text-align: center;
        margin-bottom: 10px;
    }
    </style>
</head>

<body>
    <div class="container">
        <a href="Admin_home.php" class="back-link">Back</a>
        <h1>My Information</h1>

        <div class="layout-container">
            <div class="info-details">
                <p><strong>Welcome</strong>
                    <?php echo htmlspecialchars($admin['first_name'] . ' ' . $admin['last_name']); ?></p>
                <p><strong>Userlevel:</strong> <?php echo htmlspecialchars($admin['accesslevel']); ?></p>
                <p><strong>Birthday:</strong> <?php echo htmlspecialchars($admin['birthday']); ?></p>
                <p><strong>Contact Details</strong></p>
                <p style="padding-left:10px;"><strong>Contact:</strong>
                    <?php echo htmlspecialchars($admin['contact_no']); ?></p>
                <p style="padding-left:10px;"><strong>Email:</strong> <?php echo htmlspecialchars($admin['email']); ?>
                </p>
            </div>
        </div>

        <h2 class="section-title">-Password Reset-</h2>
        <?php if (!empty($msg)): ?><div class="status-msg"><?php echo $msg; ?></div><?php endif; ?>
        <form action="Admin_changepass.php" method="POST">
            <div class="form-row"><label>Enter Current Password:</label><input type="password" name="current_password"
                    required></div>
            <div class="form-row"><label>Enter New Password:</label><input type="password" name="new_password" required>
            </div>
            <div class="form-row"><label>Re-Enter New Password:</label><input type="password" name="renew_password"
                    required></div>
            <div class="btn-container"><button type="submit" name="change_pass">Submit</button></div>
        </form>
    </div>
</body>

</html>