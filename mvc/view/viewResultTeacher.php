

<html>
<head>
    <title>View Result</title>
</head>
 
 <body>
 
    <table>
       <tr>
        <td>Test Id</td>
        <td>Name</td>
        <td>Marks</td>
        <td>Percentage</td>      
       </tr>
    <?php 
     
    foreach($fetchResult as $key=>$value){ ?>

       <tr>
           
        <td><?php echo ($value['test_id']); ?></td>
        <td><?php echo ($value['firstname']); ?></td>
        <td><?php echo ($value['marks']); ?></td>
        <td><?php echo ($value['percentage']); ?></td>
      </tr>
        <?php }?>  
     </table>
  </body>
 
</html>

