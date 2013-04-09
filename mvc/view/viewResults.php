

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
     
    foreach($fetchResult as $key=>$value){ ?>

       <tr>   
        <td style="font-color:red;"><?php echo ($value['test_id']); ?></td>
        <td style="font-color:red;"><?php echo ($value['marks']); ?></td>
        <td style="font-color:red;"><?php echo ($value['percentage']); ?></td>
      </tr>
        <?php }?>  
     </table>
  </body>
 
</html>

