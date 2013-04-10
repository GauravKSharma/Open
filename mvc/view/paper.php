
<html>
 
 <head>
  <title>View Teacher</title>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>
  function send(fetch)
  {
  $.ajax({
  type: "POST",
  url: 'http://localhost/Open/trunk/mvc/controller/controller.php?method=fetchPaper',
  //data: $('#frmid').serialize(),
  data:"value=" + fetch+"&cid="+<?php echo $_REQUEST['value']; ?>,

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
