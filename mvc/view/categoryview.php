<html>
<head>
<title>View Category Code</title>
</head>

<body>
<?php 
require_once '../model/classes.sampleTest.php';

$result = new sampleTest();
$values = $result->category();
?>
<table border='1' align="center">
 <tr>
  <td>ID</td>
  <td>Category</td>
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