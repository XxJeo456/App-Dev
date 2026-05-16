<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Account Creation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #ffffffff;
        }

        .container {
            max-width: 500px;
            min-height: 100%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid black;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .form_section {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 20px;
        }

        input, select {
            border: 1px solid black;
            height: 22px;
        }

        input {
            padding: 5px;
        }

        .name-section, .account-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 10px;
        }

        .Basic_info {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        button {
            width: 100%;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #4285f4;
            color: white;
            cursor: pointer;
            transition: background-color 0.6s ease;
        }

        button:hover {
            background-color: #134ca7ff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create a Google Account</h1>

        <div class="form_section">
            <form action="" method="POST">
                <section class="name-section">
                <label for="first-name">First Name:</label>
                <input type="text" id="first-name" name="first-name" placeholder="Enter your first name" required>

                <label for="last-name">Last Name:</label>
                <input type="text" id="last-name" name="last-name" placeholder="Enter your last name" required>
                </section>

                <section class="Basic_info">
                <select name="month" id="month">
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                    <option value="april">April</option>
                    <option value="may">May</option>
                    <option value="june">June</option>
                    <option value="july">July</option>
                    <option value="august">August</option>
                    <option value="september">September</option>
                    <option value="october">October</option>
                    <option value="november">November</option>
                    <option value="december">December</option>
                </select>

                <select name="day" id="day">
                    <?php
                        for ($i = 1; $i <= 31; $i++) {
                            echo "<option value=\"$i\">$i</option>";
                        }
                    ?>
                </select>

                <select name="year" id="year">
                    <?php
                        for ($i = date("Y"); $i >= 1900; $i--) {
                            echo "<option value=\"$i\">$i</option>";
                        }
                    ?>
                </select>

                <select name="gender" id="gender">
                    <option value="male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Rather_not_say">Rather not say</option>
                    <option value="Other">Other</option>
                </select>
                </section>
                    
                <section class="account-info">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </section>

                <button type="submit">Create Account</button>
            </form>
        </div>
    </div>
</body>
</html>