<html>
    <head>
    <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
    <style>
  #download_now:hover {
    background-position:0 -44px;
  }

  /* clicked state */
  #download_now:focus {
    background-position:0 -88px;
  }

  /* tooltip styling */
  .tooltip {
    display:none;
    height:93px;
    padding:20px 10px 5px 10px;
    width:250px;
    font-size:11px;
    color:red;
  }

  /* a .label element inside tooltip */
  .tooltip .label {
    color:red;
    width:35px;
  }

  .tooltip a {
    color:white;
    font-size:11px;
    font-weight:bold;
  }
  </style>
    
    <script>
    function openwindow(){
	window.open("categoryview.php","popup1","width=500, height=600");
			}
    </script>
    </head>
    
    <body>
    <div style="width:600px:height:700px;">
    <div style="width:300px:height:690px;float:left;">
        <form action="../controller/controller.php?method=upload" enctype="multipart/form-data" method="POST">
            <!--Select Category-->
            <p> Select Category </p>
            <input type="text" name="category">
            <a href="#" onclick="openwindow();"> View Category Code </a><br/>

           <!--Number of questions-->
            <p> Number of questions to upload </p>
            <input type="text" name="numbers"><br/>           
           
           
           <!--Upload Paper-->
           
            <p> Upload Paper </p>
           <table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
		<tr>
		<td width="246">
                 <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                 <input name="userfile" type="file" id="userfile">
                </td>
               <td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
               </tr>
             </table>
        </form>
        </div>
        
  <div style="width:290px:height:690px;float:right;">
        
       <div style="height:290px"></div>
<img src="../images/icon.jpg"></img><br/>
<h5 id="download_now">Download now</h5>


<div class="tooltip">

  <table style="margin:0;background-image:url(../images/bg1.jpg); " >
    <tr>
      <td class="label">File Type:</td>
      <td style="color:white;">Excel</td>
    </tr>
    <tr>
      <td class="label">Extension:</td>
      <td style="color:white;">.csv</td>
    </tr>
    <tr>
      <td class="label">Size:</td>
      <td style="color:white;">112 kB</td>
    </tr>
  </table>

  <a href="/release-notes">Paper Upload Type</a>
</div>
  
     </div>
   </div>  

<?php 
if(isset($_REQUEST['msg'])){
    echo '<script type="text/javascript">alert("Paper Uploaded"); </script>';
}
if(isset($_REQUEST['error'])){
    echo '<script type="text/javascript">alert("Sorry"); </script>';
}
unset($_REQUEST['msg']);
unset($_REQUEST['error']);
?>        
        
   <script>
  $(document).ready(function() {
      $("#download_now").tooltip({ effect: 'slide'});
    });
</script>
   
    </body>
    
</html>