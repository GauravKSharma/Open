<?php
if(! isset($_post['submit'])){
    

?>
<html>
    <title>Student Login</title>
    <head>
        
        <script>
    function openwindow(){
	window.open("forgotPassword.php","popup3","width=500, height=400");
			}
    </script>

        <style>
       form.expose {
	
	background: #fff url(/media/img/gradient/h150.png) repeat-x;
	padding: 20px;
	margin: 140px auto;
	text-align: center;
	width: 500px;
	-moz-border-radius: 4px;
        height:350px;
        background-image: url(../images/bkg-plans.png);
        
       
        
       
        
}

</style>
    </head>
    
   <body style="background-color:#D0D0D0 ;">
    <div  style="height:30px;width:100%;margin-top: 8px;background-color:#383838 ;"><br/><br/><br/><br/>
   <form id="myform" class="expose" action="../controller/controller.php?method=login" method="post">
  <pre/>
     
    <div style="background-image: url(../images/professor-blog.png); background-repeat: no-repeat;width:500px;height:330px; ">
     <table align="right" cellspacing="5px";>
     <tr>
     	<td><b>Username</b></td>
     	<td><input type="text" name="u_name"></td>
    </tr>
     <tr>
     	<td><b>Password</b></td>
        <td><input type="password" name="pwd" id="pwd"/></td>
    </tr>
     
    
    <tr><td></td><td><input type="checkbox">Remember Password</td></tr>
    
    <tr><td></td><td><a href="#" onclick="openwindow();">Forgot Password?</a></td></tr>
    <tr><td><input type="hidden" name="type" value="test" /></td></tr><tr></tr><tr></tr>
    <tr><td></td><td><b><input type="submit" value="Login" style="background-color: #909090;height: 30px;width:100px;color: white;font-size: 15px;"></b></td></tr>
    </table>
     </div>
   </body>
</html>   

<?php
}
else{
    print_r($b);
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
