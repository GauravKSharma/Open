<?php
session_start();
include_once 'lang/constant.php';
$_SESSION['basepath']='http://localhost/../../';

//session_start();
if(isset($_REQUEST['msg'])){
    echo '<script type="text/javascript">alert("Feedback Recorded"); </script>';

    unset($_REQUEST['msg']);
}


if(isset($_SESSION['uname'])){
 header("Location:view/view.php?flag=".$_SESSION['flag']);
}


?>

<script src="../fancybox/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {	
	var width = window.innerWidth;
	var height = window.innerHeight;
    $("#forgot").fancybox({
            'width'            : width/2 ,
            'height'        : height/2-170,
            'autoScale'        : false,
            'transitionIn'        : 'none',
            'transitionOut'        : 'none',
            'type'            : 'iframe',
            'overlayColor': 'white',
            'margin':'180'
    });
});
</script>
<link href="../fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css">
<script src="../fancybox/jquery.fancybox-1.3.4.js"></script>
<script src="../fancybox/jquery.fancybox-1.3.4.pack.js"></script>


<html class="js canvas canvastext rgba borderradius boxshadow textshadow cssanimations cssgradients csstransitions fontface video wf-arvo-n4-active wf-arvo-n7-active wf-annieuseyourtelescope-n4-inactive wf-active" lang="en"><!--<![endif]--><head>
<title><?php echo $lang->SITENAME?></title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<script src="fancybox/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {	
	var width = window.innerWidth;
	var height = window.innerHeight;
    $("#forgot").fancybox({
            'width'            : width/2 ,
            'height'        : height/2-170,
            'autoScale'        : false,
            'transitionIn'        : 'none',
            'transitionOut'        : 'none',
            'type'            : 'iframe',
            'overlayColor': 'transparent',
            'margin':'180'
    });
});
</script>

<link href="css/all-317f9ee386b1fa9b62cc328db4b940a7.css" media="all" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/prettyPhoto.css">
<link href="css/css_002.css" rel="stylesheet" type="text/css">
<link href="css/css_003.css" rel="stylesheet" type="text/css">
<link href="css/css.css" rel="stylesheet" type="text/css">

<script src="html/ga.html" async="" type="text/javascript"></script>
<script async="" type="text/javascript" src="js/webfont.js"></script><script src="js/all-ae90ca9b060d344fdbfb877cc59dfaa4.js" type="text/javascript"></script>

<link href="css/css_004.css" rel="stylesheet">
<script id="twitterlib1362133953873" src="html/user_timeline.html"></script>
<script src="fancybox/jquery.fancybox-1.3.4.js"></script>
<script src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
</head>    
    
    
<body class="body js-enabled" >
    <div class="wrap">
        <div class="layer" >
            
    <div class="drop-container">
        <div style="display: block;" class="drop-panel" >
            <div class="container" >
                <div class="two-thirds column" >
                    <h3><?php echo $lang->READYTOLOGIN?></h3>
                    <p class="nobottom"><?php $lang->WELCOME?></p>
                    <p class="nobottom"><?php echo $lang->QUOTE?>.
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $lang->ELBERT?></p>
                </div>
                <div class="one-third column" style="text-align:center;">
                    <div class="tagline medium notop"><?php echo $lang->PLEASESELECTLOGIN?></div>
						<span>
						        <a href="view/teacher_login.php" rel="#overlay" style="text-decoration:none"><button type="button"><?php echo $lang->TEACHERLOGIN?></button></a>
							<a href="view/student_login.php" rel="#overlay" style="text-decoration:none"><button type="button"><?php echo $lang->STUDENTLOGIN?></button></a>
							<div class="apple_overlay" id="overlay">
                                                          <!-- the external content is loaded inside this tag -->
                                                        <div class="contentWrap"></div>
                                                        </div>
                                                </span>
                    
                    
                </div>
            </div>
        </div>
    	<div class="drop-bar-container">
    		<div class="container">
    			<div class="drop-bar sixteen columns far-edge">
					<a href="#" id="drop-panel-expando"><?php echo $lang->LOGIN?></a>
				</div>
			</div>
		</div>
	</div>

<!-- Header -->
<header id="header" class="container">
	<div id="header-inner" class="sixteen columns over">
	 	<div id="masthead" class="one-third column alpha">
	    	<h1 id="site-title" class="remove-bottom"><a href="#"><img src="images/open_logo.png" alt="Exam Professor, Inc." height="70" width="180"></a></h1>
		</div>
	    <nav id="main-nav" class="two-thirds column omega">
	      	<a href="#main-nav-menu" class="mobile-menu-button button">+ Menu</a>
		    <ul id="main-nav-menu" class="nav-menu">
		        <li id="nav-home"><a href="index.php"><?php echo $lang->HOME?></a></li>
		        <li id="nav-tour"><a href="controller/controller.php?method=sampleTest" target="_top"><?php echo $lang->SAMPLETEST?></a></li>
		        <li id="nav-support"><a href="#" target="_top"><?php echo $lang->SUPPORT?></a></li>
		        <li id="nav-prices"><a href="controller/controller.php?method=faq" target="_top"><?php echo $lang->FAQ?></a></li>
		    </ul>
	    </nav>  
	</div>
</header>
<!-- end Header -->

            <div class="container" id="main" role="main"><div class="messageContainer alert" style="display: none"></div>
                <div class="sixteen columns">

	<!-- FlexSlider -->
	<div class="flex-container">
	  <div style="overflow: hidden;" class="flexslider">
	    <ul style="width: 1200%; margin-left: -3760px;" class="slides"><li style="width: 940px; float: left; display: block;" class="clone">
				<img src="images/image04.png" alt="">
				<span class="decoration04">decoration</span>
				<div style="right: 40px; top: 60px;" class="container">
					<h2 class="txt-question2">Use Open to...</h2>
					<h3 class="txt-answer4">Make money!</h3>
					<div class="holder">
					<p style="display: none;" class="info-mobile1">Use Open to make money!
						<a href="#" title="Sign Up"><img src="images/btn-learn-mobile.png" alt="sign up" class="btn-signup-mobile-ro"></a></p>
					<p style="display: none;" class="info-mobile2">Open enables students to self-register at your site for free, or by using any major credit card.
						<a href="#" title="Sign Up"><img src="images/btn-learn-mobile.png" alt="sign up" class="btn-signup-mobile-ro"></a></p>
					<p class="info">Open enables your students to 
self-register at your site for free, or by using any major credit card. 
With Open you can build, deploy, and collect payment with 
professionalism in only a few short minutes.</p>
					</div>
					<ul class="links-list">
						<li><a class="btn-learn" href="#" title="Learn More"><img src="Test%20Maker%20-%20Online%20Quiz%20Creator%20-%20Generate%20Multiple%20Choice%20Exams_files/btn-learn.png" class="btn-learn-ro" alt="learn more"></a></li>
					</ul>
				</div>
	    	</li>
	    	<li style="width: 940px; float: left; display: block;">
				<img src="images/image01.png" alt="">
				<span class="decoration01">decoration</span>
				<div style="right: 50px; top: 60px;" class="container1">
					<h2 class="txt-question1">Want to publish exams online?</h2>
					<h3 class="txt-answer1">We've got the answer!</h3>
					<div class="holder">
						<p style="display: none;" class="info-mobile1">Want to publish exams online? We've got the answer!
							<a href="#" title="Sign Up"><img src="images/btn-signup-mobile.png" alt="sign up" class="btn-signup-mobile-ro"></a></p>
						<p style="display: none;" class="info-mobile2">Open is a web-based tool that allows you to build, embed, and manage your own exams.
							<a href="#" title="Sign Up"><img src="images/btn-signup-mobile.png" alt="sign up" class="btn-signup-mobile-ro"></a></p>
						<p class="info">Open is a web-based tool that allows you
 to build, embed, and manage your own exams, tests or quizzes (or drill 
and practice) quickly and easily. From professors setting up their final
 exam to small businesses training employees, Exam Professor is a breeze
 to use.</p>
					</div>
					<ul class="links-list">
						<li><a class="btn-signup" href="view/register.php" title="Sign Up"><img src="images/btn-signup.png" class="btn-signup-ro" alt="sign up"></a></li>
						<li><a class="btn-learn1" href="#" title="Learn More"><img src="images/btn-learn.png" class="btn-learn-ro" alt="learn more"></a></li>
					</ul>
				</div>
	    	</li>
	    	<li style="width: 940px; float: left; display: block;">
				<img src="images/image02.png" alt="">
				<div style="right: 40px; top: 60px;" class="container">
					<h2 class="txt-question2">Use Open to...</h2>
					<h3 class="txt-answer2">Offer web exams!</h3>
					<div class="holder">
						<p style="display: none;" class="info-mobile1">Use Open to offer web exams!
							<a href="#" title="Sign Up"><img src="images/btn-learn-mobile.png" alt="sign up" class="btn-learn-mobile-ro"></a></p>
						<p style="display: none;" class="info-mobile2">Exam Professor is an easy way to create high-quality quizzes and add them to any site.
							<a href="#" title="Sign Up"><img src="images/btn-learn-mobile.png" alt="sign up" class="btn-learn-mobile-ro"></a></p>
						<p class="info">Open is an easy way to create 
high-quality quizzes and add them to any site. You can embed individual 
exams or the entire student interface, and customize the color and logo 
to match your site.</p>
					</div>
					<ul class="links-list">
						<li><a class="btn-learn" href="#" title="Learn More"><img src="images/btn-learn.png" class="btn-learn-ro" alt="learn more"></a></li>
					</ul>
				</div>
	    	</li>
	    	<li style="width: 940px; float: left; display: block;">
				<img src="images/image03.png" alt="">
				<div style="right: 40px; top: 60px;" class="container-narrow">
					<h2 class="txt-question3">It is perfect for...</h2>
					<h3 class="txt-answer3">Training!</h3>
					<div class="holder">
						<p style="display: none;" class="info-mobile1">It is perfect for training!
							<a href="#" title="Sign Up"><img src="images/btn-signup-mobile.png" alt="sign up" class="btn-learn-mobile-ro"></a></p>
						<p style="display: none;" class="info-mobile2">Open is used by educators, non-profits, and businesses.
							<a href="#" title="Sign Up"><img src="images/btn-signup-mobile.png" alt="sign up" class="btn-learn-mobile-ro"></a></p>
						<p class="info">Open is used by educators, non-profits, 
businesses, and other professionals who need an easy way to publish 
exams, tests, and quizzes online quickly.</p>
					</div>
					<ul class="links-list">
						<li><a class="btn-signup" href="view/register.php" title="Sign Up"><img src="images/btn-signup.png" class="btn-signup-ro" alt="sign up"></a></li>
					</ul>
				</div>
	    	</li>
	    	<li style="width: 940px; float: left; display: block;">
				<img src="images/image04.png" alt="">
				<span class="decoration04">decoration</span>
				<div style="right: 40px; top: 60px;" class="container">
					<h2 class="txt-question2">Use Open to...</h2>
					<h3 class="txt-answer4">Make money!</h3>
					<div class="holder">
					<p style="display: none;" class="info-mobile1">Use Open to make money!
						<a href="#" title="Sign Up"><img src="images/btn-learn-mobile.png" alt="sign up" class="btn-signup-mobile-ro"></a></p>
					<p style="display: none;" class="info-mobile2">Open enables students to self-register at your site for free, or by using any major credit card.
						<a href="#" title="Sign Up"><img src="images/btn-learn-mobile.png" alt="sign up" class="btn-signup-mobile-ro"></a></p>
					<p class="info"><?php echo $lang->QUOTE2?>s</p>
					</div>
					<ul class="links-list">
						<li><a class="btn-learn" href="#" title="Learn More"><img src="images/btn-learn.png" class="btn-learn-ro" alt="learn more"></a></li>
					</ul>
				</div>
	    	</li>
	    <li style="width: 940px; float: left; display: block;" class="clone">
				<img src="images/image01.png" alt="">
				<span class="decoration01">decoration</span>
				<div style="right: 50px; top: 60px;" class="container1">
					<h2 class="txt-question1">Want to publish exams online?</h2>
					<h3 class="txt-answer1">We've got the answer!</h3>
					<div class="holder">
						<p style="display: none;" class="info-mobile1">Want to publish exams online? We've got the answer!
							<a href="#" title="Sign Up"><img src="images/btn-signup-mobile.png" alt="sign up" class="btn-signup-mobile-ro"></a></p>
						<p style="display: none;" class="info-mobile2">Exam Professor is a web-based tool that allows you to build, embed, and manage your own exams.
							<a href="#" title="Sign Up"><img src="images/btn-signup-mobile.png" alt="sign up" class="btn-signup-mobile-ro"></a></p>
						<p class="info"><?php echo $lang->QUOTE3?></p>
					</div>
					<ul class="links-list">
						<li><a class="btn-signup" href="view/register.php" title="Sign Up"><img src="images/btn-signup.png" class="btn-signup-ro" alt="sign up"></a></li>
						<li><a class="btn-learn1" href="#" title="Learn More"><img src="images/btn-learn.png" class="btn-learn-ro" alt="learn more"></a></li>
					</ul>
				</div>
	    	</li></ul>
	  </div>
 	<ol class="flex-control-nav"><li><a class="">1</a></li><li><a class="">2</a></li><li><a class="">3</a></li><li><a class="active">4</a></li></ol><ul class="flex-direction-nav"><li><a class="prev" href="#">\E2\86?</a></li><li><a class="next" href="#">→</a></li></ul><div class="flex-pauseplay"><span class="pause">Pause</span></div></div>
				
	
</div>

<!-- Mosaic Layout -->		
<div class="mosaic row clearfix" id="featured-columns">
		
	<!-- feature column 1 -->
	<div class="feature-column one-third column">
		<a href="view/team.php" title="Meet the Team">
			<!-- meet the team -->
			<div style="left: 120px; top: 410px;" id="feature-icon-1">
				<img src="images/ico-1.png" alt="Meet the Team">
				<h3>Meet the Team</h3>
			</div>
			<img src="images/bkg-box-blue.png" alt="Meet the Team" class="scale-with-grid">
		</a>
	</div>
	<!-- end .feature-column -->
	
	<!-- feature column 2 -->
	<div class="feature-column one-third column">
		<!-- turn off SSL because breaks in Chrome -->
		<a href="#" title="See a Demo">
			<!-- meet the team -->
			<div style="left: 440px; top: 410px;" id="feature-icon-2">
				<img src="images/ico-2.png" alt="Take a Demo">
				<h3>See a Demo</h3>
			</div>
			<img src="images/bkg-box-blue.png" alt="Take a Demo" class="scale-with-grid">
		</a>
	</div>
	<!-- end .feature-column -->

	<!-- feature column 3 -->
	<div id="scrolltobottom" class="feature-column one-third column">
		<a href="#" title="Contact Us">
			<!-- scroll to contact form -->
			<div style="left: 760px; top: 410px;" id="feature-icon-3">
				<img src="images/ico-3.png" alt="Contact Us">
				<h3>Contact Us</h3>
			</div>
			<img src="images/bkg-box-blue.png" alt="Contact Us" class="scale-with-grid">
		</a>
	</div>
	<!-- end .feature-column -->
	
</div>
<!-- end mosaic -->

<!-- Portfolio Grid Layout -->
<div class="portfolio col-2">
	<article class="portfolio-item eight columns left">
		<h3 class="txt-what">What is it?</h3>
		<p><?php echo $lang->QUOTE3?></p>
		<p><?php echo $lang->QUOTE4?>.</p>
		<p><a class="btn-learn" href="#" title="Learn More"><img src="images/btn-learn.png" class="btn-learn-ro" alt="Learn More"></a></p>
	</article>
	<article class="portfolio-item eight columns">
		<h3 class="txt-signup">Sign-up in two minutes</h3>
		<p><?php echo $lang->QUOTE5?></p>
		<p><?php echo $lang->QUOTE6?></p>
		<p><a class="btn-signup" href="view/register.php" title="Sign Up"><img src="images/btn-signup.png" class="btn-signup-ro" alt="Sign Up"></a></p>
	</article>
</div>

<hr class="mini">

<!-- Tagline -->
<div class="tagline">
	<strong>Open</strong> <?php echo $lang->QUOTE7?>
	<span class="fleuron"></span>
</div>
<!-- end Tagline -->

<br>

            </div>
        </div>
    </div>
    <!-- footer -->
<footer id="colophon" style="background-color:#383838; ">
	<div class="footer-upper container">
	
		<div class="one-third column manifesto">
			<h2><?php echo $lang->OURMANIFESTO?></h2>
			<p><?php echo $lang->QUOTE8?></p>
			<p><?php echo $lang->QUOTE9?></p>
			<p class="contact-info">
				<div class="clear"></div>
				
			<div class="social">
				<ul>
					<li><a href="#" class="fade" title="flickr">
						<img style="opacity: 1;" src="images/flickr.png" alt="flickr" height="35" width="35"></a></li>
					<li><a href="#" class="fade" title="facebook">
						<img style="opacity: 1;" src="images/facebook.png" alt="facebook" height="35" width="35"></a></li>
					<li><a href="" class="fade" title="linkedin">
						<img style="opacity: 1;" src="images/linked-in.png" alt="linkedin" height="35" width="35"></a></li>
					<li><a href="" class="fade" title="stumbleupon">
						<img style="opacity: 1;" src="images/stumbleupon.png" alt="stumbleupon" height="35" width="35"></a></li>
					<li><a href="#" class="fade" title="twitter">
						<img style="opacity: 1;" src="images/twitter.png" alt="twitter" height="35" width="35"></a></li>
					<li><a href="" class="fade" title="vimeo">
						<img style="opacity: 1;" src="images/vimeo.png" alt="vimeo" height="35" width="35"></a></li>
				</ul>
				<br>
			</div>					
		</div>
		
		<div class="one-third column" >
                    &nbsp;&nbsp;&nbsp;&nbsp;
                  
			</div>
		
		
		
		
		<div class="one-third column">
            <div id="contact-form-small">
                        
    <div class="label">
        <img src="images/email_icon.png" alt="">
        <h3><?php echo $lang->SENDUSEMAIL?><span><?php echo $lang->QUOTE10?></span></h3>
    </div>
    <form action="controller/controller.php?method=feedback" method="post">
        
        <input name="spam_check" value="" type="hidden">
        <fieldset>
            <?php echo $lang->NAME?><input name="name" tabindex="1" type="text" required="required">
            <?php if(isset($_SESSION["msgErrors"][0])) {?>
            <label style="font-size:8px; background-color: red;"><b><?php print_r($_SESSION["msgErrors"][0]); ?></label> 
	    <?php } ?> 
	          
            <?php echo $lang->EMAIL?><input name="email" id="email" tabindex="2" type="email" required="required">
            <?php if(isset($_SESSION["msgErrors"][1])) {?>
            <label style="font-size:8px; background-color: red;"><?php print_r($_SESSION["msgErrors"][1]); ?></label> 
	    <?php } 
           unset($_SESSION["msgErrors"]);
            ?>
        </fieldset>
        <fieldset>
            <?php echo $lang->MESSAGE?><textarea name="message" id="message" rows="" cols="" tabindex="3"></textarea>
        </fieldset>
        <div>
            <br/>
            <button class="button button-half" name="submit" type="submit" id="submit" tabindex="4" value=""><?php echo $lang->SEND?></button>
        </div>
    </form>
	<div id="contact_form_target"></div>
    <div id="response"></div>
</div>

		</div>
		
		<div class="clear"></div>
		
	</div>
	
	<div id="footer-base">
		<div class="container">
			<div class="eight columns">
				<?php echo $lang->NOIDA?>
			</div>
			<div class="eight columns far-edge">
				<?php echo $lang->AN?> <a href="http://www.osscube.com/"><?php echo $lang->OSSCUBE?> </a><?php echo $lang->PRODUCT?>
			</div>
		</div>
	</div>
	
	<div id="topcontrol" title="Scroll Back to Top"></div>
	
</footer>

<!-- end footer -->

<!-- Twitter Feed -->
<script src="images/twitter.js" type="text/javascript"></script>

<!-- Google web font -->
<script type="text/javascript">
//<![CDATA[
	WebFontConfig = {
	google: { families: [ 'Arvo:400,700:latin', 'Annie+Use+Your+Telescope:latin' ] }
	};
	(function() {
		var wf = document.createElement('script');
		wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
  		'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
	})();
//]]>
</script>

<!-- Google Analytics -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3936239-1']);
  _gaq.push(['_setDomainName', 'examprofessor.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

 <div title="Scroll Back to Top" style="position: fixed; bottom: 5px; right: 5px; opacity: 0; cursor: pointer;" id="topcontrol"><img src="images/up.png"></div></body></html>

