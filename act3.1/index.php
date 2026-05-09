<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        table {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid black;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php 
    $profile = array(
        array("No.1", "John Doe", "<img src='profile.png' alt='Profile Picture'>", "20", "January 20, 2000", "0923456789"),
        array("No.2", "Jane Doe", "<img src='profile.png' alt='Profile Picture'>", "22", "February 15, 1998", "0912345678"),
        array("No.3", "Jim Doe", "<img src='profile.png' alt='Profile Picture'>", "25", "March 10, 1995", "0901234567"),
        array("No.4", "Jack Rex", "<img src='profile.png' alt='Profile Picture'>", "30", "April 5, 1990", "0890123456"),
        array("No.5", "Jill Smith", "<img src='profile.png' alt='Profile Picture'>", "28", "May 12, 1992", "0880123456"),
        array("No.6", "Joe Black", "<img src='profile.png' alt='Profile Picture'>", "35", "June 18, 1985", "0870123456"),
        array("No.7", "Jenny White", "<img src='profile.png' alt='Profile Picture'>", "27", "July 25, 1993", "0860123456"),
        array("No.8", "Jackie Brown", "<img src='profile.png' alt='Profile Picture'>", "32", "August 30, 1988", "0850123456"),
        array("No.9", "James Green", "<img src='profile.png' alt='Profile Picture'>", "29", "September 12, 1994", "0840123456"),
        array("No.10", "Jessica Blue", "<img src='profile.png' alt='Profile Picture'>", "26", "October 20, 1996", "0830123456")
    );
    ?>
    <table>
        <th>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Image</td>
                <td>Age</td>
                <td>Date of Birth</td>
                <td>Contact</td>
            </tr>
        </th>
        <tbody>
            <?php foreach($profile as $row): ?>
                <tr>
                    <?php foreach($row as $cell): ?>
                        <td><?php echo $cell; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>
</html>