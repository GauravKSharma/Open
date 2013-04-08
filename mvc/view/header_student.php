<html>
<head>

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



  
</script>

<header id="header" class="container">
	<div id="header-inner" class="sixteen columns over">
	 	<div id="masthead" class="one-third column alpha">
		</div>
	    <nav id="main-nav" class="two-thirds column omega">
	      	<ul id="main-nav-menu" class="nav-menu">
		        <li id="nav-home"><a href="#">Home</a></li>
		        <li id="nav-tour"><a href="../controller/controller.php?method=sampleTest">Sample Test</a></li>
		        <li id="nav-support"><a href="#" onclick="viewResult()">View Result</a></li>
		        <li id="nav-prices"><a href="../controller/controller.php?method=faq">FAQ</a></li>
		       
		    </ul>
	    </nav>
	</div>
</header>

<div id="wrap">
<div id="gradient">
</div>
</div>
 
<div id="tab1" style="height: 600px;width:85%;margin:80px;margin-left:100px;border:5px outset #ccc;overflow:scroll; " >

</div>

