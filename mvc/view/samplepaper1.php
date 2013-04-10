<?php 
//session_start();
$_SESSION['fetch'] = $fetch;
?>
<html>
 
 <head>
  <title>View Sample Paper</title>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideDown("slow");
  });
});
</script>
 
<style type="text/css"> 
#panel,#flip
{
padding:5px;
text-align:center;
background-color:#e5eecc;
border:solid 1px #c3c3c3;
}
#panel
{
padding:10px;
display:none;
}
</style>

 </head>

<body>
   <div align="center"> 
   <table>
    <?php 
    foreach($fetch as $key=>$value){
        $answer = $fetch[$key]['answer'];
        ?> 
     <tr>
      <td><pre/><?php echo $key+1 . " . " . ($fetch[$key]['question_name']); ?></td>
      </tr>
      <?php $data = $fetch[$key]['category_id'];?>
      <tr>
        <td>
      <?php 
      $options = array();
      $options = explode("|", $fetch[$key]['options']);
        
      foreach($options as $key=>$value){?>
        <input type="radio" name="choose"> <?php echo $value . "<br/>"; ?>
      <?php }?>
        </td>
      </tr>
      <tr>
          <td>
              <div id="flip">Click To View Answer</div>
              <div id="panel"><?php echo $answer; ?></div>

          </td>
      </tr>
      <?php }?>
    </table>
    <a href="../controller/controller.php?method=fetchAll&value=<?php echo $data;?>"> Pay and give test </a>
   </div> 
  </body>
</html>
