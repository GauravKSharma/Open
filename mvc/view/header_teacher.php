<html>
<head>
<title><?php echo $lang->SITENAME?></title>     
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/test.css" />

</head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>



function home()
  {
  $.ajax({
  type: "POST",
  url: '../view/home.php',
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
  url: 'http://localhost/Open/trunk/mvc/view/uploadpaper.php',
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
<img src="../images/open_logo.png" height="50px" width="150px" style="margin-left: 80px;">
<header id="header" class="container" >
	<div id="header-inner" class="sixteen columns over" >
		<div id="masthead" class="one-third column alpha">
			
				
			
		</div>
		
		<nav id="main-nav" class="two-thirds column omega">
			<ul id="main-nav-menu" class="nav-menu">
				<li id="nav-home"><a href="#" onclick="home()"><?php echo $lang->HOME?></a></li>
				<li id="nav-support"><a href="#" onclick="setTest()"><?php echo $lang->SETTEST?></a></li>
				<li id="nav-tour"><a href="#" onclick="viewResultTeacher()"><?php echo $lang->VIEWRESULT?></a></li>
				<li id="nav-support"><a href="#" onclick="upload()"><?php echo $lang->UPLOADPAPER?></a></li>
                <li id="nav-tour"><a a href="http://localhost/Open/trunk/mvc/requesthandler/faq"><?php echo $lang->FAQ?></a></li>

			</ul>
		</nav>
	</div>
	
	

    
</header>
<div id="wrap">
<div id="gradient">
</div>
</div>

<div id="tab2" style="height: 750px;width:85%;margin:80px;margin-left:100px;" >

</div>

<?php if(isset($_REQUEST["upload"]) && $_REQUEST["upload"]=="1") {?>
<SCRIPT>
$(document).ready(function() {
	upload();
  });
</SCRIPT>
<?php } 
unset($_REQUEST["upload"]);
?>