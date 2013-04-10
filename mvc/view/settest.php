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
            <td></td>
            <td><?php echo $lang->CATEGORYID?></td>
            <td><?php echo $lang->NOOFQUESTIONS?></td>
            <td><?php echo $lang->CREATEDON?></td>         
        </tr>
   
   <?php while($row=mysql_fetch_assoc($get)){
       ?>
    <tr>
        <td><a href="../view/selecttest.php?cat=<?php echo ($row['category_id']);?>">Select</a></td>
        <td><?php echo ($row['category_id']); ?></td>
        <td><?php echo ($row['no_questions']); ?></td>
        <td><?php echo ($row['created_on']); ?></td>
        
    </tr>
        <?php }?>
    </table>
    </div>
 </body>
 
</html>
