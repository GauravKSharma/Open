<html>
<body>
<?php include('header1.php'); 
session_start();

$sQuestionCount = $_GET['cnt'];

?>
<div id="mytable" style="height:500px; margin-left: 300px;margin-top: 100px;">


 <script language="javascript" type="text/javascript" id="source">


function fncsave(){
//	var iCnt = $("#hdnCounter").val();
	//alert("asdfasdf");
	
	//alert(iCnt);
	if($("#hdnCounter").val()<$("#hdnTotQuestionCount").val())
	{ 	var iCnt = $("#hdnCounter").val();
       	if($("#hdnCounter").val()<$("#hdnTotQuestionCount").val()-1)
       	iCnt = parseInt(iCnt)+1;
       	$("#hdnCounter").val(iCnt);
	
$.ajax({


     type: "GET",
     url: 'sample_question.php',                  //the script to call to get data          
     //data: "fname="+arg ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
     data: $('#frmvote').serialize(),
           
     
       success: function(data){
       $("#mytable").html(data);
     
       	var iCnt = $("#hdnCounter").val();
//        	if($("#hdnCounter").val()<$("#hdnTotQuestionCount").val()-1)
//        	iCnt = parseInt(iCnt)+1;
//        	$("#hdnCounter").val(iCnt);
//         if($("#hdnCounter").val()==$("#hdnTotQuestionCount").val()){
//            $("#aa").attr("onclick",false);
//             }else{
//             	$("#aa").attr("onclick","fncsave()");
//             }
        	
           
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
     url: 'sample_question.php',                  //the script to call to get data          
     //data: "fname="+arg ,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
     data: $('#frmvote').serialize(),
           
     
       success: function(data){
       
       
       	//var iCnt = $("#hdnCounter").val();
       
//        	iCnt = parseInt(iCnt)-1;
//        	$("#hdnCounter").val(iCnt);

       	$("#mytable").html(data);
           
       },
       complete: function () {
           
       },
       error: function(){
           
       }
  });
	}}</script>

 
</div>

<form id="frmvote" >

<input type="text" name="hdnCounter1" id="hdnCounter1"  value="<?php echo $_REQUEST['cat'];?>"/>
<input type="text" name="hdnTotQuestionCount" id="hdnTotQuestionCount"  value="<?php echo $sQuestionCount;?>"/>

<input type="text" name="hdnCounter" id="hdnCounter" value="-1"/>
<input type="button" name='fname'  value="previous" onclick = "fncsave1()" >
<input type="button" name='fname1' id="aa"  value="next" onclick = "fncsave()" >
</form>

</body>
</html>
