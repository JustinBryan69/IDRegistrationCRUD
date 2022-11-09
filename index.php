<?php
include 'functions.php';
// Your PHP code here.

// Home Page template below.
?>

<?=template_header('Home')?>

<div class="content">
	<h2>Welcome to</h2>
	<p>University of the Cordilleras Student Enrollment!</p>
		<a href="create.php" class="create-contact">Enroll Now!</a>
</div>

<?=template_footer()?>

<style type="text/css">
.form-style-3{
       max-width: 450px;

    
}

a {
	display: inline-block;
  	text-decoration: none;
  	background-color: #15678a;
  	font-weight: bold;
  	font-size: 14px;
  	color: #FFFFFF;
  	padding: 10px 15px;
  	margin: 15px 0;

}
p {
  position: absolute;
  top: 10%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: #92cbdf;
  padding: 50x 50px;
 font-size: 30px;
   display: flex;
  justify-content: center;

}
h2 {
  position: absolute;
  top: 5%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: #92cbdf;
  padding: 50x 50px;
 font-size: 30px;
   display: flex;
  justify-content: center;

}

</style>

