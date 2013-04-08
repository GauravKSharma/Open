

<html>
    <head>
        <title>Forgot Password</title>
        <style type="text/css">
#table-design {
width: 100%;
border: 1px solid #B0B0B0;
background: #F2F2F2;
}
#table-design tbody {
/* Kind of irrelevant unless your .css is alreadt doing something else */
margin: 50px 50px;
padding: 0;
border: 0;
outline: 0;
font-size: 100%;
vertical-align: baseline;
background: transparent;
}
#table-design thead {
text-align: left;
}
#table-design td {
padding: 3px 10px;
}
</style>

    </head>
    
       <body>
           <div id=123 style="height:30px;width:100%;margin-top: 8px;background-color:#383838 ;"></div>
          
           <div style="margin: 60px 60px;">
           
               
              <form action="../controller/controller.php?method=check" method="POST">
              <table id="table-design">
              <tr>
               <tbody colspan="3" align="center"><strong>Enter Your User Name And User Type </strong></tbody>
              </tr>
              <tr>
              <td colspan="3">User Name <input type="text" name="uname" required="required"/><br/></td>
              </tr>
              <tr>
              <td colspan="3">    
              User Type 
              <select name="utype">
                      <option value="2">Teacher</option>
                      <option value="3">Student</option>
                     </select><br/></td>
              </tr>
              <td></td><td></td>
              <td><button type="submit" name="teacher">Submit</button></td>
              </tr>
              </table>
              </form>
           
           </div>
     </body>
</html>
