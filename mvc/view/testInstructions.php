<?php
session_start();
$instructions=$_SESSION['test1'];
// print_r($instructions);


?>
<html>
    <head>
        
    </head>
    <body>
        <p>There are <?php echo $instructions['no_of_questions']?> questions</p>
        <p>Test duration is:<?php echo $instructions['time']?> mins</p>
        <p>Negative Marking:<?php if ($instructions['negative_marking']!=0)
            echo "-".$instructions['negative_marking'];
        else echo "No negative Marking"?></p>
        <a href="sample_test.php">Go to test</a>
    </body>
</html>
