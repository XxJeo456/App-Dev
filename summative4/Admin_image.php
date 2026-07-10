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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upload'])) {
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === 0) {
        $filename = time() . '_' . $_FILES['profile_pic']['name'];
        if (!is_dir('uploads')) { mkdir('uploads', 0777, true); }
        
        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], 'uploads/' . $filename)) {
            $update = $pdo->prepare("UPDATE system_accounts SET image = ? WHERE id = ?");
            $update->execute([$filename, $_SESSION['acc_id']]);
            header("Location: Admin_home.php");
            exit();
        } else { $msg = "Failed to upload file image."; }
    } else { $msg = "Please select a valid image file."; }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upload Image - Admin</title>
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

    .layout-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .info-details p {
        margin: 5px 0;
        font-size: 14px;
    }

    .preview-box {
        width: 120px;
        height: 120px;
        border: 1px solid #aaa;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: #fafafa;
        font-size: 12px;
    }

    .preview-box img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }

    h2.section-title {
        font-size: 22px;
        font-weight: bold;
        margin: 20px 0 10px 0;
        border: none;
        padding: 0;
    }

    .form-row {
        margin-bottom: 15px;
    }

    button {
        padding: 6px 20px;
        background: #e1e1e1;
        border: 1px solid #adadad;
        border-radius: 4px;
        cursor: pointer;
    }

    .error {
        color: red;
        font-size: 13px;
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
            <div class="preview-box">
                <?php if (!empty($admin['image']) && file_exists('uploads/' . $admin['image'])): ?>
                <img src="uploads/<?php echo htmlspecialchars($admin['image']); ?>" alt="Profile">
                <?php else: ?>
                <div style="margin-bottom:5px; color:#aaa;">No Image</div>
                <?php endif; ?>
                <div style="margin-top:auto; font-size:11px; color:#555;">Preview</div>
            </div>
        </div>

        <h2 class="section-title">-Upload Image-</h2>
        <?php if (!empty($msg)): ?><p class="error"><?php echo $msg; ?></p><?php endif; ?>
        <form action="Admin_image.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <input type="file" name="profile_pic" required>
            </div>
            <button type="submit" name="upload">Upload Image</button>
        </form>
    </div>
</body>

</html>