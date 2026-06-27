<?php 

    $conn = mysqli_connect("Localhost", "root", "", "tc22_db");
     
    if(!$conn){
        echo "Not connected to the database.";
    } else {
        if(isset($_POST['submit'])){
            $data1 = $_POST['d_userName'];
            $data2 = $_POST['d_email'];

            $sql = "INSERT INTO users (d_userName, d_email) VALUES ('$data1','$data2')";
            if(mysqli_query($conn, $sql)){
                header("Location: db_test.php?success=1");
                exit();
            } else {
                echo "Error " . mysqli_error($conn);
            }

            $r = mysqli_query($conn, "SELECT * FROM users");

            while($row = mysqli_fetch_assoc($r)){
                    // print_r($row);
                    echo "Id : " . $row['id'];
                    echo "User Name : "  . $row['d_userName'];
                    echo "Email : " . $row['d_email'];
                }

            echo total_rows($conn);

        }
    }
?>
    <style>
        form, h1{
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }
    </style>
    <h1>Register</h1>

    <?php 
        if (isset($_GET['success'])) {
            echo "<script>alert('data added successfully');</script>";
        }
    ?>

    <form method="POST" action="db_test.php">
        <input type="text" name="d_userName" id="userName" placeholder="User Name" required>
        <input type="text" name="d_email" id="email" placeholder="Email" required>
        <input type="submit" name="submit">
    </form>