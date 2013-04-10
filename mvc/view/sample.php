<?php
//session_start();
include '../lang/constant.php';

if(isset($_SESSION['uname'])){
include('header1.php');    
}
?>
<html>
 
 <head>
  <title><?php echo $lang->SITENAME?></title>     
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/test.css" />
   <link rel="stylesheet" type="text/css"
        href="../css/standalone.css"/>

  <style>

  

 form.expose {
	
	background: #fff url(/media/img/gradient/h150.png) repeat-x;
	padding: 20px;
	margin: 100px auto;
	text-align: center;
	width: 600px;
	-moz-border-radius: 4px;
 	
        background-image: url(../images/bkg-plans.png);
 	background-repeat:no-repeat;
   background-size: 1600px;
 	
}
   
        

</style>
  

<style>
   li {
    display: inline;
   }
   li a {
    text-decoration: none;
   }
  </style> 

 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script>
  function faq(fetch)
  {
  $.ajax({
  type: "POST",
  url: '../controller/controller.php?method=fetchTeacher',
  //data: $('#frmid').serialize(),
  data:"value=" + fetch,

  success: function(data){

  $("#tab2").html(data);
  }
  });
  }
 </script>
 </head>
 <body>
     <br/><br/>
     <div>
          <div><img src="../images/open_logo.png" height="50px" width="150px" style="margin-left: 80px;"></div>
     <div style="float: right;"><header id="header" class="container">
	  <nav id="main-nav" class="two-thirds column omega">
			<ul id="main-nav-menu" class="nav-menu">
				<li id="nav-home"><a href="http://localhost/Open/trunk/mvc/view/view.php?flag=3" ><?php echo $lang->HOME?></a></li>
				
                <li id="nav-tour"><a a href="../controller/controller.php?method=faq"><?php echo $lang->FAQ?></a></li>

			</ul>
		</nav>
</header>
</div>
<div>

<div id="wrap">
<div id="gradient">
</div>
</div>
  <div  style="height:30px;width:100%;margin-top: 8px;"><br/><br/><br/>
   <div>
   <div style="height:850px;">
   <div style="width:15%;height: 450px;border: 1px outset #ccc;float: left;margin-left:20px;">
    <?php 
    $count = 0; 
    while($row=mysql_fetch_assoc($view)){ 
    $count ++;?>
     <ul>   
        <li style="margin-left:20px;"><a href="#" onMouseover="faq(<?php echo $count; ?> )"><?php echo ($row['category_name']); ?></a></li>
     </ul>
        <?php }?>  
   </div>

     
     <div id="tab2" style="width:80%; float: right;height: 40px;">
         
     </div>
     </div>
     </div>
      
      <?php include 'footer1.php';?><br/>
 </body>
 
</html>
