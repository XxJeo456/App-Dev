<?php
require_once 'db.php';
session_start();

if (!isset($_SESSION['acc_id']) || $_SESSION['accesslevel'] !== 'user') {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM system_accounts WHERE id = ?");
$stmt->execute([$_SESSION['acc_id']]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Information - User</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #fff;
        margin: 20px;
    }

    .panel {
        border: 2px solid #000;
        border-radius: 12px;
        padding: 25px;
        max-width: 600px;
        margin: 0 auto;
        position: relative;
    }

    .logout-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        color: #00f;
        text-decoration: none;
        font-size: 14px;
    }

    h1 {
        margin-top: 0;
        font-size: 26px;
        font-weight: bold;
    }

    .layout-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 25px;
    }

    .info-details p {
        margin: 6px 0;
        font-size: 15px;
    }

    .profile-img-box {
        width: 150px;
        height: 150px;
        border: 1px solid #aaa;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fafafa;
    }

    .profile-img-box img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }

    .action-links {
        font-size: 14px;
    }

    .action-links a {
        color: #00f;
        text-decoration: none;
        margin-right: 15px;
    }
    </style>
</head>

<body>
    <div class="panel">
        <a href="logout.php" class="logout-btn">Logout</a>
        <h1>My Information</h1>

        <div class="layout-container">
            <div class="info-details">
                <p><strong>Welcome</strong>
                    <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['middle_name'] . ' ' . $user['last_name']); ?>
                </p>
                <p><strong>Userlevel:</strong> <?php echo htmlspecialchars($user['accesslevel']); ?></p>
                <p><strong>Birthday:</strong> <?php echo htmlspecialchars($user['birthday']); ?></p>
                <p><strong>Contact Details</strong></p>
                <p style="padding-left: 15px;"><strong>Contact:</strong>
                    <?php echo htmlspecialchars($user['contact_no']); ?></p>
                <p style="padding-left: 15px;"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?>
                </p>
            </div>
            <div class="profile-img-box">
                <?php if (!empty($user['image']) && file_exists('uploads/' . $user['image'])): ?>
                <img src="uploads/<?php echo htmlspecialchars($user['image']); ?>" alt="Profile">
                <?php else: ?>
                <span style="color:#aaa;">No Image</span>
                <?php endif; ?>
            </div>
        </div>

        <div class="action-links">
            <a href="user_image.php">upload image</a>
            <a href="user_changepass.php">Reset my password</a>
        </div>
    </div>
</body>

</html>