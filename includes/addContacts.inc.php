<?php

if (!isset($_POST['submit'])) {
    header("Location: ../contacts.php");
    exit();
} else {
    session_start();
    include_once 'dbh.inc.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, preg_replace("/[^0-9,.]/", "", "{$_POST['phone']}"));
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);

    //Error handlers
    //Check for empty fields
    if (empty($first) || empty($last) || empty($phone)) {
        header("Location: ../addContact.php?signup=empty");
        exit();
    } else {
        //Check for invalid characters
        if (!preg_match("/^[a-zA-z]*$/", $first) || !preg_match("/^[a-zA-z]*$/", $last)) {
            header("Location: ../addContact.php?signup=char");
            exit();
        } else {
            //Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../addContact.php?signup=email");
                exit();
            } else {
              //Insert the contact into database
              $sql = "INSERT INTO contacts (contact_uid, contact_first, contact_last, contact_email, contact_phone, contact_street_address, contact_city, contact_state, contact_zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
              $stmt = mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                  header("Location: ../addContact.php?signup=dberror");
                  exit();
              } else {
                  mysqli_stmt_bind_param($stmt, "issssssss", $_SESSION['u_id'], $first, $last, $email, $phone, $street, $city, $state, $zip);
                  mysqli_stmt_execute($stmt);
                  header("Location: ../contacts.php?signup=success");
                  exit();
              }
            }
        }
    }
}
