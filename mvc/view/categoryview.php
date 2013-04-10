<?php
include '../lang/constant.php';
?>
<html>
<head>
<title><?php echo $lang->SITENAME?></title>     
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>

<body>
<?php 
require_once '../model/classes.sampleTest.php';

$result = new sampleTest();
$values = $result->category();
?>
<table border='1' align="center">
 <tr>
  <td><?php echo $lang->ID?></td>
  <td><?php echo $lang->CATEGORY?></td>
 </tr>
<?php
while ($data = mysql_fetch_assoc($values)){
?>
 <tr>
  <td><?php echo $data['id']?></td>
  <td><?php echo $data['category_name']?></td>
 </tr>
 <?php }?>
</table>
</body>
</html>