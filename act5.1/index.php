<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Info - GET Method</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="form-container">
    <div class="nav-container">
        <a href="post.php" class="btn-toggle nav-to-post">Switch to POST Method &rarr;</a>
    </div>

    <h2>Personal Information (GET)</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
        <div class="form-group"><label>First Name</label><input type="text" name="firstname" required></div>
        <div class="form-group"><label>Middle Name</label><input type="text" name="middlename"></div>
        <div class="form-group"><label>Last Name</label><input type="text" name="lastname" required></div>
        <div class="form-group"><label>Date of Birth</label><input type="date" name="dob" required></div>
        <div class="form-group"><label>Address</label><input type="text" name="address" required></div>
        <input type="submit" name="submit" value="Submit" class="get-btn">
    </form>
    
    <?php
    if (isset($_GET['submit'])) {
        echo "<div class='result get-result'>";
        echo "<h3>Submitted Data (via GET):</h3>";
        echo "<strong>First Name:</strong> " . htmlspecialchars($_GET['firstname']) . "<br>";
        echo "<strong>Middle Name:</strong> " . htmlspecialchars($_GET['middlename']) . "<br>";
        echo "<strong>Last Name:</strong> " . htmlspecialchars($_GET['lastname']) . "<br>";
        echo "<strong>Date of Birth:</strong> " . htmlspecialchars($_GET['dob']) . "<br>";
        echo "<strong>Address:</strong> " . htmlspecialchars($_GET['address']) . "<br>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>