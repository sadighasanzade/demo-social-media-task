<?php
include_once'config.php';
session_start();


//hesabina daxil olmamis istifadecinin ana sehifeye gelmesinin qarsisini aliriq.
if(empty($_SESSION['username']) || $_SESSION['username']==""){

    header("Location: ./index.php");
}

//daxil olmus userin superuser olub olmadigini yoxlayaq.
//1)databaseden daxil olmus userin datalarin cekek
$user=$_SESSION['username'];
$sql_query = "SELECT * FROM userinfo  where username='$user'";
$result = mysqli_query($conn, $sql_query);
$row = mysqli_fetch_assoc($result);

if($row['auth']==1){
    //superuserdir.
    
    header("Location: ./controlpanel.php");
    
}


?>
<style>
<?php include 'static/css/main.css'; ?>
</style>



<html lang="en">
<!--Navbar hissesin duzeldek -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Səhifə</title>
</head>
<body>
    <header style="display:flex;">
    <div class="logo">
        <img src="static/images/logo.png"  style="width:60px;height:50px;">
    </div>
        <ul >
            <?php echo"<li><a href='edit_profile.php?u=$user'> Profil </a></li>"?>
            <li><a href="logout.php"> Çıxış  </a></li>
    
        </ul>
    </header>
    <!--primitiv bir Post paylasma sahesi yaradiriq  -->
    <div class="ana_sehife">
    <div class="post-sharing">
    
    <form action="share.php" method="POST">
        <strong>Post başlığı</strong> <br>
        <input type="text" name="post-title"> <br><br>
        <strong>post mətni</strong><br>
        <textarea name="post-text" rows=4></textarea><br>
        <input type="submit" value="Paylaş" name="share-btn">

 
    
    </form>
</div>

    <!--  Paylasilmis postlari databaseden cekib ana sehifeye oturme hissesini qururuq
    bunun ucun ilk once strukturumuzu qururuq html ile sonra ise php kodlarimizi daxil edeceyik-->
    
    <div class="post-flow">

    <?php
    //evvelde axira db den datalari cekirik
    $sql_query = "SELECT * FROM post order by id desc";
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
                <a href='profile.php?u=". $row['user']."'><strong>". $row['user']."</strong></a>
                </td>
                    
                </tr>
                <tr>
                    
                    <td><h3 style='text-align:center;'>". $row['title']."</h3></td>
                </tr>
                <tr>
                    <td> <p>". $row['post_text']."</p></td>
                </tr>
                <tr>
                    <td><h6>". $row['post_time']."</h6></td>
                </tr>
                <br><br>
    
    
    
        </table> 
    

    ";
  }
}

    ?>
    
    </div>
    </div>
</body>
</html>