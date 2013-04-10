<?php
//session_start();
include '/var/www/Open/trunk/mvc/lang/constant.php';
$row=mysql_fetch_assoc($get);
 
 
?>

<html>
 
 <head>
  <title><?php echo $lang->SITENAME?></title>     
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
 
  <link rel="stylesheet" type="text/css" href="../css/test.css" />
   <link rel="stylesheet" type="text/css"
        href="http://localhost/Open/trunk/mvc/css/standalone.css"/>

  <style>

  

 form.expose {
	
	background: #fff url(/media/img/gradient/h150.png) repeat-x;
	padding: 20px;
	margin: 100px auto;
	text-align: center;
	width: 600px;
	-moz-border-radius: 4px;
 	
        background-image: url(http://localhost/Open/trunk/mvc/images/bkg-plans.png);
 	background-repeat:no-repeat;
   background-size: 1600px;
 	
}
   
        

</style>
 </head>
 
 <body>
     <?php include('header1.php'); ?><br/><br/><br/>
     <img src="http://localhost/Open/trunk/mvc/images/open_logo.png" height="50px" width="150px" style="margin-left: 80px;">
     <header id="header" class="container">
	<nav id="main-nav" class="two-thirds column omega">
			<ul id="main-nav-menu" class="nav-menu">
				<li id="nav-home"><a href="http://localhost/Open/trunk/mvc/user/<?php echo $_SESSION['flag']; ?>" ><?php echo $lang->HOME?></a></li>
				
                <li id="nav-tour"><a a href="http://localhost/Open/trunk/mvc/requesthandler/faq"><?php echo $lang->FAQ?></a></li>

			</ul>
		</nav>
</header>

<div id="wrap">
<div id="gradient">
</div>
</div>
 
         
 <?php 
   if(isset($_SESSION["msgErrors"])){
     foreach($_SESSION["msgErrors"] as $key=>$value){
         print_r($_SESSION["msgErrors"][$key]);
     }
    unset($_SESSION["msgErrors"]);
 }?>
 </div>

     <form class="expose" action="http://localhost/Open/trunk/mvc/controller/controller.php?method=updateProfile" method="post">
	  <table>
    <tr><td><h2 style="text-align:center;"><?php echo $lang->PROFILEVIEW?></h2></td></tr>   
    
    
    
    <tr><td><?php echo $lang->USERNAME?></td>      <td> <input type="text" name="u_name" value="<?php echo($row['user_name']) ?> " disabled="true" /></td></tr>  
     
     <tr><td><?php echo $lang->FIRSTNAME?> </td>     <td><input type="text" name="f_name" value="<?php echo ($row['firstname']) ?>"></td></tr>
     <tr><td><?php echo $lang->LASTNAME?></td>       <td><input type="text" name="l_name" value="<?php echo ($row['lastname']) ?>"></td></tr>
     <tr><td><?php echo $lang->EMAIL?></td>          <td><input type="email"  name="email" value="<?php echo ($row['email']) ?>"></td></tr>
     <tr><td><?php echo $lang->ADDRESS?></td>          <td><textarea rows="2" cols="17" name="address"><?php echo ($row['address']) ?></textarea></td></tr>
     <tr><td><?php echo $lang->PHONENO?> </td>          <td> <input type="text" name="phone" value="<?php echo ($row['phone_no']) ?>"></td></tr>
     <tr><td>College/Company Name</td>    <td><input type="text" name="cname"  value="<?php echo ($row['college_or_company']) ?>"></td></tr>
     <tr><td></td><td><input type="Submit" value="Update" name="submit"></td><td><input type="Submit" value="Cancel"></td></tr>
   </table>
   </form>
  
   
     </div>
    <?php include 'footer1.php';?><br/>
    
    
 </body>
 
</html>

