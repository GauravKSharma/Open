
<html>
<head>
    <title>View Result</title>
</head>
 
 <body>
 
    <table>
       <tr>
        <td>Test Id</td>
        <td>Marks</td>
        <td>Percentage</td>      
       </tr>
    <?php 
     
    while($row=mysql_fetch_assoc($fetchResult)){ ?>
      <tr>   
        <td><?php echo ($row['test_id']); ?></td>
        <td><?php echo ($row['marks']); ?></td>
        <td><?php echo ($row['percentage']); ?></td>
      </tr>
        <?php }?>  
     </table>
        <div id="tab3">
    
    </div> 
 </body>
 
</html>

