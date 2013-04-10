<?php
session_start();
include '../lang/constant.php';
if(isset($_SESSION['uname'])){
   // print_r($_SESSION['uname']);
 header("location:view.php?flag=".$_SESSION['flag']);
}else{
?>


<html>

    <head>
        <title><?php echo $lang->SITENAME?></title>     
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <script>
    function openwindow(){
	window.open("http://localhost/Open/trunk/mvc/view/forgotPassword.php","popup3","width=500, height=400");
			}
    </script>
        <style>
       form.expose {
	
	background: #fff url(/media/img/gradient/h150.png) repeat-x;
	padding: 20px;
	margin: 40px auto;
	text-align: center;
	width: 500px;
	-moz-border-radius: 4px;
        height:350px;
        background-image: url(http://localhost/Open/trunk/mvc/images/bkg-plans.png);
        
       
        
       
        
}

</style>
    </head>
    
   <body>
    <div  style="height:30px;width:100%;margin-top: 8px;background-color:#383838 ;"><br/><br/><br/><br/>
        
        
        
   <form id="myform" class="expose" action="http://localhost/Open/trunk/mvc/requesthandler/login" method="post">
  <pre/>
     
    <div style="background-image: url(http://localhost/Open/trunk/mvc/images/professor-blog.png); background-repeat: no-repeat;width:500px;height:330px; ">
     <table align="right" cellspacing="5px;">
     <tr>
     	<td><b><?php echo $lang->USERNAME?></b></td>
     	<td><input type="text" name="u_name"></td>
    </tr>
     <tr>
     	<td><b><?php echo $lang->PASSWORD?></b></td>
        <td><input type="password" name="pwd" id="pwd"/></td>
    </tr>
     
    
    <tr><td></td><td><input type="checkbox"><?php echo $lang->REMEMBERPASSWORD?></td></tr>
    
    <tr><td></td><td><a href="#" onclick="openwindow();"><?php echo $lang->FORGOTPASSWORD?>?</a></td></tr>
    <tr><td><input type="hidden" name="user_type" value="teacher" /></td></tr><tr></tr><tr></tr>
    <tr><td></td><td><b><input type="submit" value="Login" style="background-color: #909090;height: 30px;width:100px;color: white;font-size: 15px;"></b></td></tr>
    </table>
     </div>
    
    
   
   </body>
</html>   
<?php } ?>