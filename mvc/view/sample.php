
<html>
 
 <head>
  <title>View Test Paper</title>
 </head>
 
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script>
  function faq(fetch)
  {
  $.ajax({
  type: "POST",
  url: '../controller/controller.php?method=fetchTeacher',
  //data: $('#frmid').serialize(),
  data:"value=" + fetch,

  success: function(data){

  $("#tab2").html(data);
  }
  });
  }
 </script>
 <body>
    <table>
    <?php 
    $count = 0; 
    while($row=mysql_fetch_assoc($view)){ 
    $count ++;?>
      <tr>   
        <td><a href="#" onclick="faq(<?php echo $count; ?> )"><?php echo ($row['category_name']); ?></a></td>
      </tr> 
        <?php }?>  
    </table>
     
     <div id="tab2">
         
     </div>
 </body>
 
</html>
