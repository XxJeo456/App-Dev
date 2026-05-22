<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formula Table</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f3bebe;
        }

        table {
            margin: 20px auto;
            padding: 20px;
            border-collapse: collapse;
            border: 1px solid lightgray;
            background-color: white;
            drop-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        th, td {
            padding: 10px;
            border: 1px solid lightgray;
            text-align: left;
            font-family: sans-serif;
        }

        th {
            background-color: #beedf3;
        }
    </style>
</head>
<body>
    <?php
        $numb1 = 5;
        $length = 10;
        $width = 5;
        $height = 2;
        $radius = 20;
        $pi = 3.14;

        function cube($numb1) {
            return $numb1 * $numb1 * $numb1;
        }

        function rightRectangularPrism($length, $width, $height){
            return $length * $width * $height;
        }

        function cylinder($pi, $radius, $height){
            return $pi * ($radius * $radius) * $height;
        }

        function pyramind($length, $width, $height){
            return (1/3) * $length * $width * $height;
        }

        function sphere($pi, $radius){
            return (4/3) * $pi * ($radius * $radius * $radius);
        }
    ?>
    <table>
        <tr>
            <th>Shape</th>
            <th>Value</th>
            <th>Formula</th>
            <th>Result</th>
        </tr>
        <tr>
            <td>Cube</td>
            <td><?php echo $numb1; ?></td>
            <td>side³</td>
            <td><?php echo cube($numb1); ?></td>
        </tr>
        <tr>
            <td>Right Rectangular Prism</td>
            <td><?php echo $length; ?> × <?php echo $width; ?> × <?php echo $height; ?></td>
            <td>length × width × height</td>
            <td><?php echo rightRectangularPrism($length, $width, $height); ?></td>
        </tr>
        <tr>
            <td>Cylinder</td>
            <td><?php echo $radius; ?> × <?php echo $height; ?></td>
            <td>π × radius² × height</td>
            <td><?php echo cylinder($pi, $radius, $height); ?></td>
        </tr>
        <tr>
            <td>Pyramind</td>
            <td><?php echo $length; ?> × <?php echo $width; ?> × <?php echo $height; ?></td>
            <td>(1/3) × length × width × height</td>
            <td><?php echo pyramind($length, $width, $height); ?></td>
        </tr>
        <tr>
            <td>Sphere</td>
            <td><?php echo $radius; ?></td>
            <td>(4/3) × π × radius³</td>
            <td><?php echo sphere($pi, $radius); ?></td>
        </tr>
    </table>
</body>
</html>