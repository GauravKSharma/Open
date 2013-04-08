<html>
    <head>
    <script>
    function openwindow(){
	window.open("categoryview.php","popup1","width=500, height=600");
			}
    </script>
    </head>
    
    <body>
        <form action="http://localhost/Open/trunk/mvc/controller/controller.php?method=upload&tablename=t" enctype="multipart/form-data" method="POST">
            <!--Select Category-->
            <p> Select Category </p>
            <input type="text" name="category">
            <a href="#" onclick="openwindow();"> View Category Code </a><br/>
<!--            <select name="category"> -->
<!--             <option value="1">C</option> -->
<!--             <option value="3">C++</option> -->
<!--            </select> -->
           
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
    </body>
    
</html>