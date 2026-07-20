<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$message = ''; $class = '';
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_profile'])) {
        $email = trim($_POST['email']);
        $profile_pic_name = $user['profile_pic'];

        if (!empty($_FILES['profile_pic']['name'])) {
            $target_dir = "assets/uploads/";
            if (!is_dir($target_dir)) { mkdir($target_dir, 0777, true); }
            $profile_pic_name = 'avatar_' . time() . '_' . basename($_FILES['profile_pic']['name']);
            $target_file = $target_dir . $profile_pic_name;
            $ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (in_array($ext, ['png', 'jpg', 'jpeg'])) {
                if ($user['profile_pic'] !== 'default.png' && file_exists($target_dir . $user['profile_pic'])) {
                    unlink($target_dir . $user['profile_pic']);
                }
                move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file);
            }
        }

        $update = $pdo->prepare("UPDATE users SET email = ?, profile_pic = ? WHERE id = ?");
        if ($update->execute([$email, $profile_pic_name, $user_id])) {
            $message = "Personal variables updated securely!"; $class = "alert-success";
            header("Refresh:1");
        }
    }

    if (isset($_POST['change_password'])) {
        $new_pass = $_POST['new_password']; $confirm_pass = $_POST['confirm_password'];
        if (!empty($new_pass) && $new_pass === $confirm_pass) {
            $hashed = password_hash($new_pass, PASSWORD_DEFAULT);
            $update_pw = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
            $update_pw->execute([$hashed, $user_id]);
            $message = "Password keys changed successfully."; $class = "alert-success";
        } else {
            $message = "The confirmation check inputs did not match."; $class = "alert-danger";
        }
    }
}
?>
<?php include_once 'includes/header.php'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-4 mb-4">
                <h3 class="fw-bold mb-3 text-center">Profile Parameters</h3>
                <?php if(!empty($message)): ?> <div class="alert <?php echo $class; ?>"><?php echo $message; ?></div> <?php endif; ?>
                <div class="text-center mb-4">
                    <img src="assets/uploads/<?php echo htmlspecialchars($user['profile_pic']); ?>" class="rounded-circle border" width="120" height="120" style="object-fit:cover;" onerror="this.src='https://cdn-icons-png.flaticon.com/512/149/149071.png'">
                </div>
                <form action="profile.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3"><label class="form-label">Username Account Tag</label><input type="text" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" disabled></div>
                    <div class="mb-3"><label class="form-label">Active Email Address</label><input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required></div>
                    <div class="mb-3"><label class="form-label">Change Profile Picture Asset</label><input type="file" name="profile_pic" class="form-control" accept="image/*"></div>
                    <button type="submit" name="update_profile" class="btn btn-primary w-100 mb-3">Update Base Identity</button>
                </form>
                <hr>
                <form action="profile.php" method="POST">
                    <div class="mb-3"><label class="form-label">New Account Key Token</label><input type="password" name="new_password" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Verify Account Key Token</label><input type="password" name="confirm_password" class="form-control" required></div>
                    <button type="submit" name="change_password" class="btn btn-warning w-100">Commit Secure Password Override</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once 'includes/footer.php'; ?>