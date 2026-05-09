<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USING USER DEFINED FUNCTION</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .container {
            width: 80%;
            margin: auto;
            text-align: center;
            padding: 20px;
            margin: auto;
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
    <form method="post">
        <input type="number" name="num1" placeholder="Enter first number" required>
        <input type="number" name="num2" placeholder="Enter second number" required>
        <input type="number" name="num3" placeholder="Enter third number" required>
        <button type="submit" name="calculate">Calculate</button>
    </form>

    <?php
    if (isset($_POST['calculate'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $num3 = $_POST['num3'];

        function addition($a, $b, $c) {
            return $a + $b + $c;
        }

        function subtraction($a, $b, $c) {
            return $a - $b - $c;
        }

        function multiplication($a, $b, $c) {
            return $a * $b * $c;
        }

        function division($a, $b, $c) {
            if ($b != 0 && $c != 0) {
                return $a / $b / $c;
            } else {
                return "Division by zero error";
            }
        }

        echo "<h2>Results:</h2>";
        echo "<p>Addition: " . addition($num1, $num2, $num3) . "</p>";
        echo "<p>Subtraction: " . subtraction($num1, $num2, $num3) . "</p>";
        echo "<p>Multiplication: " . multiplication($num1, $num2, $num3) . "</p>";
        echo "<p>Division: " . division($num1, $num2, $num3) . "</p>";
    }
    ?>
</body>
</html>