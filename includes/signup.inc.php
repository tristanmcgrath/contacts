<?php

if (!isset($_POST['submit'])) {
    header("Location: ../signup.php");
    exit();
} else {

    include_once 'dbh.inc.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //Error handlers
    //Check for empty fields
    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
        header("Location: ../signup.php?signup=empty");
        exit();
    } else {
        //Check for invalid characters
        if (!preg_match("/^[a-zA-z]*$/", $first) || !preg_match("/^[a-zA-z]*$/", $last)) {
            header("Location: ../signup.php?signup=char");
            exit();
        } else {
            //Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?signup=email");
                exit();
            } else {
                //Check if username is taken
                $sql = "SELECT * FROM users WHERE user_uid=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?signup=dberror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $uid);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                        header("Location: ../signup.php?signup=usertaken");
                        exit();
                    } else {
                        //Check if email is already registered
                        $sql = "SELECT * FROM users WHERE user_email=?;";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../signup.php?signup=dberror");
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "s", $email);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            $resultCheck = mysqli_num_rows($result);

                            if ($resultCheck > 0) {
                                header("Location: ../signup.php?signup=emailinuse");
                                exit();
                            } else {
                                //Hash Password
                                $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                                //Insert the user into database
                                $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES (?, ?, ?, ?, ?);";
                                $stmt = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    header("Location: ../index.php?signup=dberror");
                                    exit();

                                } else {
                                    mysqli_stmt_bind_param($stmt, sssss, $first, $last, $email, $uid, $hashedPwd);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: ../index.php?signup=success");
                                    exit();
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
