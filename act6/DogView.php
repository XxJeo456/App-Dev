<?php
require_once 'config.php';

$sql = "SELECT * FROM dogs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dog View</title>
    <style>
        body { 
            font-family: 'Arial', sans-serif; 
            margin: 0;
            padding: 0;
            background-color: #b9f5f7ff;
        }
        .container { 
            width: 600px;
            margin: 50px auto;
            padding: 20px;
            width: 320px; 
            border-radius: 20px;
            background-color: #8df1f5ff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dog-box { 
            width: 90%; 
            border: 1px solid #333; 
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px; 
            line-height: 1.6; 
            font-size: 14px; 
            transition: all 0.5s ease;
        }
        .dog-box:hover {
            text-align: center;
            text-decoration: underline;
            border-radius: 15px;
        }
        .dog-count { 
            font-weight: normal; 
            margin-bottom: 4px; 
        }
        .nav-link { 
            display: inline-block; 
            margin-bottom: 20px; 
            font-size: 13px; 
            color: #0066cc; 
            text-decoration: none; 
            transition: all 0.2s ease;
        }
        .nav-link:hover { 
            padding: 2px 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
            text-decoration: underline;
        }
        .nav-link:active { 
            padding: 0;
            color: red;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <a class="nav-link" href="index.php">&larr; Back to Registration (index.php)</a>

        <?php if ($result && $result->num_rows > 0): ?>
            <?php $counter = 1; ?>
            <?php while($row = $result->fetch_assoc()): ?>

                <div class="dog-box">
                    <div class="dog-count">Dog <?php echo $counter; ?></div>
                    <strong>Name:</strong> <?php echo htmlspecialchars($row["d_name"]); ?><br>
                    <strong>Breed:</strong> <?php echo htmlspecialchars($row["d_breed"]); ?><br>
                    <strong>Age:</strong> <?php echo htmlspecialchars($row["d_age"]); ?><br>
                    <strong>Address:</strong> <?php echo htmlspecialchars($row["d_add"]); ?><br>
                    <strong>Color:</strong> <?php echo htmlspecialchars($row["d_color"]); ?><br>
                    <strong>Height:</strong> <?php echo htmlspecialchars($row["d_height"]); ?><br>
                    <strong>Weight:</strong> <?php echo htmlspecialchars($row["d_weight"]); ?><br>
                </div>

                <?php $counter++; ?>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No records found. Head back to create your 10 entries!</p>
        <?php endif; ?>

        <?php $conn->close(); ?>
    </div>
</body>
</html>