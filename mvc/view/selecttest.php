<?php 
include '../lang/constant.php';
session_start();
?>
<html>
<head>
    <title><?php echo $lang->SITENAME?></title>     
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/test.css" />
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>

 <style>
      form.expose {
	
	background: #fff url(/media/img/gradient/h150.png) repeat-x;
	padding: 20px;
	margin: 20px auto;
	text-align: center;
	width: 600px;
	-moz-border-radius: 4px;
     
    background-image: url(../images/bkg-plans.png);
 	background-repeat:no-repeat;
   background-size: 1000px;
        
       
}
</style>
</head>
<body>

<?php include 'header1.php';?><br/><br/><br/>
<header id="header" class="container" >
	<div id="header-inner" class="sixteen columns over" >
		<div id="masthead" class="one-third column alpha">
			
				
			
		</div>
		<nav id="main-nav" class="two-thirds column omega">
			<ul id="main-nav-menu" class="nav-menu">
				<li id="nav-home"><a href="http://localhost/Open/trunk/mvc/view/view.php?flag=2" ><?php echo $lang->HOME?></a></li>
				
                <li id="nav-tour"><a a href="../controller/controller.php?method=faq"><?php echo $lang->FAQ?></a></li>

			</ul>
		</nav>
	</div>
	
	

    
</header>
<div id="wrap">
<div id="gradient">
</div>
</div><br/><br/><br/>
<div style="margin-left:500px">
    <?php if(isset($_SESSION["msgErrors"]['int'])){
    echo "<p style='color:red;'>".$_SESSION["msgErrors"]['int']."(s)";
   echo "<br/>No of question must be less than you have";
   echo "<br/>Negative marking must be less or equal to zero";
     echo "<br/>time must be more thane zero </p> ";
   unset($_SESSION["msgErrors"]['int']);
 
}
?>  
</div>
<form class="expose" action="http://localhost/Open/trunk/mvc/controller/controller.php?method=settest" method="POST">
<div style="background-image: url(../images/professor-at-desk.png); background-repeat: no-repeat;height:600px;width:600px; ">
  
<table align="right">

<tr><td>No Of Questions:</td></tr><tr><td><input type="number" name="noofques" required="required" min="1" max="<?php echo $_REQUEST['noq']?>"/></td></tr>

<tr><b><td>Negative Marking(if required):</td></b></tr><tr><td><input type="number" name="negative"  required="required" max="-1" min="-32767"></td></tr>
<tr><b><td>Time(in min):</td></b></tr><tr><td><input type="text" name="time" required="required" min="1" max="300"></td></tr>
<tr><b><td>Order</td></b></tr><tr><td><input type="radio" value="1" name="test" required="required">random</td></tr>
<tr><td><input type="radio" value="2" name="test" required="required">sequential</td></tr>
<tr><b><td>Mail Link To</td></b></tr><tr><td><input type="email" name="email" required="required"></td></tr>

<tr><b><td><input type="submit" value="Set" style="background-color: #909090;height: 30px;width:100px;color: white;font-size: 15px;"></td></b></tr>
<tr><td><input type="hidden" name="cat" value="<?php echo $_REQUEST['cat']?>" ></td></tr>
<tr><td><input type="hidden" name="noq" value="<?php echo $_REQUEST['noq']?>" ></td></tr>
</table>
</div>
</form>

</body>
</html>