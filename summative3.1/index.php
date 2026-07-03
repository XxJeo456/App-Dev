<?php
require_once 'db.php';
session_start();

if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

$reg_result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $first_name = trim($_POST['first_name']);
    $middle_name = trim($_POST['middle_name']);
    $last_name = trim($_POST['last_name']);
    $reg_user = trim($_POST['reg_username']);
    $password = $_POST['reg_password'];
    $confirm_password = $_POST['reg_confirm_password'];
    $birthday = trim($_POST['birthday']);
    $reg_email = trim($_POST['reg_email']);
    $contact_number = trim($_POST['contact_number']);

    if ($password !== $confirm_password) {
        $reg_result = "<div class='error-msg'>password and confirm password are not the same</div>";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$reg_user, $reg_email]);
        
        if ($stmt->fetch()) {
            $reg_result = "<div class='error-msg'>Username or Email already exists.</div>";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_stmt = $pdo->prepare("INSERT INTO users (first_name, middle_name, last_name, username, password, birthday, email, contact_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $insert_stmt->execute([$first_name, $middle_name, $last_name, $reg_user, $hashed_password, $birthday, $reg_email, $contact_number]);

            $reg_result = "
            <div class='result-box'>
                <h3>Result:</h3>
                <div class='result-row'><span>First Name:</span> <strong>" . htmlspecialchars($first_name) . "</strong></div>
                <div class='result-row'><span>Middle Name:</span> <strong>" . htmlspecialchars($middle_name) . "</strong></div>
                <div class='result-row'><span>Last Name:</span> <strong>" . htmlspecialchars($last_name) . "</strong></div>
                <div class='result-row'><span>Username:</span> <strong>" . htmlspecialchars($reg_user) . "</strong></div>
                <div class='result-row'><span>Birthday:</span> <strong>" . htmlspecialchars($birthday) . "</strong></div>
                <div class='result-row'><span>Email:</span> <strong>" . htmlspecialchars($reg_email) . "</strong></div>
                <div class='result-row'><span>Contact Number:</span> <strong>" . htmlspecialchars($contact_number) . "</strong></div>
            </div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            margin: 0;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
        }
        .form-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            max-width: 480px;
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
        input[type="text"], input[type="email"], input[type="password"] {
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
        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
            border-color: #3b82f6;
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            outline: none;
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
            margin-top: 10px;
        }
        button:hover {
            background-color: #1d4ed8;
        }
        .error-msg {
            color: #dc2626;
            background-color: #fef2f2;
            border: 1px solid #fca5a5;
            padding: 14px;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 24px;
            max-width: 480px;
            width: 100%;
            box-sizing: border-box;
            text-align: center;
        }
        .result-box {
            border: 1px solid #e2e8f0;
            padding: 24px;
            margin-top: 24px;
            max-width: 480px;
            width: 100%;
            box-sizing: border-box;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        }
        .result-box h3 {
            margin: 0 0 16px 0;
            color: #10b981;
            font-size: 20px;
        }
        .result-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
        }
        .result-row:last-child {
            border-bottom: none;
        }
        .result-row span {
            color: #64748b;
        }
        .result-row strong {
            color: #1e293b;
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
        <h2>Register</h2>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input type="text" id="middle_name" name="middle_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="reg_username">Username</label>
                <input type="text" id="reg_username" name="reg_username" required>
            </div>
            <div class="form-group">
                <label for="reg_password">Password</label>
                <input type="password" id="reg_password" name="reg_password" required>
            </div>
            <div class="form-group">
                <label for="reg_confirm_password">Confirm Password</label>
                <input type="password" id="reg_confirm_password" name="reg_confirm_password" required>
            </div>
            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="text" id="birthday" name="birthday" placeholder="January 30 1993" required>
            </div>
            <div class="form-group">
                <label for="reg_email">Email</label>
                <input type="email" id="reg_email" name="reg_email" required>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" id="contact_number" name="contact_number" required>
            </div>
            <button type="submit" name="register">Register</button>
        </form>
        
        <a class="toggle-link" href="login.php">Already have an account? Login here</a>
    </div>

    <?php echo $reg_result; ?>

</body>
</html>