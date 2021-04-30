<html>
    <a href="logout.php"  style="margin-left:80%;">Çıxış</a>

    
</html>

<?php
include_once'config.php';
session_start();
//hesabina daxil olmamis istifadecinin ana sehifeye gelmesinin qarsisini aliriq.
if(empty($_SESSION['username']) || $_SESSION['username']==""){

  header("Location: ./index.php");
}
    $sql_query = "SELECT * FROM userinfo where auth=0";
    $result = mysqli_query($conn, $sql_query);
    //datanin bos olmadigin yoxlayiriq
    if (mysqli_num_rows($result) > 0) {
  // datani displey edirik 
    while($row = mysqli_fetch_assoc($result)) {
      //username i link kimi vereceyik ve username e tiklandiqda profilini acacayiq
      //profilde ancaq userin paylasdigi seyler olacaq ve admin onlari sile bilecek.
        echo" <table border=1 cellspacing=0 cellpadding=0 style='width:500px;'> 
                <tr>
                    
                    <td><a href='post_control.php?u=". $row['username']."'><strong>". $row['username']."</strong></a></td>
                </tr>
                <tr>
                    <td><a href='delete_user.php?u=". $row['username']."'><strong> Delete </strong></a></td>
                </tr>
        </table> 
        <br><br><br>

    ";
  }
}




?>