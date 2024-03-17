<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../');
}
//voting status
$data=$_SESSION['data'];
if($_SESSION['status']==1){
    $status='<class="text-success">Voted</br>';
}else{
    $status='<class="text-unsuccess">Not Voted</br>';
}
//approve status
		if(($data['varified']==1) and ($data['approve']==0)){
			$avstatus='<class="varified">varified</br>';
					}
		elseif(($data['varified']==1) and ($data['approve']==1)){
			$avstatus='<class="Approveed">Approved</br>';
					}
		else {
			$avstatus='<class="varification_pending">varification pending</br>';
					}


//featching voters data
include('../actions/connect.php'); 
                        $sqlv="select ud.id,ud.fullname,ud.username,ud.usertype,ud.password,
                        ud.photo,ued.email,ued.phone,ued.dob,ued.state,ued.gender,ued.tc,
                        s.sequrity_question,s.sequrity_answer,vs.status,v.symbol,v.vote,
                        v.nota,va.varified,va.approve from user_detailes ud,user_extra_detailes ued,
                        sequrity s,vote_status vs,votes v,varify_and_approve va where ud.id=ued.id 
                       and ud.id=s.id and ud.id=vs.id and ud.id=v.id and ud.id=va.id and ud.usertype='voter';";
                        $voterdata=mysqli_query($connect,$sqlv);
                        if(mysqli_num_rows($voterdata)>0){
                            $voterdata=mysqli_fetch_all($voterdata,MYSQLI_ASSOC);
                            $_SESSION['$voterdata']=$voterdata;
                        }
                        $voterdata=$_SESSION['$voterdata'];
//fetching nominee data
$sqln="select ud.id,ud.fullname,ud.username,ud.usertype,ud.password,
ud.photo,ued.email,ued.phone,ued.dob,ued.state,ued.gender,ued.tc,
s.sequrity_question,s.sequrity_answer,vs.status,v.symbol,v.vote,
v.nota,va.varified,va.approve from user_detailes ud,user_extra_detailes ued,
sequrity s,vote_status vs,votes v,varify_and_approve va where ud.id=ued.id 
and ud.id=s.id and ud.id=vs.id and ud.id=v.id and ud.id=va.id and ud.usertype='nominee';";
$nomineedata=mysqli_query($connect,$sqln);
if(mysqli_num_rows($nomineedata)>0){
    $nomineedata=mysqli_fetch_all($nomineedata,MYSQLI_ASSOC);
    $_SESSION['$nomineedata']=$nomineedata;
}
$nomineedata=$_SESSION['$nomineedata'];
?>
<?php
//fetching nominee data
$sqla="select ud.id,ud.fullname,ud.username,ud.usertype,ud.password,
ud.photo,ued.email,ued.phone,ued.dob,ued.state,ued.gender,ued.tc,
s.sequrity_question,s.sequrity_answer,vs.status,v.symbol,v.vote,
v.nota,va.varified,va.approve from user_detailes ud,user_extra_detailes ued,
sequrity s,vote_status vs,votes v,varify_and_approve va where ud.id=ued.id 
and ud.id=s.id and ud.id=vs.id and ud.id=v.id and ud.id=va.id and ud.usertype='admin';";
$admindata=mysqli_query($connect,$sqla);
if(mysqli_num_rows($admindata)>0){
    $admindata=mysqli_fetch_all($admindata,MYSQLI_ASSOC);
    $_SESSION['$admindata']=$admindata;
}
$admindata=$_SESSION['$admindata'];
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styling/admindashboard.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>E-voting</h1>
        </div>
        <ul>
            <li><img src="dashboard (2).png" alt="">&nbsp; <span>Dashboard</span> </li>
            <li><img src="reading-book (1).png" alt="">&nbsp;<span>Nominatins</span> </li>
            <li><img src="teacher2.png" alt="">&nbsp;<span>Voters</span> </li>
            <li><img src="school.png" alt="">&nbsp;<span>Admin</span> </li>
            <li><img src="payment.png" alt="">&nbsp;<span>Chatbot</span> </li>
            <li><img src="help-web-button.png" alt="">&nbsp; <span>Help</span></li>
            <li><img src="settings.png" alt="">&nbsp;<span>Settings</span> </li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="" alt=""></button>
                </div>
                <div class="user">
                    <a href="../partials/registration.html" class="btn">Add New</a>
                    <img src="../resources/images/logo.png" alt="">
                    <div class="img-case">
                        <img src="../uploads/profiles/<?php echo $data['photo']?>" alt="user image">
                    </div>
                    <a href="../actions/logout.php" class="navmenu-link">Logout</a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1><?php echo count($nomineedata)?></h1>
                        <h3>Nominatins</h3>
                    </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php echo count($voterdata)?></h1>
                        <h3>Voters</h3>
                    </div>
                    <div class="icon-case">
                        <img src="teachers.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php echo count($admindata)?></h1>
                        <h3>Admin</h3>
                    </div>
                    <div class="icon-case">
                        <img src="schools.png" alt="">
                    </div>
                </div>
               
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent voters</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Varification</th>
                            <th>Aprrove</th>
                        </tr>
                        
                        
                        <?php
                       
                        if(isset($_SESSION['$voterdata'])){
                            $voterdata=$_SESSION['$voterdata'] ;
                            for($i=0;$i<count($voterdata);$i++){
                        ?>
                         <tr>
                         <td> <img class="table-photo" src="../uploads/profiles/<?php echo $voterdata[$i]['photo'] ?>" alt="Group image1" class="table-photo"></td> 
                        
                         <td><?php echo $voterdata[$i]['fullname'] ?></td>
                            <td>
                            <form action="../actions/varify.php" method="post">
                                       <input type="hidden" name="gid" value=" <?php echo $voterdata[$i]['id'] ?>">
                                    <?php 
                                if($voterdata[$i]['varified']==1){
											?>
											<img class="voted_suc table-photo" src="../resources/images/voted_suc.png" alt="Varifed">
											<?php
										}else{
                                            if(($voterdata[$i]['varified']!==2) and ($voterdata[$i]['varified']==0) ){
												?>
												<button class="btn" type="submit" onclick=confirm()>Varified</button>
										<?php
										}}
										?>
                                         </form>
                                        </td>
                            <td>
                                
                            
                            <form action="../actions/approve.php" method="post">
                                       <input type="hidden" name="gid" value=" <?php echo $voterdata[$i]['id'] ?>">
                                    <?php 
                                if($voterdata[$i]['varified']!==2){
                                if(($voterdata[$i]['varified']==1) and ($voterdata[$i]['approve']==0)){
											?>
                                            <button class="btn" type="submit" onclick=confirm()>Approve</button>
											
											<?php
										}elseif(($voterdata[$i]['approve']==1))
                                        {
												?>
												<img class="voted_suc table-photo" src="../resources/images/voted_suc.png" alt="Varifed">
										<?php
										}}
										?></td>
                                        </form>
                        </td>
                            <td>
                            <form action="../actions/reject.php" method="post">
                                    <input type="hidden" name="gid" value=" <?php echo $voterdata[$i]['id'] ?>">
                                    <?php
										if($voterdata[$i]['varified']==0){
											?>
											<button class="btn" type="submit" onclick=confirm()>Reject</button>
											<?php
										}
												?>
								   </form>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                        ?>

                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>New Nominatins</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Varification</th>
                            <th>Approve</th>
                            
                        </tr>
                        <tr>
                        <?php
                                if(isset($_SESSION['$nomineedata'])){
                                    $nomineedata=$_SESSION['$nomineedata'] ;
                                   for($i=0;$i<count($nomineedata);$i++){
                                ?>
                                
                                <td> <img class="table-photo" src="../uploads/profiles/<?php echo $nomineedata[$i]['photo'] ?>" alt="Group image1"></td>
                                
     	           				<td><?php echo $nomineedata[$i]['fullname'] ?></td>
                                <td>
                                <form action="../actions/varify.php" method="post">
                                       <input type="hidden" name="gid" value=" <?php echo $nomineedata[$i]['id'] ?>">
                                    <?php 
                                if($nomineedata[$i]['varified']==1){
											?>
											<img class="voted_suc table-photo" src="../resources/images/voted_suc.png" alt="Varifed">
											<?php
										}else{
                                            if(($nomineedata[$i]['varified']!==2) and ($nomineedata[$i]['varified']==0) ){
												?>
												<button class="btn" type="submit" onclick=confirm()>Varified</button>
										<?php
										}}
										?>
                                         </form>
                            </td>
                                <td>
                                <form action="../actions/approve.php" method="post">
                                       <input type="hidden" name="gid" value=" <?php echo $nomineedata[$i]['id'] ?>">
                                    <?php 
                                if($nomineedata[$i]['varified']!==2){
                                if(($nomineedata[$i]['varified']==1) and ($nomineedata[$i]['approve']==0)){
											?>
                                            <button class="btn" type="submit" onclick=confirm()>Approve</button>
											
											<?php
										}elseif(($nomineedata[$i]['approve']==1))
                                        {
												?>
												<img class="voted_suc table-photo" src="../resources/images/voted_suc.png" alt="Varifed">
										<?php
										}}
										?></td>
                                        </form>
                                <td>
									<form action="../actions/reject.php" method="post">
                                    <input type="hidden" name="gid" value=" <?php echo $nomineedata[$i]['id'] ?>">
                                    <?php
										if($nomineedata[$i]['varified']==0){
											?>
											<button class="btn" type="submit" onclick=confirm()>Reject</button>
											<?php
										}
												?>
								   </form>
								
								
								</td>
     	           			</tr>
                            <?php
                                   }
                                }
                                
                            
                            ?>






                            

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>