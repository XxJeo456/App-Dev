<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['set_cookies'])) {
    $fn = $_POST['firstname'];
    $mn = $_POST['middlename'];
    $ln = $_POST['lastname'];

    setcookie("firstname_10", $fn, time() + 10, "/");
    setcookie("middlename_10", $mn, time() + 10, "/");
    setcookie("lastname_10", $ln, time() + 10, "/");

    setcookie("firstname_20", $fn, time() + 20, "/");
    setcookie("middlename_20", $mn, time() + 20, "/");
    setcookie("lastname_20", $ln, time() + 20, "/");

    setcookie("firstname_30", $fn, time() + 30, "/");
    setcookie("middlename_30", $mn, time() + 30, "/");
    setcookie("lastname_30", $ln, time() + 30, "/");

    header("Location: index.php");
    exit();
}
?>