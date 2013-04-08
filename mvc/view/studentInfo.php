<?php
if(! isset($_post['submit'])){
    

?>
<html>
    <title>Student Login</title>
    <head>
        <link href="overlay-apple.css" rel="stylesheet" type="text/css">
            
    </head>
    
   <body>
    <div id="overlay" class="apple_overlay" style="position: fixed; z-index: 30000; background-image: none; top: 155px; left: 324px; right: 324px; display: block;">
        <a class="close" href="index.php" style="float:right;"><img src="images/close.png" alt="close" height="40px" width="40px"></a>
     <div class="contentWrap" style="background-color:#6495ED;">
    
     
     <hr/>
   <form action="http://localhost/Open/trunk/mvc/controller/controller.php?method=login" method="post">
  <pre/>
     
    <h5>UserName</h5>
    <input type="passwd" name="u_name"><br/>
    <h5>Password</h5>
    <input type="passwd" name="pwd"><br/>
      
    
   
    
 
    <input type="hidden" name="type" value="test" />
    <input type="submit" value="submit">
    </form>
    
    </div>
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
