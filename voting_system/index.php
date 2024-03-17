<!-- <div class="notice">
    <img src="./resources/images/randpic3.jpeg" alt="img1">
    <img src="./resources/images/growthindia.jpg" alt="img1">
    <img src="./resources/images/evote.jpeg" alt="img1">
    <img src="./resources/images/randpic5.jpeg" alt="img1">
    
    <img src="./resources/images/ranpics.jpeg" alt="img1">
    <img src="./resources/images/bg2.jpeg" alt="img1">
    <img src="./resources/images/randpic2.jpeg" alt="img1">
    <img src="./resources/images/randpic4.jpeg" alt="img1">
   </div>-->




<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./styling/index.css" />
    <script scr="./js_script/autoslite.js"></script>

    <title>DashBoard</title>

</head>

<body>
   
    <h1>DIGITAL E-VOTING</h1>

    <div class="overview">
        <div class="slideshow-container">

            <div class="mySlides fade">
                <img src="./resources/images/growthindia.jpg" alt="img1">
            </div>
            <div class="mySlides fade">
                <img src="./resources/images/randpic5.jpeg" alt="img1">
            </div>
            <div class="mySlides fade">
                <img src="./resources/images/randpic3.jpeg" alt="img1">
            </div>
            <div class="mySlides fade">
                <img src="./resources/images/randpic4.jpeg" alt="img1">
            </div>
            <div class="mySlides fade">
                <img src="./resources/images/evote.jpeg" alt="img1">
            </div>
            <div class="mySlides fade">
                <img src="./resources/images/ranpics.jpeg" alt="img1">
            </div>
            <div class="mySlides fade">
                <img src="./resources/images/randpic2.jpeg" alt="img1">
            </div>
            <div class="mySlides fade">
                <img src="./resources/images/randpic4.jpeg" alt="img1">
            </div>
            <div class="mySlides fade">
                <img src="./resources/images/bg2.jpeg" alt="img1">
            </div>


            <br>

            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </div>

    <div class="notification">
        <marquee><a href="#">Genera board Elections date reasing soon</a></marquee>
        <marquee><a href="./partials/login.html">Applicatin for new voter Enrollment</a></marquee>
        <marquee><a href="./partials/login.html">Applicatin for Nomination has released</a></marquee>
        <marquee><a href="">Latest Election UPDATES and NEWS</a></marquee>
        <marquee><a href=""></a></marquee>
    </div>


    <div class="votingResult">
        
    </div>
    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>
<?php

include('./actions/connect.php');
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

<table class="table table-bordered table-secondary table-lg">
     	           		        <thead><h4 class="display-6"> LIVE VOTING RESULTS</h4></thead>
     	           		<th>
     	           			<tr>
     	           			    <td>Candidates</td>
     	           			    <td> Symbols</td>
     	           			    <td>Votes</td>
     	           		   </tr>
     	           		</th>
     	           		<tbody>
     	           			<tr>
                                <?php
        if(isset($_SESSION['$nomineedata'])){
            $nomineedata=$_SESSION['$nomineedata'] ;
           for($i=0;$i<count($nomineedata);$i++){
        ?>
                                
     	           				
     	           				<td><?php echo $nomineedata[$i]['fullname'] ?></td>
     	           				<td> <img clss="small-img" src="./uploads/profiles/<?php echo $nomineedata[$i]['photo'] ?>" alt="Group image1"></td>
     	           				<td>
									
                                    <?php echo $nomineedata[$i]['vote'] ?>
								
								</td>
     	           			</tr>
                            <?php
                                   }
                            
                                //}
                            
                            ?>
     	           			
     	           		     <tr>
     	           		     	
     	           		     	<td>NOTA</td>
     	           		     	<td><img clss="redused-img" src="https://i1.wp.com/factly.in/wp-content/uploads//2017/08/Congress-protesting-use-of-NOTA_factly.jpg?resize=768%2C429&ssl=1" alt="nota"></td>
     	           		     	<td><?php 
                                $SQL="select nota from votes;";
                                $nota_count=mysqli_query($connect,$SQL);
                                if(mysqli_num_rows($nota_count)>0){
                                    $nota_count=mysqli_fetch_all($nota_count,MYSQLI_ASSOC);
                                    $_SESSION['$nota_count']=$nota_count;
                                }
                                $nota_count=$_SESSION['$nota_count'];
                                echo array_sum($nota_count);  
                              ?></td>
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

     	           	</table>
</body>


</html>