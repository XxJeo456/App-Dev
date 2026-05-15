<?php
require_once 'functions.php';

$names = [
    "john doe",
    "alice smith",
    "michael jordan",
    "sarah lee",
    "daniel craig",
    "emma watson",
    "chris evans",
    "olivia rodrigo",
    "james bond",
    "harry potter",
    "tony stark",
    "peter parker",
    "bruce wayne",
    "clark kent",
    "diana prince",
    "natasha romanoff",
    "steve rogers",
    "wanda maximoff",
    "scott lang",
    "loki odinson"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP String Functions</title>

    <link rel="stylesheet" href="css/index.css">
</head>

<body>

<h1>PHP String Function Task</h1>

<div class="container">

<?php foreach ($names as $name) { ?>

    <div class="card">

        <h2><?php echo ucfirst($name); ?></h2>

        <p><b>Characters:</b> <?php echo countCharacters($name); ?></p>

        <p><b>First Letter Uppercase:</b> <?php echo upperFirstCharacter($name); ?></p>

        <p><b>Vowels Replaced:</b> <?php echo replaceVowels($name); ?></p>

        <p><b>Position of 'a':</b>
            <?php
                $pos = findLetterA($name);
                echo ($pos !== false) ? $pos : "Not Found";
            ?>
        </p>

        <p><b>Reverse:</b> <?php echo reverseName($name); ?></p>

    </div>

<?php } ?>

</div>

</body>
</html>