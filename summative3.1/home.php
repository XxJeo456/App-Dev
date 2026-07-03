<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .welcome-card {
            background: #ffffff;
            padding: 50px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            text-align: center;
            max-width: 440px;
            width: 100%;
            box-sizing: border-box;
        }
        h1 {
            color: #1e293b;
            margin: 0 0 12px 0;
            font-size: 32px;
            font-weight: 700;
        }
        p {
            color: #64748b;
            font-size: 16px;
            margin: 0 0 32px 0;
            line-height: 1.5;
        }
        .logout-btn {
            display: inline-block;
            padding: 14px 32px;
            background-color: #ef4444;
            color: #ffffff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
            transition: background-color 0.2s ease;
        }
        .logout-btn:hover {
            background-color: #dc2626;
        }
    </style>
</head>
<body>

<div class="welcome-card">
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>You have logged into your secure operational session control room panel dashboard.</p>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

</body>
</html>