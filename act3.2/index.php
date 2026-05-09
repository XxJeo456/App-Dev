<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Using ARRAYS</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        .container {
            width: 80%;
            margin: auto;
            text-align: center;
            border: 1px solid black;
            border-radius: 20px;
            padding: 20px;
            margin-top: 50px;
            background: rgba(9, 247, 255, 0.30);
            box-shadow: 0 0 10px gray;
        }

        h2 {
            margin-top: 20px;
        }

        h3 {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php
        $numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        
        $sum = 0;
        $product = 1;

        foreach($numbers as $number) {
            $sum += $number;
            $product *= $number;
        }

        $difference = $numbers[0];
        $quotetient = $numbers[0];

        for($i = 1; $i < count($numbers); $i++) {
            $difference -= $numbers[$i];
            if($numbers[$i] != 0) {
                $quotetient /= $numbers[$i];
            }
        }
    ?>
    <h1>Array List: <?php echo implode(", ", $numbers); ?></h1>
    <h2>Addition: <?php echo $sum; ?></h2>
    <h2>Subtraction: <?php echo $difference; ?></h2>
    <h2>Multiplication: <?php echo $product; ?></h2>
    <h2>Division: <?php echo $quotetient; ?></h2>
    </div>
</body>
</html>