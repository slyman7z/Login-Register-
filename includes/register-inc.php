<?php
if (isset($_POST['submit'])) {
    //Add database connection
    require 'database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPassword'];

    //if username is empty 
    if (empty($username) || empty($password) || empty($confirmPass)) {
        header("location:../register.php?error=emptyfields&username=" . $username);
        exit();

        //if username does not contain search pattern 
    } elseif (!preg_match("/^[a-zA-Z0-9]*/", $username)) {
        header("location:../register.php?error=invalidusernam&username=" . $username);
        exit();
    } elseif ($password !== $confirmPass) {
        header("location:../register.php?error=passwordsdonotmatch&username=" . $username);
        exit();
    } else {

        // $sql = "INSERT INTO `users` (username, password) VALUES('$username','$password') ";
        // $result = mysqli_query($conn, $sql);

        //prepared query statment to check if user exist
        $sql = "SELECT username FROM users WHERE username = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location:../register.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);

            if ($rowCount > 0) {
                header("location:../register.php?error=usernametaken");
                exit();
            } else {
                //prepared statement to insert into the database
                $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location:../register.php?error=sqlerror");
                    exit();
                } else {
                    //hashed password
                    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    header("location:../register.php?success=registered");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
