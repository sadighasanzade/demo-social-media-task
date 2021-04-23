<?php
include_once'config.php';
session_start();
//get requestden silinecek postun id-sini aliriq
$post_id=$_GET['id'];

$sql = "DELETE FROM post WHERE id='$post_id'"; //secilmis id ye gore silme queryimizi yaziriq
if (mysqli_query($conn, $sql)) {
    echo "Post ugurla silindi";
    header("Location: ./main.php");
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);




?>