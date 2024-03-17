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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../styling/voterdashboard.css" />
  <link rel="stylesheet" type="text/css" href="../styling/evm.css"/>
  <link rel="stylesheet" href="../styling/voterid.css" />
  
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
		<li class="navmenu-item"><a href="#" class="navmenu-link">Home</a></li>
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
		<li class="navmenu-item"><a href="#" class="navmenu-link">voter id</a></li>
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
			&copy;Copyright 2020 - Build and Code by Gagan DN,Naman Bafna,Abrar Ashraf <i class="ion ion-md-heart"></i>
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
    <!--voter id start-->
    <div class="voterid">
	<div class="id-card-holder">
		<div class="id-card">
			<img class='logo' src="../resources/images/logo.png"><h5 class="idheader">Election Commistion  of INDIA</h5>
			<div class="header">
            <img src="../uploads/profiles/<?php echo $data['photo']?>" alt="user image">
			</div>
			
			<h2><?php echo $data["fullname"] ;?></h2>
			<h3>gender: <?php echo $data["gender"] ;?></h3>
			<h3>D.O.B: <?php echo $data["dob"] ;?></h3>
			<h3>state: <?php echo $data["state"] ;?></h3>
			
			<div class="qr-code">
				<img src="../images/admin.jpeg">
			</div>
			
      <h3><?php echo $data["id"] ;?></h3>
			<hr>
			<p><strong>INDIAN ELECTION COMMISTION</strong> Neemrana, NH-8 Delhi-Jaipur highway <p>
			<p>District Delhi, Delhi <strong>110001</strong></p>
			<p>Ph: 01494-660600, 7073222393</p>

		</div>
	</div>
	</div>


    <!--voter id end-->
<div class="bg-light">

	<marquee id="marquee">General Board Election</marquee>
  
  <div class="container"> 

         <div class="row">
             <div class="col-md-8">
                     
     	               <h1>EVM-Electronic voting Machine</h1>

     	             
                
     	           <div>
     	           	<table class="table table-bordered table-secondary table-lg">
     	           		        <thead><h4 class="display-6"> welcome to Electronic Voting</h4></thead>
     	           		<th>
     	           			<tr>
     	           				<td>S.No</td>
     	           			    <td>Rocognized parties</td>
     	           			    <td>Party Symbols</td>
     	           			    <td>Voting pad</td>
     	           		   </tr>
     	           		</th>
     	           		<tbody>
     	           			<tr>
                                <?php
                                if(isset($_SESSION['nominee'])){
                                   $nominee=$_SESSION['nominee'] ;
                                   for($i=0;$i<count($nominee);$i++){
                                ?>
                                
     	           				<td> <?php echo $i+1 ?></td>
     	           				<td><?php echo $nominee[$i]['fullname'] ?></td>
     	           				<td> <img src="../uploads/profiles/<?php echo $nominee[$i]['photo'] ?>" alt="Group image1"></td>
     	           				<td>
									<form action="../actions/voteing.php" method="post">
										<input type="hidden" name="nomineevotes" value=" <?php echo $nominee[$i]['vote'] ?>">
										<input type="hidden" name="nomineeid" value=" <?php echo $nominee[$i]['id'] ?>">
										
										<?php
										if($_SESSION['status']==1){
											?>
											<img class="voted_suc" src="../resources/images/voted_suc.png" alt="VOTED">
											<?php
										}else{
												?>
												<button class="vote_btn" type="submit" onclick=confirm()>Vote</button>
										<?php
										}
										?>
								   </form>
								
								
								</td>
     	           			</tr>
                            <?php
                                   }
                            
                                //}
                            
                            ?>
     	           			
     	           		     <tr>
     	           		     	<td><?php echo count($nominee)+1?></td>
     	           		     	<td>NOTA</td>
     	           		     	<td><img src="https://i1.wp.com/factly.in/wp-content/uploads//2017/08/Congress-protesting-use-of-NOTA_factly.jpg?resize=768%2C429&ssl=1" alt="nota"></td>
     	           		     	<td><form action="../actions/voteing.php" method="post">
										<input type="hidden" name="nomineevotes" value=" <?php echo $nominee[ count($nominee)+1]['vote'] ?>">
										<input type="hidden" name="nomineeid" value=" <?php echo count($nominee)+1?>">
										
										<?php
										if($_SESSION['status']==1){
											?>
											<img class="voted_suc" src="../resources/images/voted_suc.png" alt="VOTED">
											<?php
										}else{
												?>
												<button class="vote_btn" type="submit" onclick=confirm()>Vote</button>
										<?php
										}
										?>
								   </form>
									</td>
     	           		     </tr>
								 <?php
								  }else{
									?>
								 <div class="container">
								<p>No Candidates to display</p>
							</div>
							<?php
							 }
							 ?>


     	           		 </tbody>

     	           	</table><br/>
     	           	<br/>
                    <hr>
                    <hr>
                    <br>
                    <br>
                         



                            </table>
                          </div>
                              
     	           	

     	           </div>

             </div>

     <br/>
     <br/>
     <hr>
     <hr>
     <br/>
     <br/>





           <!--   <div>

                    
     	             <div id="result">
                       	<center><a href="results.html" class="btn btn-info" alt="results"  type="submit" id="voting_res">Results</a></center>
                       </div>
                    
                </div> -->



                    </div>

             </div>




</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript" src="../js_scripts/sidemnu.js"></script>
  
<script>
	function confirm(){
		alert("confirm to vote");
	}
</script>

</div>



</main>
</body>
</html>
