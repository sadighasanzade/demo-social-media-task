<?php
session_start();
include_once'config.php';
  //hesabina daxil olmamis istifadecinin profile url yazaraq gelmesinin qarsisini aliriq.
  if(empty($_SESSION['username']) || $_SESSION['username']==""){

    header("Location: ./index.php");
}

$user=$_GET['u']; //hansi userin profilini editlemek istediyine baxiriq.

//ferqli userin profilin editlemeyi engelleyek 
if($_SESSION['username']!=$user){
    header("Location: ./logout.php");
}


?>
<style>
<?php include 'static/css/edit_profile.css'; ?>
</style>


<html lang="en">
<!--navbari yapisdirirq sehifenin evveline
 -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <header style="display:flex;">
    <div class="logo">
        <img src="static/images/logo.png"  style="width:60px;height:50px;">
    </div>
        <ul >
            <li><a href="main.php"> Ana Səhifə </a></li>
            <li><a href="logout.php"> Çıxış  </a></li>
    
        </ul>
    </header>
   
    <div class="post-flow">

    <?php
  


    
  
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
                  
                  <td><img src='static/images/profile.png' style='height:50px; width:50px;'>
                  <a href='profile.php?u=". $row['user']."'><strong>". $row['user']."</strong></a></td>
              </tr>
              <tr>
                  <td><h3>". $row['title']."</h3></a></td>
              </tr>
              <tr>
                  <td> <p>". $row['post_text']."</p></td>
              </tr>
              <tr>
                  <td><h6>". $row['post_time']."</h6></td>
              </tr>
              <br>
  
              <tr>
                    <td><a id='delete' href='delete_post.php?id=". $row['id']."'><strong> Delete </strong></a></td>
                    <td><a id='edit' href='edit_post.php?id=". $row['id']."'><strong> Edit </strong></a></td>
              
              </tr>
  
      </table> 
      <br><br>
  

  ";
}
}

  ?>
  </div>
</body>
</html>