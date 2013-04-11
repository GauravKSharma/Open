<html>
<head>
<title><?php echo $lang->SITENAME?></title>     
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/test.css" />

</head>
<script>
    
    
    
function viewResult()
  {
  $.ajax({
  type: "POST",
  url: '../controller/controller.php?method=viewResult',
  //data: $('#frmid').serialize(),
  //data:"value=" + fetch,

  success: function(data){

  $("#tab1").html(data);
 
  }
  });
  }

function home()
  {
  $.ajax({
  type: "POST",
  url: '../view/home.php',
  //data: $('#frmid').serialize(),
  //data:"value=" + fetch,

  success: function(data){

  $("#tab1").html(data);
 
  }
  });
  }


  
</script>
<img src="../images/open_logo.png" height="50px" width="150px" style="margin-left: 80px;">
<header id="header" class="container">
	<div id="header-inner" class="sixteen columns over">
	 	<div id="masthead" class="one-third column alpha">
		</div>
	    <nav id="main-nav" class="two-thirds column omega">
	      	<ul id="main-nav-menu" class="nav-menu">
		        <li id="nav-home"><a href="#" onclick="home()"><?php echo $lang->HOME?></a></li>
		        <li id="nav-tour"><a href="http://localhost/Open/trunk/mvc/requesthandler/sampleTest"><?php echo $lang->SAMPLETEST?></a></li>
		        <li id="nav-support"><a href="#" onclick="viewResult()"><?php echo $lang->VIEWRESULT?></a></li>
		        <li id="nav-prices"><a href="../controller/controller.php?method=faq"><?php echo $lang->FAQ?></a></li>
		       
		    </ul>
	    </nav>
	</div>
</header>

<div id="wrap">
<div id="gradient">
</div>
</div>
 
<div id="tab1" style="height: 750px;width:85%;margin:80px;margin-left:100px; " >

</div>

