<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>



<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
      <?php 
$pagetype=$_GET['type'];
$sql = "SELECT Address,EmailId,ContactNo from tblcontactusinfo";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<div class="col-sm-9 col-md-10">
          <div class="header_info">
          <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-map-marker" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Address : </p>
              <a href="#"><?php   echo htmlentities($result->Address); ?></a>
              </div>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Email : </p>
              <a href="#"><?php   echo htmlentities($result->EmailId); ?></a>
              </div>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Tel No : </p>
              <a href="tel:61-1234-5678-09"><?php   echo htmlentities($result->ContactNo); ?></a> </div>
            <div class="social-follow">
              
            </div>
            </div>
        </div>
        <?php }} ?>
      </div>
    </div>
  </div>
  
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> 
<?php 
$email=$_SESSION['login'];
$sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->FullName); }}?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
           <?php if($_SESSION['login']){?>
            <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="update-password.php">Update Password</a></li>
            <li><a href="my-booking.php">My Booking</a></li>
            <li><a href="post-feedback.php">Post a Feedback</a></li>
          <li><a href="my-feedbacks.php">My Feedbacks</a></li>
            <li><a href="logout.php">Log Out</a></li>
            <?php } else { ?>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
              <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Update Password</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Booking</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Post a Feedback</a></li>
          <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Feedbacks</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Log Out</a></li>
            <?php } ?>
          </ul>
            </li>
            <?php   if(strlen($_SESSION['login'])==0)
	{	
?>
 <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
<?php }
else{
  echo '<p style="color: red; text-align: center">
  Welcome
  </p>';
}
 ?> 

          </ul>
        </div>
        
        

    

  



      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a>    </li>
          	 
          <li><a href="page.php?type=aboutus">About Us</a></li>
          <li><a href="vehicle-listing.php">Vehicles</a>
          <li><a href="page.php?type=terms">Terms and Conditions</a></li>
          <li><a href="contact-us.php">Contact Us</a></li>
          <li><a href="admin/">Admin Login</a></li>
         

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
  
</header>


















