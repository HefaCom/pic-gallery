<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "select * from users where username ='$username' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
// Finding if the user exists
    if ($result->num_rows === 0) {
        echo '<h5 class="alert bg-danger fixed-top" type="alert">User not found!.</h5>';
    } else {



// validating the form inputs
        if ($username == "" || $password == "") {
            echo '<p class="alert bg-danger" type="alert">All fields are required!</p>';
        } else {
            // validating the provided credentials
            $checker = $conn->query("select * from users where username ='$username' and password = '$password'");
            if ($checker->num_rows == 1) {
                $_SESSION['user'] = $username;
                $_SESSION['name'] = $row['name'];
                header("location:dashboard.php");
            } else {
                echo '<p class="alert bg-danger fixed-top" type="alert">Incorrect credentials.</p>';
            }
        }
    }
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- <link rel="stylesheet" href="css/transition.css"> -->
    <title>User Login</title>
</head>
<style>
    html,body{
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<body>
    <div class="container-sm px-5   py-5  md:px-0 shadow">
    <div class="card-header bg-gray text-black text-4xl-900 px-5 py-5 md:text-2xl-900" style="text-align: center">
                <h1>PHOTO GALLERY</h1>
            </div>
        <div class="card">
            <div class="card-header bg-primary text-white text-2xl-900" style="text-align: center">
                <h1>User Login</h1>
            </div>
            <form method="POST" class="shadow rounded">
                <div class="mb-3 px-5">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">

                </div>
                <div class="px-5">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="d-grid gap-2 px-5 py-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="index.php" style="text-decoration: none;">Back Home</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>