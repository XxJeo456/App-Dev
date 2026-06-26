<?php
    session_start();
    $_SESSION['num1'] = rand(1,20);
    $_SESSION['num2'] = rand(1,20);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        form, h1{
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>
<body>
    <h1>Register</h1>
    <form method="POST" action="validation.php">
        <label for="fullName"></label>
        <input type="text" name="fullName" id="fullName" placeholder="Full Name" required>
        <label for="userName"></label>
        <input type="text" name="userName" id="userName" placeholder="User Name" required>
        <label for="email"></label>
        <input type="text" name="email" id="email" placeholder="Email" required>
        <label for="password"></label>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <label for="captcha">Captcha: What is <?php echo $_SESSION['num1'] , "+" ,$_SESSION['num2']?></label>
        <input type="text" name="captcha" id="captcha" required>
        <input type="submit" name="submit">
    </form>
</body>
</html>