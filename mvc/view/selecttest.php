<html>
<head>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
</head>
<body>
<table >
<tr>

<form action="http://localhost/Open/trunk/mvc/controller/controller.php?method=settest" method="POST">
<td>no of questions:</td><td><input type="number" name="noofques" required="required"/></td>
</tr>
<tr>
<td>negative marking(if required):</td><td><input type="number" name="negative" value="0" required="required"></td>
</tr>
<tr>
<td>time(in min):</td><td><input type="text" name="time" required="required"></td>
</tr>
<tr><td>order</td><td><input type="radio" value="1" name="test" required="required">random</td></tr>
<tr><td></td><td><input type="radio" value="2" name="test" required="required">sequential</td></tr>
<tr>
<td>Mail Link To</td><td><input type="text" name="email" required="required"></td>
</tr>

<tr><td></td><td><input type="submit" value="OK"></td></tr>
<input type="text" name="cat" value="<?php echo $_REQUEST['cat']?>" >
</form>
</table>
</body>
</html>