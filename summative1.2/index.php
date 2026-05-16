<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
    <style>
        * {
            margin: 0;
            padding 0;
        }

        body {
            font-family: Arial;
            background-color: lightgray;
        }

        .container {
            max-width: 300px;
            min-height: 100%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid black;
            border-radius: 5px;
            background-color: white;
        }

        h1 {
            margin-bottom: 5px;
        }

        table {
            margin: auto;
            border-collapse: auto;
        }

        td {
            width: 10px;
            height: 10px;
            border: 1px solid black;
            text-align: center;
        }

        .odd {
            background-color: lightblue
        }

        .even {
            background-color: lightyellow;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Multiplication Table</h1>

        <table>
            <?php 
                for($row = 1; $row <=10; $row++) {

                echo"<tr>";

                for($col = 1; $col <=10; $col++){
                    $answer = $row * $col;
                    
                    if (($row + $col) % 2 == 0) {
                        $class = "even";
                    } else {
                        $class = "odd";
                    }
                    echo"<td class='$class'>$answer</td>";
                }
    
                echo"</tr>";
                }  
            ?>
        </table>
    </div>
</body>
</html>