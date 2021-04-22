<?php
include_once'config.php';
session_start();

//hesabina daxil olmamis istifadecinin ana sehifeye gelmesinin qarsisini aliriq.
if(empty($_SESSION['username']) || $_SESSION['username']==""){
    header("Location: ./index.php");
}else{
    session_destroy();//bir defe giris etdikde geri qayidib url den main.php daxil edib 
                      // ana sehifeye girmeyinin qarsisini aliriq.
}



?>


<html lang="en">
<!--Navbar hissesin duzeldek -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Sehife</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="profile.php"> Profil </a></li>
            <li><a href="logout.php"> Cixis  </a></li>
    
        </ul>
    </header>
</body>
</html>