<?php 
    require_once 'process_register.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dog Register</title>
    <style>
        body { 
            font-family: 'Arial', sans-serif; 
            margin: 0; 
            padding: 0;
            color: #333; 
        }
        .form-container { 
            margin: 50px auto;
            padding: 20px;
            width: 320px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .title { 
            font-size: 24px; 
            margin-bottom: 10px; 
            font-weight: bold; 
        }
        label { 
            display: block; 
            font-size: 14px; 
            margin-top: 8px; 
            color: #555; 
        }
        input[type="text"] { 
            width: 100%; 
            padding: 6px; 
            margin-top: 4px; 
            box-sizing: border-box; 
            border: 1px solid #777; 
            font-size: 14px; 
        }
        input[type="submit"] { 
            width: 100%; 
            padding: 8px; 
            margin-top: 20px; 
            background-color: #e1e1e1; 
            border: 1px solid #777; 
            cursor: pointer; 
            font-size: 14px; 
        }
        input[type="submit"]:hover { 
            background-color: #d0d0d0; 
        }
        .nav-link { display: inline-block; 
        margin-top: 15px; 
        font-size: 13px; 
        color: #0066cc; 
        text-decoration: none; 
    }
        .message { 
            font-family: Arial; 
            font-size: 14px; 
            margin-bottom: 10px; 
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1 class="title">Dog Information</h1>
        
        <?php if (!empty($message)): ?>
            <div class="message" style="color: <?php echo $msg_color; ?>;">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form action="index.php" method="POST">
            <label>Name</label>
            <input type="text" name="d_name" required placeholder="e.g., Prince">

            <label>Breed</label>
            <input type="text" name="d_breed" required placeholder="e.g., Chow Chow">

            <label>Age</label>
            <input type="text" name="d_age" required placeholder="e.g., 4 years old">

            <label>Address</label>
            <input type="text" name="d_add" required placeholder="e.g., Bulacan">

            <label>Color</label>
            <input type="text" name="d_color" required placeholder="e.g., Brown">

            <label>Height</label>
            <input type="text" name="d_height" required placeholder="e.g., 2 feet">

            <label>Weight</label>
            <input type="text" name="d_weight" required placeholder="e.g., 4 kilos">

            <input type="submit" value="save">
        </form>
        
        <a class="nav-link" href="DogView.php">View Registered Dogs &rarr;</a>
    </div>

</body>
</html>