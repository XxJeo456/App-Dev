<?php
require_once 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

$msg = "";
$msg_class = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $re_new_password = $_POST['re_new_password'];

    if (!password_verify($current_password, $user['password'])) {
        $msg = "Current password is not the same with the old password";
        $msg_class = "err-banner";
    } elseif ($new_password !== $re_new_password) {
        $msg = "New password and Re-Enter new password should be the same.";
        $msg_class = "err-banner";
    } else {
        $new_hashed = password_hash($new_password, PASSWORD_DEFAULT);
        $update_stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        $update_stmt->execute([$new_hashed, $_SESSION['user_id']]);
        
        $msg = "Password changed successfully.";
        $msg_class = "success-banner";
        
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Control Panel</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            margin: 0;
            padding: 40px 20px;
            min-height: 100vh;
            box-sizing: border-box;
        }
        .nav-header {
            max-width: 1000px;
            width: 100%;
            margin: 0 auto 20px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logout-link {
            color: #ef4444;
            text-decoration: none;
            font-weight: 600;
            padding: 8px 16px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .logout-link:hover {
            background: #fef2f2;
        }
        .main-dashboard {
            display: flex;
            gap: 30px;
            max-width: 1000px;
            width: 100%;
            margin: 0 auto;
            flex-wrap: wrap;
        }
        .panel-card {
            background: #ffffff;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            flex: 1;
            min-width: 320px;
            box-sizing: border-box;
        }
        h2 {
            margin: 0 0 24px 0;
            color: #1e293b;
            font-size: 22px;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 12px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 15px;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-row span {
            color: #64748b;
            font-weight: 500;
        }
        .info-row strong {
            color: #1e293b;
        }
        .form-group {
            margin-bottom: 16px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 600;
            color: #4a5568;
            text-transform: uppercase;
        }
        input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 15px;
            background-color: #f8fafc;
        }
        input[type="password"]:focus {
            border-color: #2563eb;
            background-color: #ffffff;
            outline: none;
        }
        button {
            width: 100%;
            padding: 14px;
            background-color: #2563eb;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
        }
        button:hover {
            background-color: #1d4ed8;
        }
        .err-banner {
            color: #dc2626;
            background-color: #fef2f2;
            border: 1px solid #fca5a5;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 14px;
        }
        .success-banner {
            color: #065f46;
            background-color: #ecfdf5;
            border: 1px solid #a7f3d0;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="nav-header">
        <h1 style="margin:0; font-size: 24px; color: #1e293b;">Account Settings</h1>
        <a href="logout.php" class="logout-link">Log-out</a>
    </div>

    <div class="main-dashboard">
        <div class="panel-card">
            <h2>User Profile Records</h2>
            <div class="info-row"><span>First Name:</span> <strong><?php echo htmlspecialchars($user['first_name']); ?></strong></div>
            <div class="info-row"><span>Middle Name:</span> <strong><?php echo htmlspecialchars($user['middle_name']); ?></strong></div>
            <div class="info-row"><span>Last Name:</span> <strong><?php echo htmlspecialchars($user['last_name']); ?></strong></div>
            <div class="info-row"><span>Username:</span> <strong><?php echo htmlspecialchars($user['username']); ?></strong></div>
            <div class="info-row"><span>Birthday:</span> <strong><?php echo htmlspecialchars($user['birthday']); ?></strong></div>
            <div class="info-row"><span>Email:</span> <strong><?php echo htmlspecialchars($user['email']); ?></strong></div>
            <div class="info-row"><span>Contact Number:</span> <strong><?php echo htmlspecialchars($user['contact_number']); ?></strong></div>
        </div>

        <div class="panel-card">
            <h2>Reset Password</h2>
            <?php if ($msg !== ""): ?>
                <div class="<?php echo $msg_class; ?>"><?php echo $msg; ?></div>
            <?php endif; ?>
            <form action="home.php" method="POST">
                <div class="form-group">
                    <label for="current_password">Enter Current Password</label>
                    <input type="password" id="current_password" name="current_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password">Enter New Password</label>
                    <input type="password" id="new_password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label for="re_new_password">Re-Enter New Password</label>
                    <input type="password" id="re_new_password" name="re_new_password" required>
                </div>
                <button type="submit" name="reset_password">Save New Password</button>
            </form>
        </div>
    </div>

</body>
</html>