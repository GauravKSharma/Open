<html>
    
    <body>
        <form action="http://localhost/Open/trunk/mvc/controller/controller.php?method=uploadQuestionSet&id=<?php echo $_REQUEST['id'];?>" enctype="multipart/form-data" method="POST">
        
        <p> Category </p>
            <input type="text" name="category" value="<?php echo $_REQUEST['cat'];?>" />
        
        <p> Number of questions to upload </p>
            <input type="text" name="numbers"><br/>
            
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