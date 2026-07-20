<?php
require_once 'config/db.php';
$message = ''; $class = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username) || empty($email) || empty($password)) {
        $message = "Please complete all fields.";
        $class = "alert-danger";
    } elseif ($password !== $confirm_password) {
        $message = "Passwords do not match.";
        $class = "alert-danger";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        
        if ($stmt->rowCount() > 0) {
            $message = "Username or email is already taken.";
            $class = "alert-danger";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')");
            if ($stmt->execute([$username, $email, $hashed_password])) {
                $message = "Registration successful! Redirecting to login page...";
                $class = "alert-success";
                header("Refresh: 2; url=login.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="mb-3 text-start">
                    <a href="index.php" class="btn btn-sm btn-outline-secondary">&larr; Back to Main Site</a>
                </div>
                
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body p-4">
                        <?php if (!empty($message)): ?> 
                            <div class="alert <?php echo $class; ?>"><?php echo $message; ?></div> 
                        <?php endif; ?>
                        
                        <form action="register.php" method="POST">
                            <div class="mb-3"><label class="form-label">Username</label><input type="text" name="username" class="form-control" required></div>
                            <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" required></div>
                            <div class="mb-3"><label class="form-label">Password</label><input type="password" name="password" class="form-control" required></div>
                            <div class="mb-3"><label class="form-label">Verify Password</label><input type="password" name="confirm_password" class="form-control" required></div>
                            <button type="submit" class="btn btn-primary w-100">Submit Registration</button>
                        </form>
                        <p class="text-center mt-3 mb-0">Already have an account? <a href="login.php">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>