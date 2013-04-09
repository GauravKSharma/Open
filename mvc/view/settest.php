

<html>
 
 <head>
  <title>View Test Paper</title>
  <style type="text/css">
a:link{
	text-decoration:none;
}
a:FOCUS {
	
}
</style>
 </head>
 
 <body>
    <table border="1"  align="center">
        <tr>
            <td></td>
            <td>Category Id</td>
            <td>Number Of Question</td>
            <td>Created On</td>
            <td>Actions</td>
        </tr>

   <?php while($row=mysql_fetch_assoc($get)){
       ?>
    <tr>
        <td><a href="../view/selecttest.php?cat=<?php echo ($row['category_id']); ?>">Select</a></td>
        <td><?php echo ($row['category_id']); ?></td>
        <td><?php echo ($row['no_questions']); ?></td>
        <td><?php echo ($row['created_on']); ?></td>
    </tr>
        <?php }?>
    </table>            
 </body>
 
</html>
