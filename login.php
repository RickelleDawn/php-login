<?php

require "header.php"


?>


<html>
<div class="login-bg">
    <div class="wrapper">
        <div class="log-in-form">
            <h1>Welcome back!</h1>

            <?php

            $emptyform = '<p>Enter your account information to continue.</p><form action="includes/login.inc.php" method="post">
        <input type="text" name="email" placeholder="Enter email">
        <input type="password" name="pwd" placeholder="Enter password">
        <button type="submit" name="login-submit">LOGIN</button>
        </form>';

            if (isset($_GET['error'])) {

                if (isset($_GET['email'])) {
                    $em = $_GET['email'];
                } else {
                    $em = '';
                }

                $errorform = '<form action="includes/login.inc.php" method="post">
            <input type="text" name="email" placeholder="Enter email" value="' . $em . '">
            <input type="password" name="pwd" placeholder="Enter password">
            <button type="submit" name="login-submit">LOGIN</button>
            </form>';



                if ($_GET['error'] == 'emptyfields') {
                    echo "<p class='sign-up-error'>Please fill in all fields.</p>" . $errorform;
                } else if ($_GET['error'] == 'wrongpwd') {
                    echo "<p class='sign-up-error'>Please enter the correct password.</p>" . $errorform;
                } else if ($_GET['error'] == 'noAccountFound') {
                    echo "<p class='sign-up-error'>No accounts found using the email address you entered.</p>" . $errorform;
                }
            } else {
                echo $emptyform;
            }


            ?>


        </div>
    </div>
</div>

</html>


<?php

require "footer.php"


?>