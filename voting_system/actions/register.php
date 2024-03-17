<?php
include("connect.php");
//random unique id generator

//$id_query='select id from user_detailes;';
//$id_array=mysqli_query($connect,$id_query);

$rand_id=rand(1000,9999);
//random unique id function calling
//unique_id();
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
   /*$sql="insert into userdata(fullname,username,email,phone,
   photo,dob,password,usertype,state,sequrity_question,sequrity_answer,
   gender,tc,status,vote,varified,approve) values('$fullname','$username',
   '$email','$phone','$image','$dob','$password','$usertype','$state','$sequrity_question',
   '$sequrity_answer','$gender','$tc',0,0,0,0)";*/
 /* $sql="insert into user_detailes ud,user_extra_detailes ued,
   sequrity s,vote_status vs,votes v,varify_and_approve va(ud.
   id,ued.id,s.id,vs.id,v.id,ud.fullname,ud.username,ud.usertype,ud.password,
   ud.photo,ued.email,ued.phone,ued.dob,ued.state,ued.gender,ued.tc,
   s.sequrity_question,s.sequrity_answer,vs.status,v.symbol,v.vote,v.nota,
   va.varified,va.approve) values('$unique_id','$unique_id','$unique_id',
   '$unique_id','$unique_id','$fullname','$username','$usertype','$password','$image',
   '$email','$phone','$dob','$state','$gender','$tc','$sequrity_question','$sequrity_answer',
0,'',0,0,0,0);";*/
/*$sql="insert into user_detailes(id,fullname,username,usertype,password,photo)
   output inserted.id,inserted.fullname,inserted.username,inserted.usertype,inserted.password,inserted.photo
   into user_extra_detailes(id,email,phone,dob,state,gender,tc)
   output inserted.id,inserted.email,inserted.phone,inserted.dob,inserted.state,inserted.gender,inserted.tc
   into sequrity(id,sequrity_question,sequrity_answer)
   output inserted.id,inserted.sequrity_question,inserted.sequrity_answer
   into vote_status(id,status)
   output inserted.id,inserted.status
   into votes(id,symbol,vote)
   output inserted.id,inserted.symbol,inserted.vote,inserted.nota
   into varify_and_approve(id,varified,approve)
   values('$unique_id','$fullname','$username','$usertype','$password','$image')
   ('$unique_id','$email','$phone','$dob','$state','$gender','$tc'),
   ('$unique_id','$sequrity_question','$sequrity_answer'),
   ('$unique_id',0),
   ('$unique_id','',0,0),
   ('$unique_id',0,0);";*/
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