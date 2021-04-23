
<?php
include_once'config.php';
session_start();

//set queryimizi bura elave edeceyikik bunun ucun form dan aldigimiz datalari variable a vermekle baslayaq
$title=$_POST['post-title'];
$text=$_POST['post-text'];
$time=date("Y/m/d");
$post_id=$_GET['id'];

$sql_query="UPDATE post SET title='$title', post_text='$text',post_time='$time' WHERE id=$post_id";
if(mysqli_query($conn,$sql_query)){
    echo"post edited";
    header("Location: ./main.php");
}
else{
    echo"sehv bas verdi". mysqli_error($conn);
}


?>