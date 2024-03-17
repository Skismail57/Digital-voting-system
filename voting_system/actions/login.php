<?php
include('connect.php');
$useridentity=$_POST['useridentity'];
$password=$_POST['password'];
$usertype=$_POST['usertype'];
$sql="select ud.id,ud.fullname,ud.username,ud.usertype,ud.password,
ud.photo,ued.email,ued.phone,ued.dob,ued.state,ued.gender,ued.tc,
s.sequrity_question,s.sequrity_answer,vs.status,v.symbol,v.vote,
v.nota,va.varified,va.approve from user_detailes ud,user_extra_detailes ued,
sequrity s,vote_status vs,votes v,varify_and_approve va where
(ud.username='$useridentity' or  ued.email='$useridentity' or ued.phone='$useridentity')
and ud.password='$password' and ud.usertype='$usertype' and ud.id=ued.id 
and ud.id=s.id and ud.id=vs.id and ud.id=v.id and ud.id=va.id;
";
//$sql="select * from userdata where (username='$useridentity' or  email='$useridentity'
// or phone='$useridentity') and password='$password' and usertype='$usertype'";
$result=mysqli_query($connect,$sql);
if(mysqli_num_rows($result)>0){
    $sql="select ud.id,ud.fullname,ud.username,ud.usertype,ud.password,
    ud.photo,ued.email,ued.phone,ued.dob,ued.state,ued.gender,ued.tc,
    s.sequrity_question,s.sequrity_answer,vs.status,v.symbol,v.vote,
    v.nota,va.varified,va.approve from user_detailes ud,user_extra_detailes ued,
    sequrity s,vote_status vs,votes v,varify_and_approve va where ud.id=ued.id 
    and ud.id=s.id and ud.id=vs.id and ud.id=v.id and ud.id=va.id and ud.usertype='nominee' and va.approve=1;";
    //$sql="Select fullname,username,photo,vote,id from userdata where
   // usertype='nominee'";
    $resultgroup=mysqli_query($connect,$sql);
    if(mysqli_num_rows($resultgroup)>0){
        session_start();
        $nominee=mysqli_fetch_all($resultgroup,MYSQLI_ASSOC);
        $_SESSION['nominee']=$nominee;
    }
    session_start();
    $data=mysqli_fetch_array($result);
    $_SESSION['id']=$data['id'];
    $_SESSION['status']=$data['status'];
    $_SESSION['data']=$data;
    if($usertype=='voter'){
    echo '<script>
    window.location="../partials/voterdashboard.php";
    </script>';
    }
    elseif($usertype=='nominee'){
        echo '<script>
        window.location="../partials/nomineedashboard.php";
        </script>';
        }
    else{
            echo '<script>
            window.location="../partials/admindashboard.php";
            </script>';
            }


}else{
    echo '<script>
    alert("Invalid credentials");
    window.location="../partials/login.html";
    </script>';
}
?>