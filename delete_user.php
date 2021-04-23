<?php
include_once'config.php';
session_start();
//get requestden silinecek postun id-sini aliriq
$user=$_GET['u'];

$sql = "DELETE FROM userinfo WHERE username='$user'"; //secilmis useri silme queryimizi yaziriq
if (mysqli_query($conn, $sql)) {
    echo "istifadeci silindi";
    header("Location: ./controlpanel.php");
  } else {
    echo "Error deleting user: " . mysqli_error($conn);
  }
  
  

//silinmis userin postlarin da silmeliyik.
$sql = "DELETE FROM post WHERE user='$user'"; //secilmis usere gore silme queryimizi yaziriq
if (mysqli_query($conn, $sql)) {
    echo "Postlar ugurla silindi";
    header("Location: ./controlpanel.php");
  } else {
    echo "Error deleting posts: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);


?>