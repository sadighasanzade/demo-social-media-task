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
    <div class="post-edit">
<!--Postumuzun value hisselerine databaseden cekdiyimiz melumatlari giririk ki, user editleyende 0- dan yazmasin-->
    <form action=<?php echo"edit_script.php?id=".$post_id?> method="POST">
        <strong>Post başlığı</strong> <br>
        <input type="text" name="post-title" value=<?php echo"".$row['title'];?>> <br><br>
        <strong>post mətni</strong><br>
        <textarea name="post-text" rows=4  ><?php echo $row['post_text'];?></textarea><br>
        <input type="submit" value="editle" name="edit-btn">

 
    
    </form>
    </div>
</html>

<style>
    body {
    background: #59C173;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #5D26C1, #a17fe0, #59C173);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #5D26C1, #a17fe0, #59C173);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    margin: 0;
    padding: 0;

    font-family: 'Roboto', sans-serif;

}
.post-edit {
    max-width: 350px;
    margin-top: 20%;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: auto;
    padding: 5px;
}


form{
    display: block;
    width: 100%;
}


input,textarea {
    display: block;
    border: none;
    width: 100%;
    padding: 10px;
    margin-top: 10px;
}
strong {
    color: white;
}
input[type=submit] {
    margin-top: 10px;
    border: none;
    padding: 10px;
    cursor: pointer;

}
input[type=submit]:hover {
    margin-top: 10px;
    background-color: rgb(111, 197, 149);
    color: white;

}
</style>