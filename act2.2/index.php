<!DOCTYPE html>
<html>
<head>
    <title>Grade Ranking</title>

    <style>
        body{
            background: rgba(0, 0, 240, 0.55);
            font-family: Times New Roman;
        }

        .container{
            width: 350px;
            border: 1px solid green;
            border-radius: 10px;
            margin: 20px auto;
            background-color: #eeeeee;
            text-align: center;
            padding: 20px;
        }

        .input-box{
            width: 90%;
            padding: 8px;
            margin: 5px 0;
        }

        .btn{
            padding: 8px 15px;
            margin-top: 10px;
            cursor: pointer;
        }

        .name-box{
            width: 300px;
            border: 1px solid #99cc66;
            margin: 20px auto;
            padding: 10px;
            font-size: 18px;
            background: white;
        }

        .result-container{
            margin-top: 20px;
        }

        .box{
            width: 90px;
            height: 90px;
            border: 1px solid #99cc66;
            border-radius: 10px;
            display: inline-block;
            margin: 10px;
            padding-top: 20px;
            font-size: 16px;
            background: white;
        }
    </style>
</head>

<body>

<div class="container">

    <form method="POST">
        <input type="text" name="name" class="input-box" placeholder="Enter Full Name" required><br>
        <input type="number" name="grade" class="input-box" placeholder="Enter Grade (0-100)" required><br>
        <input type="submit" value="Check Rank" class="btn">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $name = $_POST['name'];
        $grade = $_POST['grade'];

        if($grade >= 93 && $grade <= 100){
            $rank = "A";
        }
        elseif($grade >= 90){
            $rank = "A-";
        }
        elseif($grade >= 87){
            $rank = "B+";
        }
        elseif($grade >= 83){
            $rank = "B";
        }
        elseif($grade >= 80){
            $rank = "B-";
        }
        elseif($grade >= 77){
            $rank = "C+";
        }
        elseif($grade >= 73){
            $rank = "C";
        }
        elseif($grade >= 70){
            $rank = "C-";
        }
        elseif($grade >= 67){
            $rank = "D+";
        }
        elseif($grade >= 63){
            $rank = "D";
        }
        elseif($grade >= 60){
            $rank = "D-";
        }
        else{
            $rank = "F";
        }

        echo "
        <div class='name-box'>
            Name: $name
        </div>

        <div class='result-container'>
            <div class='box'>
                Rank:<br><br> $rank
            </div>

            <div class='box'>
                Grade:<br><br> $grade
            </div>
        </div>
        ";
    }
    ?>

</div>

</body>
</html>