<?php
session_start();

if (isset($_POST['send_colors'])) {
    $_SESSION['fav_colors'] = [
        $_POST['color1'],
        $_POST['color2'],
        $_POST['color3'],
        $_POST['color4'],
        $_POST['color5']
    ];
    
    header("Location: ResultColors.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enter Favorite Colors</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="table-container">
    <form action="index.php" method="post">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Enter your favorite colors</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><label>Favorite Color 1</label></td>
                    <td><input type="text" name="color1" placeholder="e.g. Red" required></td>
                </tr>
                <tr>
                    <td><label>Favorite Color 2</label></td>
                    <td><input type="text" name="color2" placeholder="e.g. Yellow" required></td>
                </tr>
                <tr>
                    <td><label>Favorite Color 3</label></td>
                    <td><input type="text" name="color3" placeholder="e.g. Orange" required></td>
                </tr>
                <tr>
                    <td><label>Favorite Color 4</label></td>
                    <td><input type="text" name="color4" placeholder="e.g. Violet" required></td>
                </tr>
                <tr>
                    <td><label>Favorite Color 5</label></td>
                    <td><input type="text" name="color5" placeholder="e.g. Blue" required></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" name="send_colors" class="btn-submit">Send Colors</button>
    </form>
</div>

</body>
</html>