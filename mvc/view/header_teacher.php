<html>
<head>

<link rel="stylesheet" type="text/css" href="../css/test.css" />

</head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>



function home()
{
$.ajax({
type: "POST",
url: 'home.html',
//data: $('#frmid').serialize(),
//data:"value=" + fetch,

success: function(data){

$("#tab2").html(data);
}
});
}


function upload()
  {
  $.ajax({
  type: "POST",
  url: 'uploadpaper.php',
  //data: $('#frmid').serialize(),
  //data:"value=" + fetch,

  success: function(data){

  $("#tab2").html(data);
  }
  });
  }
function setTest()
  {
  $.ajax({
  type: "POST",
  url: '../controller/controller.php?method=findpaper',
  //data: $('#frmid').serialize(),
  //data:"value=" + fetch,

  success: function(data){

  $("#tab2").html(data);
  }
  });
  }
  
function viewResultTeacher()
{
$.ajax({
type: "POST",
url: '../controller/controller.php?method=viewResultTeacher',
//data: $('#frmid').serialize(),
//data:"value=" + fetch,

success: function(data){

$("#tab2").html(data);
}
});
}

</script>
<header id="header" class="container" >
	<div id="header-inner" class="sixteen columns over" >
		<div id="masthead" class="one-third column alpha">
			
				
			
		</div>
		<nav id="main-nav" class="two-thirds column omega">
			<ul id="main-nav-menu" class="nav-menu">
				<li id="nav-home"><a href="#" onclick="home()">Home</a></li>
				<li id="nav-support"><a href="#" onclick="setTest()"> Set Test </a></li>
				<li id="nav-tour"><a href="#" onclick="viewResultTeacher()">View Result</a></li>
				<li id="nav-support"><a href="#" onclick="upload()">Upload Paper</a></li>
                <li id="nav-tour"><a a href="../controller/controller.php?method=faq">FAQ</a></li>

			</ul>
		</nav>
	</div>
	
	

    
</header>
<div id="wrap">
<div id="gradient">
</div>
</div>
 
<div id="tab2" style="height: 600px;width:85%;margin:80px;margin-left:100px;border:5px outset #ccc;overflow:scroll; " >

</div>

