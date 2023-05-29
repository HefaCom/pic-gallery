<?php
// session_start();
include("db.php");


echo 'Welcome '.$_SESSION['name'] ;

$sql = "SELECT imageId FROM tbl_image ORDER BY imageId DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>
<h1 style="padding-top: 40px;position:relative">Picture Gallery</h1>
<!-- <hr class="h-5px"> -->
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
    <?php ?>
        
        
		<img src="imageView.php?image_id=<?php echo $row["imageId"];?> "style="height:200px;width:200px">
<?php
    }
}
?>