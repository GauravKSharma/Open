<?php
//include '../lang/constant.php';
?>

<html class="js canvas canvastext rgba borderradius boxshadow textshadow cssanimations cssgradients csstransitions fontface video wf-arvo-n4-active wf-arvo-n7-active wf-annieuseyourtelescope-n4-inactive wf-active" lang="en"><!--<![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><script src="../js/twitterlib.js"></script>
<!-- Meta -->
<meta charset="utf-8">
<meta name="geo.region" content="US-AK">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<head>
<title><?php echo $lang->SITENAME?></title>     
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <style>

li {
	display:inline;
	
}
li a:link {
	text-decoration:none;
}
li a:hover {
	color:orange;
}
</style>


</head>

	
<title>Online Portal For Examination</title>

<link href="../css/all-317f9ee386b1fa9b62cc328db4b940a7.css" media="all" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/prettyPhoto.css">

<!-- Fonts -->
<link href="../css/css_002.css" rel="stylesheet" type="text/css">
<link href="../css/css_003.css" rel="stylesheet" type="text/css">
<link href="../css/css.css" rel="stylesheet" type="text/css">

<!-- Favicons -->
<link href="../images/favicon.ico" rel="shortcut icon">
<link href="../images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="../images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="../images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">

<!-- JS -->
<script src="../html/ga.html" async="" type="text/javascript"></script><script async="" type="text/javascript" src="../js/webfont.js"></script><script src="../js/all-ae90ca9b060d344fdbfb877cc59dfaa4.js" type="text/javascript"></script>
<link href="css/css_004.css" rel="stylesheet">
<script id="twitterlib1362133953873" src="../html/user_timeline.html"></script>

</head>
<body class="body js-enabled">
  

<div id=123 style="height:50px;width:100%;margin-top: 8px;background-color:#383838 ;">
<div id=1234 style="height:50px;width:15%; float:left;background-color:#383838 ;"></div>
<div id=1234 style="height:50px;width:15%; float:left;background-color:#383838 ;">
<?php
					//session_start ();
					if (isset ( $_SESSION ['uname'] )) {?>
						 <strong style="color:white;"> <?php echo $lang->WELCOME?> &nbsp;&nbsp; </strong>  <em style="color:white;"><?php echo $_SESSION ['uname'];?></em><?php
					}
					?>
</div>

             <div id=12345 style="height:30px;width:35%; float:right;">  
             <ul id="main-nav-menu" class="nav-menu">
		        <li><a href="../view/changepassword.php" id="changes" style="color: white;"><?php echo $lang->CHANGE?> |</a></li>
		       
		        <li id="nav-tour"><a href="../requesthandler/update" onclick="update()" style="color: white"><?php echo $lang->PROFILEUPDATE?>|</a></li>
		        <li><a href="../view/logout.php" style="color: white"><?php echo $lang->LOGOUT?></a></li>
			</ul>
							
						
              
            
</div>
</div>


