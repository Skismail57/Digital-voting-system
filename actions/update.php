<?php
include('connect.php');
$userid=$_POST['id'];
$fullname=$_POST['fullname'];
$username=$_POST['username'];
$dob=$_POST['dob'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];


$sql1="update user_detailes set fullname='$fullname',username='$username',
password='$password' where id='$userid'";
$sql2="update user_extra_detailes set email='$email',phone='$phone',
dob='$dob' where id='$userid'";

   $query1=mysqli_query($connect,$sql1);
   $query2=mysqli_query($connect,$sql2);
   
if($query1 and $query2 ){
    echo "<script>
    alert('updated successful');
    window.location='../partials/login.html';
    </script>";
    }

?>