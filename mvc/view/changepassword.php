<?php
session_start();
if(isset($_REQUEST['msg'])){
		echo '<script type="text/javascript">alert("Wrong Current Password"); </script>';
}
unset($_REQUEST['msg']);
?>   
<html>
<head>
<title>Change Password</title>


</head>

<body style=" background-image: url(../images/bkg-plans.png);background-repeat:no-repeat;height:400px;" >
	
	
	<?php 
   if(isset($_SESSION["msgErrors"])){
     foreach($_SESSION["msgErrors"] as $key=>$value){
         print_r($_SESSION["msgErrors"][$key]);
     }
    unset($_SESSION["msgErrors"]);
 }?>
   
	<form action="../controller/controller.php?method=changePassword" method="POST">
	<div style="background-image:url(../images/image02.png);background-repeat:no-repeat;height:400px;" >
	
				<table align="right" width:="300px";>
				<tr><td><h2>Change Password</h2></td></tr>
				<tr> <td>Current Password:</td></tr> 
                                     <tr><td><input type="password" name="pwd" required="required"></td></tr>
				<tr> <td>New Password:</td></tr>
                                     <tr><td><input type="password" name="new_pwd" />
                                     </td></tr>
				<tr><td>Confirm Password*:</td></tr> 
                                     <tr><td><input type="password" name="check" id="check" data-equals="new_pwd" /></td></tr> 
                                <tr><td>&nbsp;</td>
                                <td>&nbsp;</td></tr>
                                
                                
                                                                
                                <tr><td><input type="Submit" value="Change" style="background-color: #909090;height: 30px;width:100px;color: white;font-size: 15px;"></td> 
                                    </tr>
                                </table>
                                </div>
			</form>
                   
                     


 <script>
$.tools.validator.fn("[data-equals]", "Value not equal with the $1 field", function(input) {
    var name = input.attr("data-equals"),
    field = this.getInputs().filter("[name=" + name + "]");
    return input.val() == field.val() ? true : [name];
    });
$("#myform").validator({
	    position: 'top left',
	    offset: [-25, -10],
	    message: '<div><em/></div>' // em element is the arrow
	    });


$(function() {

	// expose the form when it's clicked or cursor is focused
	var form = $(".expose").bind("click keydown", function() {

		$(this).expose({

			// when exposing is done, change form's background color
			onLoad: function() {
				form.css({backgroundColor: '#c7f8ff'});
			},

			// when "unexposed", return to original background color
			onClose: function() {
				form.css({backgroundColor: null});
			}

		});
	});
});
</script>
               
                
 </body>
</html>
