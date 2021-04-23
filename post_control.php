<?php
session_start();
include_once'config.php';
  //hesabina daxil olmamis istifadecinin profile url yazaraq gelmesinin qarsisini aliriq.
  if(empty($_SESSION['username']) || $_SESSION['username']==""){

    header("Location: ./index.php");
}



//editleyenin admin oldugun yoxlayaq
//ilk once userin admin oldugunu yoxlayaq
$username=$_SESSION['username'];
$sql_query = "SELECT * FROM userinfo  where username='$username'";
$result = mysqli_query($conn, $sql_query);

$row = mysqli_fetch_assoc($result);

if($row['auth']!=1){
    header("Location: ./logout.php");
}
    $user=$_GET['u']; //hansi userin profilini editlemek istediyine baxiriq.
  //userin paylasdigi butun postlari cekirik.
  $sql_query = "SELECT * FROM post  where user='$user' order by id desc";
  $result = mysqli_query($conn, $sql_query);
  //datanin bos olmadigin yoxlayiriq
  if (mysqli_num_rows($result) > 0) {
    // datani displey edirik 
  while($row = mysqli_fetch_assoc($result)) {
    //username i link kimi vereceyik ve username e tiklandiqda profilini acacayiq
    //profilde ancaq userin paylasdigi seyler olacaq
      echo" <table  cellspacing=0 cellpadding=0 style='width:500px;'> 
              <tr>
                  
                  <td><strong>". $row['user']."</strong></td>
              </tr>
              <tr>
                  <td><h3>". $row['title']."</h3></a></td>
              </tr>
              <tr>
                  <td> <p>". $row['post_text']."</p></td>
              </tr>
              <tr>
                  <td><i>". $row['post_time']."</i></td>
              </tr>
              <br>
  
              <tr>
                    <td><a href='delete_post.php?id=". $row['id']."'><strong> Delete </strong></a></td>
                   
              
              </tr>
  
      </table> 
      <br><br>
  

  ";
}
}

  ?>