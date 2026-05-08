<!DOCTYPE html>
<html>
<head>
    <title>Two-Digit Combinations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: rgba(0, 0, 240, 0.55);
            padding: 20px;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="number"] {
            padding: 8px;
            width: 80px;
            margin: 5px;
        }

        button {
            padding: 8px 15px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .output {
            font-size: 18px;
            line-height: 1.8;
            word-wrap: break-word;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Two-Digit Combinations Generator</h2>

    <form method="post">
        <input type="number" name="start" placeholder="Start (0-99)" min="0" max="99" required>
        <input type="number" name="end" placeholder="End (0-99)" min="0" max="99" required>
        <br>
        <button type="submit">Generate</button>
    </form>

    <div class="output">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $start = $_POST['start'];
            $end = $_POST['end'];

            if ($start > $end) {
                echo "Start value must be less than or equal to End value.";
            } else {
                for ($i = $start; $i <= $end; $i++) {
                    echo str_pad($i, 2, "0", STR_PAD_LEFT);

                    if ($i < $end) {
                        echo ", ";
                    }
                }
            }
        }
        ?>
    </div>
</div>

</body>
</html>