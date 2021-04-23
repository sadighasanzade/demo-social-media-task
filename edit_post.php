<?php

include_once'config.php';
session_start();
$post_id=$_GET['id'];

//databaseden id-e gore mueyyen postu cekirik
$sql_query = "SELECT * FROM post  where id='$post_id'";
$result = mysqli_query($conn, $sql_query);
$row = mysqli_fetch_assoc($result);
$publisher=$row['user'];

 //hesabina daxil olmamis istifadecinin profile url yazaraq gelmesinin qarsisini aliriq.
 if(empty($_SESSION['username']) || $_SESSION['username']==""){

    header("Location: ./index.php");
}


//ferqli userin postu editlemeyi engelleyek 
if($_SESSION['username']!=$publisher){
    header("Location: ./logout.php");
}


?>
<html>
<!--Postumuzun value hisselerine databaseden cekdiyimiz melumatlari giririk ki, user editleyende 0- dan yazmasin-->
    <form action=<?php echo"edit_script.php?id=".$post_id?> method="POST">
        <strong>Post başlığı</strong> <br>
        <input type="text" name="post-title" value=<?php echo"".$row['title'];?>> <br><br>
        <strong>post mətni</strong><br>
        <textarea name="post-text" rows=4  ><?php echo $row['post_text'];?></textarea><br>
        <input type="submit" value="editle" name="edit-btn">

 
    
    </form>
</html>

