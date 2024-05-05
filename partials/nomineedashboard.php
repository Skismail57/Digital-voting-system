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
		
?>
<?php
include('../actions/connect.php');
$data=$_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../styling/voterdashboard.css" />
  <link rel="stylesheet" type="text/css" href="../styling/nomineedashboard.css"/>
 
  <script src="../js_scripts/sidemnu.js"></script>
  <script>
// Responsive Sidenav
const sideNav = document.getElementById("sidenav");
const burgerMenu = document.getElementById("burgermenu");

burgerMenu.addEventListener("click", function () {
	sideNav.classList.toggle("active");
	burgerMenu.classList.toggle("active");
});


  </script>
</head>
<body>
	
  <nav class="sidenav" id="sidenav">
	<div class="navbrand">
    <img src="../uploads/profiles/<?php echo $data['photo']?>" alt="user image">
		
		<h2 class="title title-medium"> <?php echo $data["fullname"] ;?></h2>
	</div>
	<ul class="navmenu">
		<li class="navmenu-item"><a href="../index.html" class="navmenu-link">Home</a></li>
		<li class="navmenu-item"><a href="#" class="navmenu-link">Userid:
			<?php echo $data['username']?>
	</a></li>
		<li class="navmenu-item"><a href="#" class="navmenu-link">Status:
        <?php echo $status;?>
		</a></li>
		<li class="navmenu-item"><a href="#" class="navmenu-link">d.o.b: 
			<?php echo $data['dob']
			?>
		</a></li>
		<li class="navmenu-item"><a href="#" class="navmenu-link">gender:<?php echo $data['gender']?></a></li>
		<li class="navmenu-item"><a href="#" class="navmenu-link">Phone:<?php echo $data['phone']?></a></li>
		<li class="navmenu-item"><a href="#" class="navmenu-link">Approve:
		<?php echo $avstatus;?>
		</a></li>
		
        <li class="navmenu-item" style="background:red"><a href="../actions/logout.php" class="navmenu-link">Logout</a></li>
	</ul>
	<div class="navinfo">
		<div class="social">
			<a href="#" class="social-item"><i class="ion-logo-youtube"></i></a>
			<a href="#" class="social-item"><i class="ion-logo-twitter"></i></a>
			<a href="#" class="social-item"><i class="ion-logo-instagram"></i></a>
			<a href="#" class="social-item"><i class="ion-logo-linkedin"></i></a>
			<a href="#" class="social-item"><i class="ion-logo-github"></i></a>
		</div>
		<div class="attrib">
			&copy;Copyright 2023 - Build and Code by Gagan D N, Naman Bafna , Abrar Ashraf  <i class="ion ion-md-heart"></i>
		</div>
	</div>
</nav>
<!-- Main -->
<header class="header">
	<div class="burgermenu" id="burgermenu">
		<span class="burgermenu-open" id="openmenu">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="16">
				<g fill="#252a32" fill-rule="evenodd">
					<path d="M0 0h24v2H0zM0 7h24v2H0zM0 14h24v2H0z" />
				</g>
			</svg>
		</span>
		<span class="burgermenu-close" id="closemenu">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20">
				<path fill="#ffffff" fill-rule="evenodd" d="M17.778.808l1.414 1.414L11.414 10l7.778 7.778-1.414 1.414L10 11.414l-7.778 7.778-1.414-1.414L8.586 10 .808 2.222 2.222.808 10 8.586 17.778.808z" />
			</svg>
		</span>
	</div>
</header>
<main>
<!-- nomination filing-->
<div class="nominationform">
	<h3>Applicatin modification:</h3>
	
	<form  class="upform" action="../actions/update.php" method="post">
		
		<input type="hidden" name="id" value="<?php echo $data["id"] ;?>">
	<lable for="fullname">fullname:
        <input type="text" name="fullname" value="<?php echo $data["fullname"] ;?>">
	</lable>
		<lable for="username">username:
        <input type="text" name="username" value="<?php echo $data["username"] ;?>">
		</lable>
		<lable for="dob">dob:
        <input type="date" name="dob" value="<?php echo $data["dob"] ;?>">
		</lable>
		
		<lable for="phone">phone:
        <input type="number" name="phone" value="<?php echo $data["phone"] ;?>">
		</lable>
		<lable for="email">email:
        <input type="email" name="email" value="<?php echo $data["email"] ;?>">
		</lable>
		
		<lable for="password">password:
        <input type="password" name="password" value="<?php echo $data["password"] ;?>">
		</lable>
		
		<button class="btn" type="submit">Update</button>
        
	</form>
</div>
<div class="status">
	<h3>Applicatin Status:</h3>
	<?php
	if($data['approve']==1){
		?>
		<img src="../resources/images/approved.jpeg" alt="Approved">
		<?php
	}elseif(($data['varified']==1) and ($data['approve']==0)){
	
	?>
	<img src="../resources/images/variapr.png" alt="varified">
	<?php
	}elseif(($data['varified']==2)){
	
	?>
	<img src="../resources/images/rejected.png" alt="varified">
	<?php
	}else{
	
	?>
	<img src="../resources/images/pending.jpg" alt="under review">
	<?php
	}?>

</div>
</main>
</body>
</html>
