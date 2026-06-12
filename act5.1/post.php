<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Info - POST Method</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="form-container">
    <div class="nav-container">
        <a href="index.php" class="btn-toggle nav-to-get">&larr; Switch to GET Method</a>
    </div>

    <h2>Personal Information (POST)</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="form-group"><label>First Name</label><input type="text" name="firstname" required></div>
        <div class="form-group"><label>Middle Name</label><input type="text" name="middlename"></div>
        <div class="form-group"><label>Last Name</label><input type="text" name="lastname" required></div>
        <div class="form-group"><label>Date of Birth</label><input type="date" name="dob" required></div>
        <div class="form-group"><label>Address</label><input type="text" name="address" required></div>
        <input type="submit" name="submit" value="Submit" class="post-btn">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        echo "<div class='result post-result'>";
        echo "<h3>Submitted Data (via POST):</h3>";
        echo "<strong>First Name:</strong> " . htmlspecialchars($_POST['firstname']) . "<br>";
        echo "<strong>Middle Name:</strong> " . htmlspecialchars($_POST['middlename']) . "<br>";
        echo "<strong>Last Name:</strong> " . htmlspecialchars($_POST['lastname']) . "<br>";
        echo "<strong>Date of Birth:</strong> " . htmlspecialchars($_POST['dob']) . "<br>";
        echo "<strong>Address:</strong> " . htmlspecialchars($_POST['address']) . "<br>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>