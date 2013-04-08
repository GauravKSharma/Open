<?php
session_start();
 $row=mysql_fetch_assoc($get);
 
 
?>

<html>
 
 <head>
  <title>Profile Update</title>
 </head>
 
 <body>
     
     <div style="height: 400px;
   overflow: auto; border:1px solid; margin:80px 300px;">
 <div style="background-color: red;">        
 <?php 
   if(isset($_SESSION["msgErrors"])){
     foreach($_SESSION["msgErrors"] as $key=>$value){
         print_r($_SESSION["msgErrors"][$key]);
     }
    //session_unset("msgErrors"); 
 }?>
 </div>
         <form action="../controller/controller.php?method=updateProfile" method="post" style="margin: 55px;">
	    
             <legend><h2 style="text-align:center;">Profile View</h2></legend>
    <pre/>
    
    <p>User Name               <input type="text" name="u_name" value="<?php echo($row['user_name']) ?> " disabled="true" />  
     </p>
     <p>First Name              <input type="text" name="f_name" value="<?php echo ($row['firstname']) ?>"></p>
     <p>Last Name               <input type="text" name="l_name" value="<?php echo ($row['lastname']) ?>"></p>
     <p>Email                   <input type="email"  name="email" value="<?php echo ($row['email']) ?>"></p>
     <p>Address                 <textarea rows="2" cols="17" name="address"><?php echo ($row['address']) ?></textarea></p>
     <p>Phone No                <input type="text" name="phone" value="<?php echo ($row['phone_no']) ?>"></p>
     <p>College/Company Name    <input type="text" name="cname"  value="<?php echo ($row['college_or_company']) ?>"></p>
     <input type="Submit" value="Update" name="submit">  <input type="Submit" value="Cancel">
   </pre>
   </form>
     </div>
 </body>
 
</html>

