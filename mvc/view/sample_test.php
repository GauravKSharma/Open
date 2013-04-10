<?php 
session_start();
 include('../view/header1.php'); 
//$sQuestionCount = 20;//$_GET['cnt'];
// echo date("H:m:s"). "\n";
 //set_time_limit(30); 
 
 $category=$_SESSION['test1']['category_id'];
 $noOfQuestions=$_SESSION['test1']['no_of_questions'];
//echo "$category $noOfQuestions";
 
?>

<html>
<head>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
</head>
<body>
    <table>
       
        
    </table>
 <div style="font-weight: bold" id="quiz-time-left"></div>
 <input type="button" value="START TEST" onclick="show()" id="show">
<script type="text/javascript">
var max_time = <?php echo $_SESSION['test1']['time']?>;
var c_seconds  = 0;
var total_seconds =60*max_time;
max_time = parseInt(total_seconds/60);
c_seconds = parseInt(total_seconds%60);
document.getElementById("quiz-time-left").innerHTML='Time Left: ' + max_time + ' minutes ' + c_seconds + ' seconds';
function inis(){
document.getElementById("quiz-time-left").innerHTML='Time Left: ' + max_time + ' minutes ' + c_seconds + ' seconds';
setTimeout("CheckTime()",999);
}
function CheckTime(){
document.getElementById("quiz-time-left").innerHTML='Time Left: ' + max_time + ' minutes ' + c_seconds + ' seconds' ;
if(total_seconds <=0){
sendresult();
setTimeout('document.quiz.submit()',1);
   
    } else
    {
total_seconds = total_seconds -1;
max_time = parseInt(total_seconds/60);
c_seconds = parseInt(total_seconds%60);
setTimeout("CheckTime()",999);
}

}

inis();
</script>
<script type="text/javascript">
 function finishpage()
{

document.quiz.submit();
}
window.onbeforeunload= function() {
window.setTimeout('document.quiz.submit()',0);
}
function backButtonOverride()
{
  // Work around a Safari bug
  // that sometimes produces a blank page
  setTimeout("backButtonOverrideBody()", 1);

}
backButtonOverride();
</script>
<form action="" name="a"></form>

<div id="mytable" style=" margin-left: 300px;margin-top: 100px;">

    <form id="asd1" action="../controller/controller.php?method=result" method="post"  name="quiz">
    <table id="asd">
    </table>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="submit"  onsubmit="sendresult()" onclick="sendresult()" id="sub">
    <input type="hidden" name="result" id="result" value="0">
</form>
    
    
    
    
    
    
    
    
 <script language="javascript" type="text/javascript" id="source">

var arr=new Array();
function fncsave(){
//	var iCnt = $("#hdnCounter").val();
	//alert("asdfasdf");
	
	//alert(iCnt);
	//if($("#hdnCounter").val()<$("#hdnTotQuestionCount").val())
	{ 	var iCnt = $("#hdnCounter").val();
       	if($("#hdnCounter").val()<$("#hdnTotQuestionCount").val()-1)
       	iCnt = (parseInt(iCnt)+1);
    else{
        $("#sub").show();
    }
       	$("#hdnCounter").val(iCnt);
	
$.ajax({


     type: "GET",
     url: '../view/sample_question.php',                  //the script to call to get data          
     //data: "fname="+arg ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
     data: $('#frmvote').serialize(),
           
     
       success: function(data){
       $("#asd").html(data);
     
       	var iCnt = $("#hdnCounter").val();
//        	if($("#hdnCounter").val()<$("#hdnTotQuestionCount").val()-1)
//        	iCnt = parseInt(iCnt)+1;
//        	$("#hdnCounter").val(iCnt);
//         if($("#hdnCounter").val()==$("#hdnTotQuestionCount").val()){
//            $("#aa").attr("onclick",false);
//             }else{
//             	$("#aa").attr("onclick","fncsave()");
//             }
        	$("#asd input[type='radio']").click(function(){
                  arr[iCnt]=$(this).val();
                    //alert(arr[iCnt]);
                })
                if(arr[iCnt])
       $('input[name='+iCnt+'][value='+arr[iCnt]+']').attr('checked', 'checked');
           
       },
       complete: function () {
           
       },
       error: function(){
           
       }
  });
}}

function fncsave1(){
//	var iCnt = $("#hdnCounter").val();
	//alert("asdfasdf");
	
	//alert(iCnt);
	
	if($("#hdnCounter").val()>0){
		var iCnt = $("#hdnCounter").val();
		iCnt = parseInt(iCnt)-1;
       	$("#hdnCounter").val(iCnt);
$.ajax({


     type: "GET",
     url: '../view/sample_question.php',                  //the script to call to get data          
     //data: "fname="+arg ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
     data: $('#frmvote').serialize(),
           
     
       success: function(data){
        $("#asd").html(data);
       
       	//var iCnt = $("#hdnCounter").val();
       
//        	iCnt = parseInt(iCnt)-1;
//        	$("#hdnCounter").val(iCnt);
        
       	$("#asd").html(data);
       if(arr[iCnt])
       $('input[name='+iCnt+'][value='+arr[iCnt]+']').attr('checked', 'checked');
   $("#asd input[type='radio']").click(function(){
                  arr[iCnt]=$(this).val();
                 //   alert(arr[iCnt]);
                  })
           
       },
       complete: function () {
           
       },
       error: function(){
           
       }
  });
	}}
         
          function showresult(){
          for(var i=0;i<arr.length;i++){
document.write("<b>arr["+i+"] is </b>=>"+arr[i]+"<br>");
}
          }
          function sendresult(){
              $('#result').val(arr);
          }
           </script>

 
</div>
<div id="nevigation" style="margin-left: 300px;">
<form id="frmvote" >

<input type="hidden" name="hdnCounter1" id="hdnCounter1"  value="<?php echo $category;?>"/>
<input type="hidden" name="hdnTotQuestionCount" id="hdnTotQuestionCount"  value="<?php echo $noOfQuestions;?>"/>

<input type="hidden" name="hdnCounter" id="hdnCounter" value="-1"/>
<input type="button" name='fname'  value="Previous Question" onclick = "fncsave1()" >
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" name='fname1' id="aa"  value="Next Question" onclick = "fncsave()" >
<input type="hidden" name='fname11' id="aaa"  value="result" onclick = "showresult()" >
<input type="hidden" name="result11" id="result1" value="0">
</form>
</div>
</body>
</html>
<script>
$(document).ready(function(){
 
    $("#nevigation").hide();
 $("#sub").hide();
}); 

function show(){
    $("#nevigation").show();
 
 $("#show").hide();
 fncsave();
}
</script>