<?php
session_start();
include '../lang/constant.php';

if(isset($_REQUEST['msg'])){
    echo '<script type="text/javascript">alert("User Name Already Exists"); </script>';
unset($_REQUEST['msg']);
    
}

?>

<html>
    
    <head><title><?php echo $lang->SITENAME?></title>     
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
   
    <link rel="stylesheet" type="text/css" href="http://localhost/Open/trunk/mvc/css/test.css" />
        <script src="http://localhost/Open/trunk/mvc/js/jquery.min.js"></script>
<script src="http://localhost/Open/trunk/mvc/js/md5.js"></script>

<script src="http://localhost/Open/trunk/mvc/js/main.js"></script>
    <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
    <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js"></script>
    
      <link rel="stylesheet" type="text/css"
      href="http://localhost/Open/trunk/mvc/css/skin1.css"/> 

     
    <link rel="stylesheet" type="text/css"
      href="http://localhost/Open/trunk/mvc/css/form.css"/>

     
     <link rel="stylesheet" type="text/css"
      href="http://localhost/Open/trunk/mvc/css/columns.css"/>
    
    <style> 
    h1 {
	color: #0099CC;
    }
    
 form.expose {
	
	background: #fff url(/media/img/gradient/h150.png) repeat-x;
	padding: 20px;
	margin: 160px auto;
	text-align: center;
	width: 600px;
	-moz-border-radius: 4px;
     
    background-image: url(http://localhost/Open/trunk/mvc/images/bkg-plans.png);
 	background-repeat:no-repeat;
   background-size: 1600px;
        
       
        
}
    
    </style>
    <script>
        function checkUnique(){
            $.ajax({
            type: "POST",
            url: 'http://localhost/Open/trunk/mvc/controller/controller.php?method=checkUser',
            data: $('#myform').serialize(),
           success: function(data){

            $("#tab3").html(data);
            }
           });
      }
     
    </script>
    
    </head>
    
   <body>
        <div  style="height:30px;width:100%;margin-top: 8px;background-color:#383838 ;"><br/><br/>
       <div>
<?php         
    if(isset($_SESSION['msgErrors'])){
     foreach($_SESSION['msgErrors'] as $key=>$values){
     print_r($_SESSION['msgErrors'][$key]);}
     }
     session_unset("msgErrors");
?>
       </div>
       
      
     <form  id="myform" class="expose" action="../requesthandler/user_register" method="post">
      <div style="background-image: url(http://localhost/Open/trunk/mvc/images/professor-checklist-72.png); background-repeat: no-repeat;width:600px;height:600px; ">
      <table align="right" width="350px">
      <tr><td><?php echo $lang->USERNAME?>*</td><td><input type="text" name="u_name" required="required" minlength="6" onBlur="checkUnique()"/>
      <label id="tab3" style="margin-left:10px; font-size:14px; border:1px;"></label></td></tr>
      <tr><td><?php echo $lang->USERTYPE?></td> <td><select name="utype">
      <option value="2"><?php echo $lang->TEACHER?></option>
      <option value="3"><?php echo $lang->STUDENT?></option>
      </select></td></tr>
      
      
       <tr><td><?php echo $lang->FIRSTNAME?>*</td>  <td><input type="text" name="first" required="required" maxlength="30" /></td></tr> 
       <tr><td><?php echo $lang->LASTNAME?>*</td>   <td><input type="text" name="last" required="required" maxlength="10" /></td></tr>
       <tr><td><?php echo $lang->ADDRESS?></td>     <td><textarea rows="4" cols="30" name="address"></textarea></td></tr>
       <tr><td><?php echo $lang->EMAIL?>*</td>      <td><input type="email" name="email" required="required" /></td></tr> 
       <tr><td><?php echo $lang->DOB?></td>         <td><input type="date" name="dob"></td></tr>
       <tr><td><?php echo $lang->PHONENO?></td>    <td><input type="number" name="phone" maxlength="10" /></td></tr>
       <tr><td><?php echo $lang->GENDER?>*</td>     <td><input type="radio" value="male" name="gender"><?php echo $lang->MALE?></td></tr> 
       <tr><td></td><td><input type="radio" value="female" name="gender"><?php echo $lang->FEMALE?></td></tr>
      <tr><td>College/Company Name*</td> <td><input type="text" name="cname"></td></tr>
      <tr><td><div class="lines" id="capref"></td>
      <td><img src="http://localhost/Open/trunk/mvc/view/captcha.php" class="form_captcha" id="image"/></td></tr>
            <tr><td><?php echo $lang->VERIFICATION?>:</td>
            <td><input type="text" name="captcha" value="" class="captcha" id="captcha" onblur="checkCaptcha();"/></td></tr>
</div>
           
<tr><td><p id="caperror" onshow="referesh();" ></p></td></tr>
      <div class="clear"></div>
      
     <tr><td></td><td><button type="submit" name="teacher" style="background-color: #909090;height: 30px;width:100px;color: white;font-size: 15px;">Register</button></td></tr>
     </table>
         </div>
    </form>
    


          </body>
</html>    
<script>

$(":date").dateinput();

    $.tools.validator.fn("[data-equals]", "Value not equal with the $1 field", function(input) {
    var name = input.attr("data-equals"),
    field = this.getInputs().filter("[name=" + name + "]");
    return input.val() == field.val() ? true : [name];
    });	
	
	$.tools.validator.fn("[minlength]", function(input, value) {
	    var min = input.attr("minlength");
	
	    return value.length >= min ? true : {
	    en: "Please provide at least " +min+ " character" + (min > 1 ? "s" : ""),
	    
	    };
	    });
	
	$("#myform").validator({
	    position: 'top left',
	    offset: [-25, -10],
	    message: '<div><em/></div>' // em element is the arrow
	    });
            
            //alert(a);
     function checkCaptcha(){
         var a=$("#captcha").val();
         //alert(a);
         $.ajax({
             type: "post",
             url: "http://localhost/Open/trunk/mvc/controller/controller.php?method=checkCaptcha",
             data:"captchaval="+a,
             success:function(data){
                 
                 
                 if(data==1){
                     $("#caperror").html("try again");
                  //  $("#capref").load("register.php #capref");
                        reloadCaptcha();
                 }
                 else{
                    $("#caperror").html(data);  
                 }
             }
             
             
         });
     }
function reloadCaptcha()
{
img = document.getElementById('image');
a=Math.random();
img.src = 'captcha.php?a='+a;
document.getElementById('captcha').value="";
}
</script>