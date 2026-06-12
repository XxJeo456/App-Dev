<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Favorite Colors Result</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="result-container">
    <h2>Session Color Results</h2>
    
    <?php
    if (isset($_SESSION['fav_colors']) && is_array($_SESSION['fav_colors'])) {
        $counter = 1;
        foreach ($_SESSION['fav_colors'] as $color) {
            $cleanColor = htmlspecialchars($color);
            echo "<div class='color-item'>";
            echo "My Favorite Color " . $counter . ": " . $cleanColor;
            echo "</div>";
            $counter++;
        }
    } else {
        echo "<p style='color: #dc2626;'>No configuration settings were found stored inside your web session. Please go back and submit colors.</p>";
    }
    ?>
    
    <a href="index.php" class="back-link">&larr; Change Selection</a>
</div>

</body>
</html>