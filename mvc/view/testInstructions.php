<?php
session_start();
$instructions=$_SESSION['test1'];
//print_r($instructions);


?>
<html>
    <head>
        
    </head>
    <body>
        <div  style=" background-image: url(../images/bkg-plans.png);height: 50%;width: 50%;margin-top:10%;margin-left:25%;">
<!--          <img src="../images/bkg-plans.png">-->
       
       <div style="margin-left:35%;"><br/><br/><br/><br/>
        <p style="font-weight:bold">There are <?php echo $instructions['no_of_questions']?> questions</p>
        <p style="font-weight:bold">Test duration is:<?php echo $instructions['time']?> mins</p>
        <p style="font-weight:bold">Negative Marking:<?php if ($instructions['negative_marking']!=0)
            echo $instructions['negative_marking'];
        else echo "No negative Marking"?></p>
        <p style="font-weight:bold"><a href="sample_test.php">Go to test</a></div>
        </div>
    </body>
</html>
