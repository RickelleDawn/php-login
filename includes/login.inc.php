<?php

if (isset($_POST['login-submit'])) {

    require "dbh.inc.php";


    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    if (empty($email) || empty($pwd)) {
        header("Location: ../login.php?error=emptyfields&email=" . $email);
        exit();
    } else {

        $sql = "SELECT * FROM users WHERE emailUsers=?";
        $statement = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($statement, $sql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($statement, "s", $email);
            mysqli_stmt_execute($statement);
            $results = mysqli_stmt_get_result($statement);
            if ($row = mysqli_fetch_assoc($results)) {
                if (password_verify($pwd, $row["pwdUsers"])) {
                    session_start();
                    $_SESSION['userId'] = $row["idUsers"];
                    $_SESSION['userFN'] = $row["FName"];
                    $_SESSION['userLN'] = $row["LName"];
                    $_SESSION['userEmail'] = $row["emailUsers"];


                    header("Location: ../index.php?login=success");
                    exit();
                } else {
                    header("Location: ../login.php?error=wrongpwd&email=" . $email);
                    exit();
                }
            } else {
                header("Location: ../login.php?error=noAccountFound&email=" . $email);
                exit();
            }
        }
    }


    mysqli_stmt_close($statement);
    mysqli_close($conn);
} else {
    header("Location: ../login.php");
    exit();
}
