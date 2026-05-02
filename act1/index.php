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
            display: flex;
            align-items: center;
            background-color: lightgray;
            padding: 10px;
            border: 1px solid black;
            border-radius: 5px;

            p {
                font-size: 13px;
                margin: 3px 0;
            }

            img {
                margin-left: auto;
                width: 150px;
                height: 150px;
                border-radius: 50%;
                margin-top: 10px;
                padding-right: 20px;
            }
        }

        hr {
            border: 1px solid red;
        }

        h1 {
            color: white;
        }

        h2 {
            font-size: 30px;
        }

        p {
            margin-left: 20px;
        }

        .main {
            margin-top: 10px;
            display: grid;
            grid-template-columns: 2fr 1fr;
            grid-template-rows: auto auto auto;
            grid-template-areas: 
                "profile other-info"
                "experience other-info"
                "education other-info";
            column-gap: 5%;
        }

        .profile, .experience, .education {
            border-bottom: 2px solid black;
            padding: 20px;
        }

        .profile {
            grid-area: profile;
        }
        
        .experience {
            grid-area: experience;
        }

        .education {
            grid-area: education;
        }

        .other-info {
            grid-area: other-info;
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
        $contactNO = "09123456789";
        $email = "jeffreyplata086@gmail.com";

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
        $programmingLanguages = "HTML, CSS, JavaScript, Python, PHP";

        $person1 = "John Doe";
        $person1Contact = "09123456789";
        $person2 = "Jane Smith";
        $person2Contact = "0987654321";
    ?>

    <div class="container">
        <div class="main-info">
            <div class="header">
                <div class="headerText">
                    <h1><?= $name ?></h1>
                    <p><?= $job ?></p>
                    <p><?= "Contact No: $contactNO" ?></p>
                    <p><?= "Email: $email" ?></p>    
                </div>
                <img src="profile.png" alt="Profile Picture">
            </div>
            <hr>
            <div class="main">
                <div class="profile">
                    <h2><?php echo "Profile"; ?></h2>
                    <p><?php echo "I am a aspring web developer with a passion for creating dynamic and 
                    user-friendly websites.<br>
                    I have experience in HTML, CSS, JavaScript, Python, and PHP. <br>
                    Eager to learn more about web development and contribute to exciting projects."; ?></p>
                </div>
                <div class="other-info">
                    <h2><?php echo "Other Information"; ?></h2>
                    <h3><?php echo "Languages: " ?></h3>
                    <p><?= $languages ?></p>
                    <h3><?php echo "Hobbies: " ?></h3>
                    <p><?= $hobbies ?></p>
                    <h3><?php echo "Programming Languages: " ?></h3>
                    <p><?= $programmingLanguages ?></p>
                    <h3><?php echo "References: " ?></h3>
                    <ul>
                        <li><?= "$person1 - $person1Contact" ?></li>
                        <li><?= "$person2 - $person2Contact" ?></li>
                    </ul>
                </div>
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
</body>
</html>
