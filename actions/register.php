<?php
include("connect.php");
//random unique id generator
$rand_id=rand(1000,9999);
//random unique id function calling

$unique_id=$rand_id;
$fullname=$_POST["fullname"];
$username=$_POST["username"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$image=$_FILES['photo']['name'];
$temp_name=$_FILES['photo']['tmp_name'];
$dob=$_POST["dob"];
$password=$_POST["password"];
$cn_password=$_POST["cn_password"];
$usertype=$_POST["usertype"];
$state=$_POST["state"];
$sequrity_question=$_POST["sequrity-question"];
$sequrity_answer=$_POST["sequrity-answer"];
$gender=$_POST["gender"];
$tc=$_POST["tc"];

if($password!=$cn_password){
    echo "<script>
    alert('password do not match');
    window.location='../partials/registration.html';
    </script>";
}
else{
   move_uploaded_file($temp_name,"../uploads/profiles/$image");
   
$insert1="insert into user_detailes (id,fullname,username,usertype,password,photo) values('$unique_id','$fullname','$username','$usertype','$password','$image');";
$insert2="insert into user_extra_detailes values('$unique_id','$email','$phone','$dob','$state','$gender','$tc')";
$insert3="insert into sequrity values('$unique_id','$sequrity_question','$sequrity_answer')";
$insert4="insert into vote_status values('$unique_id',0)";
$insert5="insert into votes values('$unique_id','',0,0)";
$insert6="insert into varify_and_approve values('$unique_id',0,0)";
   $query1=mysqli_query($connect,$insert1);
   $query2=mysqli_query($connect,$insert2);
   $query3=mysqli_query($connect,$insert3);
   $query4=mysqli_query($connect,$insert4);
   $query5=mysqli_query($connect,$insert5);
   $query6=mysqli_query($connect,$insert6);

    if($query1 and $query2 and $query3 and $query4 and $query5 and $query6){
        echo "<script>
    alert('Registration successful');
    window.location='../partials/login.html';
    </script>";
    }
}
?>