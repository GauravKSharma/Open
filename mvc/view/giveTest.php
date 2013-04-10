<html>
 
 <head>
  <title>View Test Paper</title>
   <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
   
 </head>

<body>
<div id="actions">
  
</div>
<form action="../testresult" method="get"> 
<div class="scrollable vertical">
    
   <div class="items">

    <div>
    <div class="item">     
      
    <table>
        
    <?php 
    foreach($get as $key=>$value){?> 
     <tr>
      <td><pre/><h3><?php echo $key+1 . " . " . ($get[$key]['question_name']); ?></h3></td>
      </tr>
      <tr>
        <td>
        <?php 
         $options = array();
         $options = explode("|", $get[$key]['options']);
        
         foreach($options as $key1=>$value1){?>
           <input type="radio" name="options<?php echo ($key)?>" value="<?php echo ($key1 + 1)?>"/><?php echo $value1 . "<br/>"; ?>
           
         <?php } ?>
         </td>
      </tr>
    
      <?php }?>
      </table>
        </div>
    </div>
     <br/>
     <br/>
     <br/>
     <br/>
   </div>

</div>
    <input type="submit" name="done" value="submit"></input>
    </form>
    <script>
    
$(function() {
    // initialize scrollable with mousewheel support
    $(".scrollable").scrollable({ vertical: true, mousewheel: true });
});
</script>

 </body>
</html>