<?php 
if(isset($_REQUEST['msg'])){
	echo '<script type="text/javascript">alert("Wrong Category Selected"); </script>';
}
unset($_REQUEST['msg']);
?>


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
 <?php include 'header1.php'; ?>
   <table>
     <tr>
      <td>
      <?php 
      if(isset($_SESSION['msgErrors'])){
      foreach($_SESSION['msgErrors'] as $key=>$value){
       print_r($_SESSION['msgErrors'][$key]); 
       }
      }
      unset($_SESSION['msgErrors']);
      ?>
      </td><td></td>
     </tr>
     <tr>
     <td>
     <form action="../controller/controller.php?method=addQuestion" method="POST">    
      Add your Query ?
         <textarea rows="" cols="20" name="question" required="required"></textarea>
      Select Category
         <input type="number" name="category" />
         <a href="#" onclick="openwindow();"> View Category Code </a><br/>
                          <input type="Submit" value="Add Query"/>
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
