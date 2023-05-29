<?php
session_start();
require_once __DIR__ . '/db.php';


if (!isset($_SESSION['user'])) {
    header("location:login.php");
    exit();
}


$user = $_SESSION['user'];


if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $imgData = file_get_contents($_FILES['userImage']['tmp_name']);
        $imgType = $_FILES['userImage']['type'];
        $sql = "INSERT INTO tbl_image(imageType ,imageData,user) VALUES(?, ?,?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param('sss', $imgType, $imgData,$user);
        $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());
        echo '<h5 class="alert bg-success fixed-top mt-20 text-900  text-center" type="alert">Success, Image added successfully!.</h5>';
    }else{
        echo '<h5 class="alert alert alert-danger fixed-top mt-5 text-900 
        text-center" type="alert">Choose a file to upload!</h5>';
    }
   
}
?>

<!DOCTYPE html>
<html lang="en">
<style>
    html,
    body {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Image</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/form.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php include("navbar.php") ?>
    <?php include_once('sidebar.php'); ?>
    <div class="container-sm px-5   py-5  md:px-0 shadow">
        <div class="card-header bg-gray text-black text-4xl-900 px-5 py-5 md:text-2xl-900" style="text-align: center">
            <div class="card">
                <div class="card-header bg-primary text-white text-2xl-900" style="text-align: center">
                    <h1>Add Image</h1>
                </div>
                <form name="frmImage" enctype="multipart/form-data" action="" method="post" class="mt-5">
                    <div class="p-5">
                        <label>Upload Image File:</label>
                        <div class="row">
                            <input name="userImage" type="file" class="full-width" />
                        </div>
                        <div class="row">
                            <input type="submit" value="Submit" />
                        </div>
                    </div>
                </form>
            </div>
        </div>


        
</body>

</html>