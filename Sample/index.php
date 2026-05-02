<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $score = 86;
        $number = 2;

        if ($score >= 80 && $score <= 91){
            echo "<h1>Your score is between 80 and 91.</h1>";
        } else if ($score > 91){
            echo "<h1>Your score is above 90.</h1>";
        } else {
            echo "<h1>Your score is below 81.</h1>";
        }

        switch ($number) {
            case 1:
                echo "<h1>January</h1>";
                break;
            case 2:
                echo "<h1>February</h1>";
                break;
            case 3:
                echo "<h1>March</h1>";
                break;
            case 4:
                echo "<h1>April</h1>";
                break;
            default:
                echo "<h1>Error, Invalid input</h1>";
        }

    ?>
</body>
</html>