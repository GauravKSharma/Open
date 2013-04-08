
<html>
 
 <head>
  <title>View Faq</title>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>
  function faq(fetch)
  {
  $.ajax({
  type: "POST",
  url: '../controller/controller.php?method=faqResponse',
  //data: $('#frmid').serialize(),
  data:"value=" + fetch,

  success: function(data){

  $("#tab3").html(data);
  }
  });
  }
  
    function openwindow(){
	window.open("../view/categoryview.php","popup1","width=500, height=600");
			}
    </script>
 </head>
 
 <body>
     <table>
     <tr>
     <td>
     
     <form action="../controller/controller.php?method=addQuestion" method="POST">    
      Add your Query ?
         <textarea rows="" cols="20" name="question" required="required"></textarea>
      Select Category
         <input type="text" name="category" required="required">
         <a href="#" onclick="openwindow();"> View Category Code </a><br/>
     <pre/>                          <input type="Submit" value="Add Query"/>
     </form>
     </td>
    </tr>
   </table>
     
    <div style="width: 1000px; height:500px;">
     <div style="width: 450px; height:490px; float:left;">
    <table>
     
    <?php 
    $count = 0; 
    while($row=mysql_fetch_assoc($get)){ 
    $count ++;?>
      <tr>   
        <td><a href="#" onclick="faq(<?php echo $count; ?> )"><?php echo ($row['category_name']); ?></a></td>
      </tr> 
        <?php }?>
        
          
        </table>
     </div>  
         <div id="tab3" style="width: 450px; height:490px; float:right; overflow: scroll;">
    
    
     </div> 
     </div>     
 </body>
 
</html>