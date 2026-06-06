<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="str_data" value="">
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php 
        echo "<p>Data from the form that you submitted</p>";
        echo "Value : ";
        if(isset($_POST["submit"])){
            echo "$_POST[str_data]";
        }
    ?>
</body>
</html>