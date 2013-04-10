<?php
session_start();
include '../lang/constant.php';
if(isset($_SESSION['uname'])){
    

}


if(isset($_REQUEST['msg'])){
		echo '<script type="text/javascript">alert("Wrong Current Password"); </script>';
}
unset($_REQUEST['msg']);
?>   
<html>
<head>
<title><?php echo $lang->SITENAME?></title>  
<link rel="stylesheet" type="text/css" href="../css/test.css" />
<style>
form.expose {
	
	background: #fff url(/media/img/gradient/h150.png) repeat-x;
	padding: 20px;
	margin: 100px auto;
	text-align: center;
	width: 1000px;
	-moz-border-radius: 4px;
 	
      
 	
}
   </style>


</head>
   
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<body>
	<?php include('header1.php');?><br/><br/><br/>
	<img src="../images/open_logo.png" height="50px" width="150px" style="margin-left: 80px;">
     <header id="header" class="container">
	<nav id="main-nav" class="two-thirds column omega">
			<ul id="main-nav-menu" class="nav-menu">
				<li id="nav-home"><a href="http://localhost/Open/trunk/mvc/view/view.php?flag=<?php echo $_SESSION['flag']; ?>" ><?php echo $lang->HOME?></a></li>
				
                <li id="nav-tour"><a a href="../controller/controller.php?method=faq"><?php echo $lang->FAQ?></a></li>

			</ul>
		</nav>
</header>

<div id="wrap">
<div id="gradient">
</div>
</div><br/><br/>
	
	
	<?php 
   if(isset($_SESSION["msgErrors"])){
     foreach($_SESSION["msgErrors"] as $key=>$value){
         print_r($_SESSION["msgErrors"][$key]);
     }
    unset($_SESSION["msgErrors"]);
 }?>
   <div style="height:800px;">
	<form class="expose" action="../requesthandler/changePassword" method="POST">
	<div style="background-image:url(../images/image02.png);background-repeat:no-repeat;height:500px;" >
	
				<table align="right" width="500px">
				<tr><td>&nbsp;</td></tr>
				<tr><td><h2><?php echo $lang->CHANGE?> <?php echo $lang->PASSWORD?></h2></td></tr>
				<tr> <td>Current Password:</td></tr> 
                                     <tr><td><input type="password" name="pwd" required="required"></td></tr>
				<tr><td><?php echo $lang->NEW?> <?php echo $lang->PASSWORD?></td></tr>
                                     <tr><td><input type="password" name="new_pwd" />
                                     </td></tr>
				<tr><td><?php echo $lang->CONFIRM?> <?php echo $lang->PASSWORD?>*</td></tr> 
                                     <tr><td><input type="password" name="check" id="check" data-equals="new_pwd" /></td></tr> 
                                <tr><td>&nbsp;</td>
                                <td>&nbsp;</td></tr>
                                
                                
                                                                
                                <tr><td><input type="Submit" value="Change" style="background-color: #909090;height: 30px;width:100px;color: white;font-size: 15px;"></td> 
                                    </tr>
                                </table>
                                </div>
			</form>
                   
        </div>             


 <script>
$.tools.validator.fn("[data-equals]", "Value not equal with the $1 field", function(input) {
    var name = input.attr("data-equals"),
    field = this.getInputs().filter("[name=" + name + "]");
    return input.val() == field.val() ? true : [name];
    });
$("#myform").validator({
	    position: 'top left',
	    offset: [-25, -10],
	    message: '<div><em/></div>' // em element is the arrow
	    });


</script>
             
    <?php include 'footer1.php';?><br/>            
 </body>
</html>
