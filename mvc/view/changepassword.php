<?php
session_start();
if(isset($_REQUEST['msg'])){
	echo '<script type="text/javascript">alert("Wrong Password"); </script>';
	$_REQUEST['msg']="";
}

?>
    
<html>
<head>
<title>Change Password</title>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script type="text/javascript"
	src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js"></script>

<style>
#exposeMask {
	background: #678 url(/media/img/mask/mask_gradient_1000.png) no-repeat;
	background-position: 13% 160px;
}

form.expose {
	border: 1px outset #ccc;
	background: #fff url(/media/img/gradient/h150.png) repeat-x;
	padding: 20px;
	margin: 20px auto;
	text-align: center;
	width: 400px;
	-moz-border-radius: 4px;
}

/* http://www.quirksmode.org/css/forms.html */
label,input {
	display: block;
	width: 150px;
	float: left;
	margin-bottom: 10px;
}

label {
	text-align: right;
	width: 100px;
	padding-right: 20px;
}

br {
	clear: left;
}
</style>


</head>

<body>
	
		
		<br />
		<br />
		<br />
		<br />

		<div>
			<form class="expose" id="myform"
				action="../controller/controller.php?method=changePassword" method="post">
				<pre />
                                <table>
				<tr><tbody rowspan='2'><h2>Change Password</h2></tbody></tr>
				<tr> <td>Current Password:</td> 
                                     <td><input type="password" name="pwd" required="required"></td></tr>
				<tr> <td>New Password:</td>
                                     <td><input type="password" name="new_pwd" />
                                     <?php if(isset($_SESSION["msgErrors"][0])) {?>
                                     <label style="font-size:8px; background-color: red;"><?php print_r($_SESSION["msgErrors"][0]); ?></label> 
	                             <?php } 
                                     session_unset("msgErrors");
                                     ?>
                                     </td></tr>
				<tr><td>Confirm Password*:</td> 
                                     <td><input type="password" name="check" id="check" data-equals="new_pwd" /></td></tr> 
                                <tr><td>&nbsp;</td>
                                <td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td>
                                <td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td>
                                <td>&nbsp;</td></tr>
                                                                
                                <tr><td><input type="Submit" value="Save Changes"></td> 
                                    <td></td></tr>
                                </table>
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