<?php
//Deyisenleri tutmaq ucun Sessionu start edirik
session_start();

?>
<!--Sade bir qeydiyyat sehifesi duzeldirik html ile -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qeydiyyat</title>
</head>
<body>
<div class="register">
    <form  method="POST">
        <strong>Istifadəçi adınə daxil edin</strong> <br>
        <input type="text" name="username"> <br><br>
        <strong>E-mail addresinizi daxil edin</strong> <br>
        <input type="email" name="email"> <br><br>
        <strong>Şifrənizi daxil edin.</strong><br>
        <input type="password" name="password"><br>
        <input type="submit" value="Qeydiyyatdan kec" name="register-btn">


    </form>
</div>
<div class="login">
    <a href="index.php">giriş ekranı.</a>


</div>
    
</body>
</html>
<?php
//db ni import edirik.
include_once'config.php';
//methodu yoxlayiriq
$method = $_SERVER['REQUEST_METHOD'];
if ($method=='POST'){
    //userden melumatlari aliriq
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    //sifreni hash formasina saliriq
    $hashed_pass=password_hash($password,PASSWORD_DEFAULT);


    //eyni istifadeci adi olmamasi ucun databaseden de melumatlari cekirik,
    $sql_query="SELECT * FROM userinfo WHERE username='$username' AND email='$email'";
    $result=mysqli_query($conn,$sql_query);
    $row=mysqli_fetch_array($result);
    //eger istifadeci adi ve e-mail databasedeki ile eyni olsa onda bu istifadecinin artiq movcud oldugunu deyirik
    //eyni olmadigi halda 0 qaytaracaq ve if operatoru false olacaq datani database-e elave edeceyik.
    if( mysqli_num_rows($result)!=0){

        echo"istifadeci artiq movcuddur giris edin ve ya ferqli hesab yaradin!";
        mysqli_close($conn);
    }
    else{
        //database-e melumatlari yazmaq ucun SQL kodlarin stringin icinde saxlayaq
        $sql_query="INSERT INTO userinfo(username,email,password) VALUES ('$username','$email','$hashed_pass');";
        //eger hec bir problem yasanmasa if elaqe qurulacaq ve sql kodu execute olunacaq ve ana sehifeye yonlendirilecek.
        if(mysqli_query($conn,$sql_query)){

          //username'i session deyiseni kimi qeyd edirik
          $_SESSION['username']=$username;
          echo "qeydiyyat ugurla basa catdi";
          mysqli_close($conn);
          header("Location: ./main.php");
          
        }else{
            //sadece istifadeci adi eyni olduqda bu hali oxuyacaq 
            //istifadeciye melumat veririk ki istifadeci adi movcuddur 
            echo"istifadeci adi movcuddur";
        }
        
    }

    
}
else{
    echo"method error";
}

?>