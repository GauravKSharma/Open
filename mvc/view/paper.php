<html>
 
 <head>
  <title>View Teacher</title>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>
  function send(fetch)
  {
  $.ajax({
  type: "POST",
  url: '../controller/controller.php?method=fetchPaper',
  //data: $('#frmid').serialize(),
  data:"value=" + fetch,

  success: function(data){

  $("#tab3").html(data);
  }
  });
  }
  </script>
 </head>

<body>
   <table>
    <?php 
    foreach($fetch as $key=>$value){ 
      ?>
      <tr>   
        <td><a href="#" onclick="send(<?php echo "'" . ($fetch[$key]['teacher_name']) ."'"; ?> )"><?php echo ($fetch[$key]['teacher_name']); ?></a></td>
      </tr>
       
        <?php }?>
    </table>
    <div id="tab3">
    
    </div>  
 </body>
 
</html>
