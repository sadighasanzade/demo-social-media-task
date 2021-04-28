<?php
include_once'config.php';
session_start();
$post_id=$_SESSION['postID'];

$sql = "DELETE FROM post WHERE id='$post_id'"; //secilmis id ye gore silme queryimizi yaziriq

if (mysqli_query($conn, $sql)) {
    echo "Post ugurla silindi";
    header('Location: ./main.php');
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);




?>



