<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta name=viewport content="width=devide-width, initial-scale=1">
    <title>PROJECT</title>
    <link rel="stylesheet" href="style6.css">
</head>

<body>
    <header id="header">
        <nav class="nav">
            <div class="nav-items">
                <a href=#>
                    <img id="main-logo" src="https://www.flaticon.com/svg/static/icons/svg/35/35842.svg" alt="logo">
                </a>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href=#>About Me</a></li>
                    <li><a href=#>Contact</a></li>
                </ul>
                <!-- <div class="nav-spacer"> -->

            </div>
            <div class="nav-login">
                <?php

                if (isset($_SESSION['userId'])) {
                    echo '<form action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit">Log Out</button>
                   </form>';
                } else {
                    echo '<ul> <li><a href="login.php"> Login </a></li> <li><a href="signup.php"> Create an account </a></li></ul>';
                }

                ?>







            </div>
        </nav>
    </header>
</body>