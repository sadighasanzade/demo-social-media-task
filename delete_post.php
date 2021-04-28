
<?php
include_once'config.php';
session_start();
//get requestden silinecek postun id-sini aliriq
$post_id=$_GET['id'];
$_SESSION['postID']=$post_id;
echo"
<script type=\"text/javascript\">

var c=confirm('silmek isteyirsinizmi? ');
if(c!=true){

  window.location='main.php';
}
else{
window.location='confirmation.php';
}

</script>

";
?>


