<?php 
include '../lang/constant.php';
if(isset($_REQUEST['msg'])){
	echo '<script type="text/javascript">alert("Wrong Category Selected"); </script>';
}
unset($_REQUEST['msg']);
?>

<html>
 
 <head>
  <title><?php echo $lang->SITENAME?></title> 
  <link rel="stylesheet" type="text/css" href="../css/test.css" />    
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <link href="../css/all-317f9ee386b1fa9b62cc328db4b940a7.css" media="all" rel="stylesheet" type="text/css">
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
    
       form.expos{
	
	background: #fff url(/media/img/gradient/h150.png) repeat-x;
	padding: 20px;
	
	
	width: 600px;
	
       
        border: 1px outset #ccc;
      background-color:#c7f8ff;
        
       
        
       
        
}
  </style> 
  <script>
  function faq(fetch)
  {
  $.ajax({
  type: "POST",
  url: '../controller/controller.php?method=faqResponse',
  //data: $('#frmid').serialize(),
  data:"value=" + fetch,

  success: function(data){

  $("#tab3").html(data);
  }
  });
  }
  
    function openwindow(){
	window.open("../view/categoryview.php","popup1","width=500, height=600");
			}
    </script>
 </head>
 
 <body>
     <?php
     
     if(isset($_SESSION['uname'])){
     }?>
      <div  style="height:30px;width:100%;margin-top: 8px;background-color:#383838 ;"><br/><br/><br/><br/>
     <div>
     <div><img src="../images/open_logo.png" height="50px" width="150px" style="margin-left: 80px;"></div>
     <div style="float: right;"><header id="header" class="container" >
	<nav id="main-nav" class="two-thirds column omega">
			<ul id="main-nav-menu" class="nav-menu">
				<li id="nav-home"><a href="http://localhost/Open/trunk/mvc/view/view.php?flag=<?php echo $_SESSION['flag']; ?>" ><?php echo $lang->HOME?></a></li>
			
                <li id="nav-tour"><a a href="../controller/controller.php?method=faq"><?php echo $lang->FAQ?></a></li>

			</ul>
		</nav>
</header></div>
</div>

<div id="wrap">
<div id="gradient">
</div>
</div>

     
  <div  style="height:30px;width:100%;margin-top: 8px;"></div><br/><br/><br/><br/>
     
     
     
    <div>
     <div style="width:15%;height: 550px;border: 1px outset #ccc;float: left;margin-left:20px;">
    <p>Category Related Question</p>
     
    <?php 
    $count = 0; 
    while($row=mysql_fetch_assoc($get)){ 
    $count ++;?>
      <ul>
       
        <li style="margin-left: 20px;"> <a href="#" onclick="faq(<?php echo $count; ?> )"><?php echo ($row['category_name']); ?></a></li>
      </ul> 
        <?php }?>
        
          
       
     </div>  
         <div id="tab3" style="width:55%; height: 600px;margin-left:450px;overflow:auto;">
    
    
     </div> <br/><br/>
     
    <div style="width:70%;float:right;">
   <form action="../controller/controller.php?method=addQuestion" method="POST" class="expos">
      <table align="center">
     <tr>
     <td>
      <?php echo $lang->ADDYOURQUERY?>?</td></tr>
         <tr><td><textarea rows="" cols="20" name="question" required="required"></textarea></td></tr>
      <tr><td><?php echo $lang->SELECTCATEGORY?></td></tr>
         <tr><td><input type="number" name="category" /></td></tr>
         <tr><td><a href="#" onclick="openwindow();"> <?php echo $lang->VIEWCATEGORYCODE?> </a></td></tr>
                              <tr><td><input type="Submit" value="Add Query"/></td></tr>
      
    
   </table>
     </form>
    </div>
     </div>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php include 'footer1.php';?><br/>
 </body>
 
</html>

   