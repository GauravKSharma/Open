

<?php
include '../lang/constant.php';
?>

<html>
<head>
   <title><?php echo $lang->SITENAME?></title>     
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    
    <style type="text/css">
 table
{
     border-collapse: separate;
  border-spacing: 16px;
}

table td, table th
{
    padding: 7; /* 'cellpadding' equivalent */
    color: white;
}
 a {
  color: white;
 }
  div.expose {
	
	background: #fff url(/media/img/gradient/h150.png) repeat-x;
	padding: 20px;
	margin: 120px auto;
	text-align: center;
	width: 600px;
	-moz-border-radius: 4px;
        
         border: 1px outset #ccc;
	  background-image: url(../images/bkg-plans.png);
 	background-repeat:no-repeat;
        background-size: 1000px;
  }
     

</style>
</head>
 <body>
 <div class="expose">
    <table>
       <tr>
        <td>Test Id</td>
        <td>Marks</td>
        <td>Percentage</td>      
       </tr>
    <?php 
     
    foreach($fetchResult as $key=>$value){ ?>

       <tr>   
        <td style="font-color:red;"><?php echo ($value['test_id']); ?></td>
        <td style="font-color:red;"><?php echo ($value['marks']); ?></td>
        <td style="font-color:red;"><?php echo ($value['percentage']); ?></td>
      </tr>
        <?php }?>  
     </table>
 </div>
  </body>
 
</html>

