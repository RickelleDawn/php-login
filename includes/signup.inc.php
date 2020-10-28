<?php

if (isset($_POST['signupSubmit'])) {

    require "dbh.inc.php";

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdCheck = $_POST['pwdCheck'];

    if (empty($firstName) || empty($lastName) || empty($email) || empty($pwd) || empty($pwdCheck)) {
        header("Location: ../signup.php?error=emptyfields&firstName=" . $firstName .
            "&lastName=" . $lastName . "&email=" . $email);

        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidemail&firstName=" . $firstName .
            "&lastName=" . $lastName);

        exit();
    } else if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName)) {
        header("Location: ../signup.php?error=symbolsInName&firstName=" . $firstName .
            "&lastName=" . $lastName . "&email=" . $email);

        exit();
    } else if (strlen($pwd) < 8) {
        header("Location: ../signup.php?error=passwordTooShort&firstName=" . $firstName .
            "&lastName=" . $lastName . "&email=" . $email);

        exit();
    } else if ($pwd !== $pwdCheck) {
        header("Location: ../signup.php?error=passwordCheck&firstName=" . $firstName .
            "&lastName=" . $lastName . "&email=" . $email);

        exit();
    } else {

        $sql = "SELECT emailUsers FROM users WHERE emailUsers=?";
        $statement = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($statement, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($statement, "s", $email);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            $results = mysqli_stmt_num_rows($statement);

            if ($results > 0) {
                header("Location: ../signup.php?error=activeAccount&firstName=" . $firstName .
                    "&lastName=" . $lastName . "&email=" . $email);
                exit();
            } else {
                $sql = "INSERT INTO users (FName, LName, emailUsers, pwdUsers) VALUES (?, ?, ?, ?)";
                $statement = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($statement, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                } else {
                    $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($statement, "ssss", $firstName, $lastName, $email, $hashPwd);
                    mysqli_stmt_execute($statement);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($statement);
    mysqli_close($conn);
} else {
    header("Location: ../signup.php");
    exit();
}
