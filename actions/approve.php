<?php
session_start();
include("connect.php");

$gid=$_POST['gid'];
$upvarify=" update varify_and_approve set approve=1 where id='$gid';";
$updatevarify=mysqli_query($connect,$upvarify);

if($updatevarify){
 echo '<script>
    alert("Approved");
    window.location="../partials/admindashboard.php";
    </script>';
}else{
    echo '<script>
    alert("Technical error !! Approve after sometime");
    window.location="../partials/admindashboard.php";
    </script>';
}
?>