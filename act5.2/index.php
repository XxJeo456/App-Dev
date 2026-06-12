<?php
require_once 'cookie.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookie Lifecycle Tracking</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="box">
    <h2>Register Name Cookies</h2>
    <form action="index.php" method="post">
        <label>First Name:</label>
        <input type="text" name="firstname" required>
        
        <label>Middle Name:</label>
        <input type="text" name="middlename">
        
        <label>Last Name:</label>
        <input type="text" name="lastname" required>
        
        <button type="submit" name="set_cookies">Generate Cookies</button>
    </form>
</div>

<div class="box">
    <h2>Current Cookie Repository Status</h2>
    <p><em>Note: Refresh the page manually to view updates after 10, 20, and 30 seconds.</em></p>

    <div class="cookie-group <?php echo isset($_COOKIE['firstname_10']) ? 'active' : 'expired'; ?>">
        <strong>Status at 10 Seconds:</strong><br>
        <?php if (isset($_COOKIE['firstname_10'])): ?>
            First: <?php echo htmlspecialchars($_COOKIE['firstname_10']); ?> | 
            Middle: <?php echo htmlspecialchars($_COOKIE['middlename_10']); ?> | 
            Last: <?php echo htmlspecialchars($_COOKIE['lastname_10']); ?>
        <?php else: ?>
            Cookies have expired or are not yet created.
        <?php endif; ?>
    </div>

    <div class="cookie-group <?php echo isset($_COOKIE['firstname_20']) ? 'active' : 'expired'; ?>">
        <strong>Status at 20 Seconds:</strong><br>
        <?php if (isset($_COOKIE['firstname_20'])): ?>
            First: <?php echo htmlspecialchars($_COOKIE['firstname_20']); ?> | 
            Middle: <?php echo htmlspecialchars($_COOKIE['middlename_20']); ?> | 
            Last: <?php echo htmlspecialchars($_COOKIE['lastname_20']); ?>
        <?php else: ?>
            Cookies have expired or are not yet created.
        <?php endif; ?>
    </div>

    <div class="cookie-group <?php echo isset($_COOKIE['firstname_30']) ? 'active' : 'expired'; ?>">
        <strong>Status at 30 Seconds:</strong><br>
        <?php if (isset($_COOKIE['firstname_30'])): ?>
            First: <?php echo htmlspecialchars($_COOKIE['firstname_30']); ?> | 
            Middle: <?php echo htmlspecialchars($_COOKIE['middlename_30']); ?> | 
            Last: <?php echo htmlspecialchars($_COOKIE['lastname_30']); ?>
        <?php else: ?>
            Cookies have expired or are not yet created.
        <?php endif; ?>
    </div>
</div>

</body>
</html>