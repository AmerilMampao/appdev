<?php
include("class/database.php");

$user_id = $_POST["user_id"];
$new_Name = $_POST["new_Name"];
$new_Address = $_POST["new_Address"];
$new_Email = $_POST["new_Email"];
$new_Section = $_POST["new_Section"];
$new_Contact = $_POST["new_Contact"];
mysqli_query($connections, 
"UPDATE mytbl SET name='$new_Name', address='$new_Address', emailaddress='$new_Email', section='$new_Section', contact='$new_Contact' WHERE id='$user_id'");

echo "<script language='javascript'>alert('Record has been updated!')</script>";
echo "<script>window.location.href='index.php';</script>";
?>
