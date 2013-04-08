<?php
session_start();

if($_REQUEST['msg']){
    echo '<script type="text/javascript">alert("User Name Already Exists"); </script>';
}
?>

<html>
    
    <head><title>Registration</title>
        <script src="../js/jquery.min.js"></script>
<script src="../js/md5.js"></script>

<script src="../js/main.js"></script>
<!--<link rel="stylesheet" href="../css/main.css" type="text/css" />-->
    <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
    <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js"></script>
    
      <link rel="stylesheet" type="text/css"
      href="../css/skin1.css"/> 

     
    <link rel="stylesheet" type="text/css"
      href="../css/form.css"/>

     
     <link rel="stylesheet" type="text/css"
      href="../css/columns.css"/>
    
    <style> 
    h1 {
	color: #0099CC;
    }
    
    </style>
    <script>
        function checkUnique(){
            $.ajax({
            type: "POST",
            url: '../controller/controller.php?method=checkUser',
            data: $('#myform').serialize(),
           success: function(data){

            $("#tab3").html(data);
            }
           });
      }
     
    </script>
    
    </head>
    
   <body>
       
       <div>
<?php         
    if(isset($_SESSION['msgErrors'])){
     foreach($_SESSION['msgErrors'] as $key=>$values){
     print_r($_SESSION['msgErrors'][$key]);}
     }
     session_unset("msgErrors");
?>
       </div>
       
       <div>
 <form id="myform" class="cols" action="../controller/controller.php?method=user_register" method="post">
      <h1>Login Information</h1><br/>
      UserName*  <input type="text" name="u_name" required="required" minlength="6" onBlur="checkUnique()"/>
      <label id="tab3" style="margin-left:10px; font-size:14px; border:1px;"></label><br/>
      User Type <select name="utype">
      <option value="2">Teacher</option>
      <option value="3">Student</option>
      </select>
      <br/>
       <h1>Personal Information</h1><br/>
       First Name*  <input type="text" name="first" required="required" maxlength="30" /><br/> 
       Last Name*   <input type="text" name="last" required="required" maxlength="10" /><br/>
       Address     <textarea rows="4" cols="30" name="address"></textarea><br/>
       Email*      <input type="email" name="email" required="required" /><br/> 
       DOB         <input type="date" name="dob"><br/>
       Phone No    <input type="number" name="phone" maxlength="10" /><br/>
       Gender*     <input type="radio" value="male" name="gender">Male 
       <input type="radio" value="female" name="gender">Female<br/>
      College/Company Name* <input type="text" name="cname"><br/>
      <div class="lines" id="capref">
      <img src="captcha.php" class="form_captcha" id="image"/>
            Verification (Type what you see):
            <input type="text" name="captcha" value="" class="captcha" id="captcha" onblur="checkCaptcha();" required="required"/>
</div>
            <!--            <button onclick="checkCaptcha()">Check it</button>-->
<p id="caperror" onshow="referesh();" ></p>
      <div class="clear"></div>
      
     <button type="submit" name="teacher">Submit</button>
    </form>
    
    </div>

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
             url: "../controller/controller.php?method=checkCaptcha",
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
