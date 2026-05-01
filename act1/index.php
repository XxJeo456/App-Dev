<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Resume </title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            grid-area: profile;
            background-color: lightgray;
            padding: 10px;
            border: 1px solid black;
            border-radius: 5px;

            p {
                font-size: 15px;
            }
        }

        hr {
            border: 1px solid red;
        }

        h1 {
            color: white;
        }

        .main {
            margin-top: 10px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            column-gap: 5%;
        }

        .profile, .experience, .education {
            border-bottom: 2px solid black;
            padding: 20px;
        }

        .other-info {
            background-color: lightblue;
            border: 2px solid black;
            border-radius: 5px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <?php
        $name = "Jeoffrey Lee R. Plata";
        $job = "Web Developer";

        $gradeSchool = "Bethel Lutheran School";
        $highSchool = "St. Joseph School Gagalangin";
        $college = "FEU Institute of Technology";

        $experience1 = "Web Development Intern at XYZ Company (2022)";
        $experience2 = "Freelance Web Developer (2021 - Present)";

        $gradeSchoolYears = "2010 - 2017";
        $highSchoolYears = "2017 - 2023";   
        $collegeYears = "2023 - Present";

        $languages = "English, Filipino";
        $hobbies = "Coding, Reading, Gaming";
        $programmingLanguages = "HTML, CSS, JavaScript, PHP";
    ?>

    <div class="container">
        <div class="main-info">
            <div class="header">
                <h1><?= $name ?></h1>
                <p><?= $job ?></p>
            </div>
            <hr>
            <div class="main">
                <div class="profile">
                    <h2><?php echo "Profile"; ?></h2>
                    <p><?php echo "I am a aspring web developer with a passion for creating dynamic and 
                    user-friendly websites.<br>
                    I have experience in HTML, CSS, JavaScript, and PHP. <br>
                    Eager to learn more about web development and contribute to exciting projects."; ?></p>
                </div>
                <div class="other-info">
                    <h2><?php echo "Other Information"; ?></h2>
                    <ul>
                        <li><?php echo "Languages: $languages"; ?></li>
                        <li><?php echo "Hobbies: $hobbies"; ?></li>
                        <li><?php echo "Programming Languages: $programmingLanguages"; ?></li>
                    </ul>
                </div>
                <div class="body">
                    <div class="experience">
                        <h2><?php echo "Experience"; ?></h2>
                        <ul>
                            <li><?= $experience1 ?></li>
                            <li><?= $experience2 ?></li>
                        </ul>
                    </div>
                    <div class="education">
                        <h2><?php echo "Education"; ?></h2>
                        <ul>
                            <li><?= $gradeSchool ?></li>
                            <p><?= $gradeSchoolYears ?></p>
                            <li><?= $highSchool ?></li>
                            <p><?= $highSchoolYears ?></p>
                            <li><?= $college ?></li>
                            <p><?= $collegeYears ?></p>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>