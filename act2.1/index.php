<!DOCTYPE html>
<html>
<head>
    <title>Length Converter</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            text-align: center;
            padding: 50px;
            background: rgba(0, 0, 240, 0.55);
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: auto;
            box-shadow: 0 0 10px gray;
        }
        input, select, button {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
        }
        h2 {
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Length Converter</h2>

    <form method="post">
        <input type="number" name="value" placeholder="Enter value" required>

        <select name="from">
            <option value="meter">Meter</option>
            <option value="centimeter">Centimeter</option>
            <option value="kilometer">Kilometer</option>
            <option value="inch">Inch</option>
        </select>

        <select name="to">
            <option value="meter">Meter</option>
            <option value="centimeter">Centimeter</option>
            <option value="kilometer">Kilometer</option>
            <option value="inch">Inch</option>
        </select>

        <button type="submit" name="convert">Convert</button>
    </form>

    <?php
    if(isset($_POST['convert'])) {
        $value = $_POST['value'];
        $from = $_POST['from'];
        $to = $_POST['to'];

        if($from == "meter") {
            $meters = $value;
        } elseif($from == "centimeter") {
            $meters = $value / 100; 
        } elseif($from == "kilometer") {
            $meters = $value * 1000;
        } elseif($from == "inch") {
            $meters = $value * 0.0254;
        }

        if($to == "meter") {
            $result = $meters;
        } elseif($to == "centimeter") {
            $result = $meters * 100; 
        } elseif($to == "kilometer") {
            $result = $meters / 1000; 
        } elseif($to == "inch") {
            $result = $meters / 0.0254; 
        }

        echo "<h3>Result: " . round($result, 4) . " $to</h3>";
    }
    ?>
</div>

</body>
</html>