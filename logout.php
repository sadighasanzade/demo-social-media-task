<?php
session_start();
session_destroy();//user bilgilerin sessiondan silirik
header("Location: ./index.php");//login sehifesine gonderirik
die();


?>