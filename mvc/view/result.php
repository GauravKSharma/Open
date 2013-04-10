<?php

?>
    
        <div  style=" background-image: url(../images/bkg-plans.png);height: 50%;width: 50%;margin-top:10%;margin-left:25%;">
<!--          <img src="../images/bkg-plans.png">-->
       <div style="margin-left:35%;">
        <br/><br/><br/><br/><p style="font-weight:bold "> <?php echo " Total Questions:".$result->getNoOfQuestions();?>
 <?php echo "<br/>You have got ". $result->getMarks()." marks";?>
           <?php echo "<br/>You have got ". $result->getPercentage()." percentage";?></p>
        </div>
<script type="text/javascript">
 function finishpage()
{

document.quiz1.submit();
}
window.onbeforeunload= function() {
window.setTimeout('document.quiz1.submit()',0);
finishpage();
}

</script>

	


<script language="JavaScript" type="text/javascript">
window.history.go(1);
</script>
<form name="quiz1" action="" method="post">
</form>
   
