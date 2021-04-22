<?php

use function PHPSTORM_META\type;

session_start();
include_once'config.php';

//postu db ye yazmaq ucun lazimi datalari cekirik
$method = $_SERVER['REQUEST_METHOD'];
if($method=='POST'){

    $post_title=$_POST['post-title'];
    $post_text=$_POST['post-text'];
    $username=$_SESSION['username'];
    $post_time=date("Y/m/d");

    //postun bos olmadigini yoxlayib db ye yaziriq.
    if(empty($post_title) || empty($post_text)){
        echo"Boş post paylaşmaq olmaz!";
    }
    else{
    //sql sorgusu yazib database in postlari saxladigimiz hissesine elave edirik

    $sql_query="INSERT INTO `post` (`title`, `post_text`, `user`, `post_time`) VALUES ('$post_title', '$post_text', '$username', '$post_time');";
    mysqli_query($conn,$sql_query);
    mysqli_close($conn);
    header("Location: ./main.php");
    }

}



?>