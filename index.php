<!-- sade bir giris formu qururuq html ile sonra php ile dinamiklesdireceyik-->
<?php
//Deyisenleri tutmaq ucun Sessionu start edirik
session_start();


?>
<style>
<?php include 'static/css/login.css'; ?>
</style>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<div class="login">
    <form  method="POST">
        <strong>Istifadeci adini daxil edin</strong> <br>
        <input type="text" name="username"> <br><br>
        <strong>Sifrenizi daxil edin</strong><br>
        <input type="password" name="password"><br>
        <input type="submit" value="daxil ol" name="login-btn">


    </form>

    <a href="register.php">qeydiyatdan kecin.</a>


</div>
    
</body>
</html>
<?php
//database'mizi import edirik
include_once'config.php';
//methodun post olub olmadigini yoxlayiriq
$method = $_SERVER['REQUEST_METHOD'];
if ($method=='POST'){
    //post requestdem  istifadeci adini ve sifreni aliriq istifadeciden
    $username=$_POST['username'];
    $password=$_POST['password'];
    //databaseden de bu istifadeci adini ve sifreni cekmek ucun queryimizi yaziriq.
    $sql_query="SELECT * FROM userinfo WHERE username='$username'";
    
    $result=mysqli_query($conn,$sql_query); //queryimizi execute edirik
    $row=mysqli_fetch_array($result);
    //daxil edilmis istifadeci adi ve sifreni databasedekiler ile qarsilasdiririq.
    //null olmasinin qarsisini almaq ucun 'isset' funksiyasindan istifade edirik
    //eger giris ugurlu olsa esas sehifeye gonderirik
    //passwordu hash ile qarsilasdirirq verified olsa True olur.
    if(isset($row['username'])==$username && password_verify($password,$row['password'])){
        //username'i session deyiseni kimi qeyd edirik
        $_SESSION['username']=$username;
        header('Location: ./main.php');
        die();
        }
    else{
        //eger uyusmasa yanlis istifadeci adi ve ya sifre daxil etdiyini deyirik.
        echo"
        <script type=\"text/javascript\">
        alert('yanlis istifadeci adi ve ya sifre');
</script>

";
    }
    
    //database ile elaqeni kesirik.
    mysqli_close($conn);
}

?>