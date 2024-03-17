<?php
session_start();
include("connect.php");
$votes=$_POST['nomineevotes'];
$totalvotes=$votes+1;

$gid=$_POST['nomineeid'];
$uid=$_SESSION['id'];

$upvote="update votes set vote='$totalvotes' where id='$gid'";
$updatevotes=mysqli_query($connect,$upvote);

$upstatus="update vote_status set status=1 where id='$uid'";
$updatestatus=mysqli_query($connect,$upstatus);

if($updatevotes and $updatestatus){
$getgroups=mysqli_query($connect,"select ud.username,ud.photo,v.vote,ud.id
 from user_detailes ud,votes v where usertype='nominee' and ud.id=v.id");
 $nominees=mysqli_fetch_all($getgroups,MYSQLI_ASSOC);
 $_SESSION['nominees']=$nominees;
 $_SESSION['status']=1;
 echo '<script>
    alert("voting successful");
    window.location="../partials/voterdashboard.php";
    </script>';
}else{
    echo '<script>
    alert("Technical error !! Vote after sometime");
    window.location="../partials/voterdashboard.php";
    </script>';
}
?>