<?php
require "header.php"
?>



<main>
    <div class="signup-bg">
        <div class="wrapper">
            <div class="log-in-form" style="height:auto;">
                <h1>Sign up</h1>
                <?php

                $emptyform = '<form action="includes/signup.inc.php" method="post">
            <input type="text" name="firstName" placeholder="First Name" value="">
            <input type="text" name="lastName" placeholder="Last Name" value="">
            <input type="text" name="email" placeholder="Email" value="">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwdCheck" placeholder="Enter password again">
            <button type="submit" name="signupSubmit">REGISTER</button>';



                if (isset($_GET['error'])) {
                    if (isset($_GET['email'])) {
                        $em = $_GET['email'];
                    } else {
                        $em = '';
                    }
                    $errorform = '<form action="includes/signup.inc.php" method="post">
                            <input type="text" name="firstName" placeholder="First Name" value="' . $_GET['firstName'] . '">
                            <input type="text" name="lastName" placeholder="Last Name" value="' . $_GET["lastName"] . '">
                            <input type="text" name="email" placeholder="Email" value="' . $em . '">
                            <input type="password" name="pwd" placeholder="Password">
                            <input type="password" name="pwdCheck" placeholder="Enter password again">
                            <button type="submit" name="signupSubmit">REGISTER</button>
                            </form>';

                    if ($_GET['error'] == "emptyfields") {
                        echo "<p class='sign-up-error'> Fill in all fields!</p> <br>" . $errorform;
                    } else if ($_GET['error'] == "sqlerror") {
                        echo "<p class='sign-up-error'> We're sorry, there seems to be a problem on our end.</p> <br>" . $errorform;
                    } else if ($_GET['error'] == "symbolsInName") {
                        echo "<p class='sign-up-error'> Name cannot contain special characters </p> <br>" . $errorform;
                    } else if ($_GET['error'] == "invalidemail") {
                        echo "<p class='sign-up-error'> Please enter a valid email. </p> <br>" . $errorform;
                    } else if ($_GET['error'] == "activeAccount") {
                        echo "<p class='sign-up-error'> The email you have entered is already registered to an account. Click <a href='login.php'>here</a> to log in.</p> <br>" . $errorform;
                    } else if ($_GET['error'] == "passwordTooShort") {
                        echo "<p class='sign-up-error'> Please enter a password that is at least 8 characters long. </p> <br>" . $errorform;
                    } else if ($_GET['error'] == "passwordCheck") {
                        echo "<p class='sign-up-error'> Your passwords did not match, please try again. </p> <br>" . $errorform;
                    }
                } else if (isset($_GET['signup'])) {
                    if ($_GET['signup'] == "success") {
                        echo "<p class='sign-up-success'> Registration successful! </p>" . $emptyform;
                    }
                } else {
                    echo "<p>Please fill out the fields below to register an account.</p>" . $emptyform;
                }

                ?>
                <!-- <form action="includes/signup.inc.php" method="post">
                <input type="text" name="firstName" placeholder="First Name" value="">
                <input type="text" name="lastName" placeholder="Last Name" value="">
                <input type="text" name="email" placeholder="Email" value="">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwdCheck" placeholder="Enter password again">
                <button type="submit" name="signupSubmit">Sign Up</button>
            </form> -->
            </div>
        </div>
    </div>
</main>



<?php
require "footer.php"
?>