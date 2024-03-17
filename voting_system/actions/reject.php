<?php
session_start();
include("connect.php");

$gid=$_POST['gid'];
//$uid=$_SESSION['id'];
$upvarify=" update varify_and_approve set varified=2 where id='$gid';";
$updatevarify=mysqli_query($connect,$upvarify);

if($updatevarify){
 echo '<script>
    alert("rejected successful");
    window.location="../partials/admindashboard.php";
    </script>';
}else{
    echo '<script>
    alert("Technical error !! reject after sometime");
    window.location="../partials/admindashboard.php";
    </script>';
}
?>