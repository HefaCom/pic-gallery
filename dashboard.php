<?php
session_start();
require_once __DIR__ . '/db.php';


if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit();
}


$user = $_SESSION['user'];


if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $imgData = file_get_contents($_FILES['userImage']['tmp_name']);
        $imgType = $_FILES['userImage']['type'];
        $sql = "INSERT INTO tbl_image(imageType ,imageData) VALUES(?, ?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param('ss', $imgType, $imgData);
        $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());
    }
}
?>
<HTML>
<HEAD>
<TITLE>Image Gallery Portal</TITLE>
<link rel="stylesheet" href="css/bootstrap.css">
<link href="css/form.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<style>
.image-gallery {
    text-align:center;
}
.image-gallery img {
    padding: 3px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
    border: 1px solid #FFFFFF;
    border-radius: 4px;
    margin: 20px;
}
p h1:hover, .btn:hover, img:hover{
    transform: scale(1.1);
}
</style>
</HEAD>
<BODY>
<?php include("navbar.php") ?>
    <?php include_once('sidebar.php'); ?>
        <div class="image-gallery">
            
            <?php require_once __DIR__ . '/listImages.php'; ?>
        </div>
    </form>
</BODY>
</HTML>