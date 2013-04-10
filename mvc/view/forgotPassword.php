

<html>
    <head>
        <title>Forgot Password</title>
        <style>
             form.expose {
	
	background: #fff url(/media/img/gradient/h150.png) repeat-x;
	padding: 20px;
	margin: 120px auto;
	text-align: center;
	width: 500px;
	-moz-border-radius: 4px;
        
         background-image: url(http://localhost/Open/trunk/mvc/images/bkg-plans.png);
 	background-repeat:no-repeat;
        background-size: 1000px;
        height:400px;
     
             }
        

</style>

    </head>
    
       <body>
           <div id=123 style="height:30px;width:100%;margin-top: 8px;background-color:#383838 ;"></div>
          
           
           
               
              <form  class="expose" action="../requesthandler/check" method="POST">
                <div style="background-image:url(http://localhost/Open/trunk/mvc/images/professor-questions-100-left.png);background-repeat:no-repeat;height: 400px;width:500px;">
              <table align="right">
              <tr>
               <td><strong>Enter Your User Name And User Type </strong></td>
              </tr>
              <tr>
              <td>User Name</td></tr> <tr><td><input type="text" name="uname" required="required"/></td>
              </tr>
              <tr>
              <td>    
              User Type</td></tr> 
              <tr><td><select name="utype">
                      <option value="2">Teacher</option>
                      <option value="3">Student</option>
                     </select></td></tr>
              </tr>
              <td>
              <button type="submit" name="teacher" style="background-color: #909090;height: 30px;width:100px;color: white;font-size: 15px;">Submit</button></td>
              </tr>
              </table>
                </div>
              </form>
           
           </div>
     </body>
</html>
