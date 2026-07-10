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

$records_stmt = $pdo->query("SELECT * FROM system_accounts");
$all_records = $records_stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Information - Admin</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #fff;
        margin: 20px;
        color: #000;
    }

    .panel {
        border: 2px solid #000;
        border-radius: 12px;
        padding: 25px;
        max-width: 900px;
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
        margin-bottom: 30px;
        font-size: 14px;
    }

    .action-links a {
        color: #00f;
        text-decoration: none;
        margin-right: 15px;
    }

    h2.records-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        border-bottom: none;
        padding: 0;
    }

    .add-user-btn {
        display: inline-block;
        color: #00f;
        text-decoration: none;
        margin-bottom: 10px;
        font-size: 14px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 5px;
        font-size: 13px;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 6px;
        text-align: left;
    }

    th {
        background-color: #fff;
    }

    .status-active {
        color: #00f;
        text-decoration: none;
    }

    .status-disable {
        color: #00f;
        text-decoration: none;
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
                    <?php echo htmlspecialchars($admin['first_name'] . ' ' . $admin['middle_name'] . ' ' . $admin['last_name']); ?>
                </p>
                <p><strong>Userlevel:</strong> <?php echo htmlspecialchars($admin['accesslevel']); ?></p>
                <p><strong>Birthday:</strong> <?php echo htmlspecialchars($admin['birthday']); ?></p>
                <p><strong>Contact Details</strong></p>
                <p style="padding-left: 15px;"><strong>Contact:</strong>
                    <?php echo htmlspecialchars($admin['contact_no']); ?></p>
                <p style="padding-left: 15px;"><strong>Email:</strong> <?php echo htmlspecialchars($admin['email']); ?>
                </p>
            </div>
            <div class="profile-img-box">
                <?php if (!empty($admin['image']) && file_exists('uploads/' . $admin['image'])): ?>
                <img src="uploads/<?php echo htmlspecialchars($admin['image']); ?>" alt="Profile">
                <?php else: ?>
                <span style="color:#aaa;">No Image</span>
                <?php endif; ?>
            </div>
        </div>

        <div class="action-links">
            <a href="Admin_image.php">upload image</a>
            <a href="Admin_changepass.php">Reset my password</a>
        </div>

        <h2 class="records-title">-Records-</h2>
        <a href="Admin_adduser.php" class="add-user-btn">Add New User</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Birthday</th>
                    <th>Username</th>
                    <th>Access Level</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($all_records as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['middle_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['contact_no']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['birthday']); ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['accesslevel']); ?></td>
                    <td>
                        <?php if ($row['status'] === 'active'): ?>
                        <span class="status-active">active</span>
                        <?php else: ?>
                        <span class="status-disable">disable</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endindex; endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>