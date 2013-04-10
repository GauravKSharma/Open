<?php
include '../lang/constant.php';
?>
<html>
    <head>
        <title><?php echo $lang->SITENAME?></title>     
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
    <style>
    /* trigger button */
  #download_now {
    background:transparent url(../images/download.jpg) no-repeat scroll 0 0;
    display:block;
    height:100px;
    margin: 0 auto;
    margin-bottom:30px;
    overflow:hidden;
    text-indent:-999em;
    width:200px;
    cursor:pointer;
  }

  /* mouseover state */
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
    background:url(../images/bkground.jpg);
    height:93px;
    padding:20px 10px 5px 10px;
    width:200px;
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
  
   form.expose {
	
	background: #fff url(/media/img/gradient/h150.png) repeat-x;
	padding: 20px;
	margin: 100px auto;
	text-align: center;
	width: 600px;
	-moz-border-radius: 4px;
 	
	height: 400px;
	
	 background-image: url(../images/bkg-plans.png);
 	background-repeat:no-repeat;
        background-size: 1200px;
}
   
  </style>
    
    <script>
    function openwindow(){
	window.open("categoryview.php","popup1","width=500, height=600");
			}
    </script>
    </head>
    
    <body>
   
        <form class="expose" action="../controller/controller.php?method=upload" enctype="multipart/form-data" method="POST">
            <!--Select Category-->
	    <div style="background-image: url(../images/professor-enrollment.png);background-repeat: no-repeat;height: 300px;width:600px;">
	    <table align="right">
		<tr><td><?php echo $lang->SELECT?> <?php echo $lang->CATEGORY?> </td></tr>
            <tr><td><input type="text" name="category"></td></tr>
            <tr><td><a href="#" onclick="openwindow();"> <?php echo $lang->VIEWCATEGORYCODE?> </a></td></tr>

           <!--Number of questions-->
            <tr><td> <?php echo $lang->NOOFQUESTIONS?><?php echo $lang->TO?><?php echo $lang->UPLOAD?> </td></tr>
            <tr><td><input type="text" name="numbers"></td></tr>
           
           
           <!--Upload Paper-->
           
            <tr><td><?php echo $lang->UPLOADPAPER?></td></tr>
           
		<tr>
		<td width="246">
                 <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                 <input name="userfile" type="file" id="userfile">
                </td></tr>
               <tr><td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td></tr>
               
             </table>
	    
	     <div style="height:280px;"></div>
             <!-- trigger element. a regular workable link -->
               <a id="download_now" style="margin-left: 350px;">Download Now</a>

	    
	    <div class="tooltip">

  <table style="margin:0">
    <tr>
      <td class="label"><?php echo $lang->FILETYPE?>:</td>
      <td style="color: white;"><?php echo $lang->EXCEL?></td>
    </tr>
    <tr>
      <td class="label"><?php echo $lang->EXTENTION?>:</td>
      <td style="color: white;"><?php echo $lang->CSV?></td>
    </tr>
    <tr>
      <td class="label"><?php echo $lang->SIZE?>:</td>
      <td style="color: white;">112 kB</td>
    </tr>
  </table>

  <a href="/release-notes"><?php echo $lang->UPLOADPAPERTYPE?></a>
</div>

	    </div>
        </form>
   
   <script>
  $(document).ready(function() {
      $("#download_now").tooltip({ effect: 'slide'});
    });
</script>
   
    </body>
    
</html>