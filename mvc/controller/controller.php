<?php
session_start();
ini_set("display_errors", "1");

$route = array();

class MyClass {
	
	public function checkcaptcha(){
           $original=$_SESSION["captcha"];
           $received=md5($_REQUEST["captchaval"]);
           if($original==$received){
           $_SESSION['captchaerror']=0;}
           else {
               $_SESSION['captchaerror']=1;
               echo 1;
           }
       }
	
    
    /* -----------------------------------------------------
         Function to add FAQ called from faq.php
       -----------------------------------------------------
    */
    
	public function addQuestion (){
	
           if(isset($_SESSION['uname'])){
            require_once("../model/classes.validation.php");   
	        require_once("../model/classes.faq.php");
	    
            
            $postQuestion=new faqResponse();
            $Validation = new validate();
            //session_unset("msgErrors");
            $_SESSION["msgErrors"] = array();
           
      if($Validation->is_validInt($_REQUEST['category'])){
          	           
	    $postQuestion->setUsername($_SESSION['uname']);
	    $postQuestion->setFaqquestion($_REQUEST['question']);
	    $postQuestion->setCategory($_REQUEST['category']);
	    $fetch = $postQuestion->postQuestion();
	    
	    if($fetch){ 
	    	header("location:controller.php?method=faq");
	    }
	    	   
        else{
           header("location:controller.php?method=faq&msg='wrong category'");  
         }
      }   
	}
	else{
	  header("location:../view/register.php");
	 }
	}
	
	
	
	public function response (){
		if(isset($_SESSION['uname'])){
		require_once("../model/classes.faq.php");
		$postResponse=new faqResponse();
		$postResponse->setUsername($_SESSION['uname']);
		$postResponse->setResponse($_REQUEST['message']);
		$postResponse->setFaqid($_REQUEST['faqId']);
		if($postResponse->postResponse()){
			header("location:controller.php?method=faq");
		}
		else{
			echo '<script type="text/javascript">alert("Sorry Try Again"); </script>';
		}
	}
	else{
		  header("location:../view/register.php");
	     }
	}
    
    public function viewResultTeacher(){
        if(isset($_SESSION['uname'])){
            require_once("../model/classes.viewResult.php");
		$result = new result();
                $result->setUserName($_SESSION['uname']);
                $fetchResult = $result->viewTestId();
                if($fetchResult){
                    include("../view/viewResultTeacher.php");
                }
                else{
                    echo "No student has appeared for the test";
                }
        }
    }
    
    
    public function viewResult(){
        if(isset($_SESSION['uname'])){
            require_once("../model/classes.viewResult.php");
		$result = new result();
                $result->setUserName($_SESSION['uname']);
                $fetchResult = $result->viewResultStudent();
                if($fetchResult){
                 include("../view/viewResults.php");
                    
                }
                else{
                    echo "No marks available";
                }
        }
    }
    
    
    
      
        /* -----------------------------------------------------
	     Function called in case of forget password
	   -----------------------------------------------------
	*/
     public function check(){
         require_once ("../model/classes.login.php");
         $forgotPassword = new logIn();
         $forgotPassword->setUserType($_POST['utype']);
         $forgotPassword->setUserName($_POST['uname']);
         $found = $forgotPassword->checkUser();
         if($found){
             require("../model/class.phpmailer.php");
             $mail = new PHPMailer();
			
             
             $data=mysql_fetch_assoc($found);
             $password = ($data['password']);
             $to = ($data['email']);
             
             $message = '';
	     $message .= "Check your password" . "<br/>";
	     $message .= "Password For User Id :";
             $message .= $password;
	     	     	 
	     $mail->IsSMTP();
	     $mail->Mailer = "smtp";
	     $mail->Host = "ssl://smtp.gmail.com";
	     $mail->Port = 465;
	     $mail->SMTPAuth = true;
	     $mail->Username = "debanshuk@gmail.com";
	     $mail->Password = "1234debanshu";
			
	     $mail->From     = "Administrator";
	     $mail->AddAddress("kar.debanshu@gmail.com");
			
	     $mail->Subject  = "Check out your Password";
	     $mail->Body     = $message;
			
			
	     if(!$mail->Send()) {
		echo 'Message was not sent.';
                echo 'Mailer error: ' . $mail->ErrorInfo;
             }
             else {
		header("location:../index.php");
		}
         }   
         else{
             echo "Wrong Username";
         }
     }
    
    
        /* -----------------------------------------------------
	     Function for all questions
	   -----------------------------------------------------
	*/
    
	public function fetchAll(){
            if($_SESSION['uname']){
		//session_start();
                
		if($_SESSION['fetch']){
                    
                    	require_once("../model/classes.sampleTest.php");
			$sampletest = new sampleTest();
			$sampletest->setUserName($_SESSION['fetch'][0]['teacher_name']);
                        $get = $sampletest->getAll();
                        if($get){
                        	$_SESSION['get']=$get;
                            include("../view/giveTest.php");
			}
                        
		}
            }
        else{
            header("location:../view/register.php");
        }
        }
	
	/* -----------------------------------------------------
	     Function for Set test
	   -----------------------------------------------------
	*/
	
	
		 
		public function settest(){
		 
		if(isset($_POST) > 0){
			require_once("../model/classes.settest.php");
			$settest = new settest();
			$settest->setTeacher_name($_SESSION['uname']);
			$settest->setTesttype($_POST['test']);
			$settest->setNo_of_questions($_POST['noofques']);
			$settest->setTime($_POST['time']);
			$settest->setNegativeMarking($_POST['negative']);
			$settest->setCategory_id($_POST['cat']);
			$settest->teacherId();
			$settest->saveTest();
			
			$link = $settest->generateLink();
			if ($link == TRUE) {
				$message = '';
				$message .= "Check Out The Link" . "<br/>";
				$message .= $link;
				$to = $_POST ["email"];
			
				require("../model/class.phpmailer.php");
				$mail = new PHPMailer();
				 
				$mail->IsSMTP();
				$mail->Mailer = "smtp";
				$mail->Host = "ssl://smtp.gmail.com";
				$mail->Port = 465;
				$mail->SMTPAuth = true;
				$mail->Username = "debanshuk@gmail.com";
				$mail->Password = "1234debanshu";
			
				$mail->From     = "Administrator";
				$mail->AddAddress($to);
			
				$mail->Subject  = "The Generated Link For The Test";
				$mail->Body     = $message;
			
			
				if(!$mail->Send()) {
					echo 'Message was not sent.';
					echo 'Mailer error: ' . $mail->ErrorInfo;
				}
				else {
					echo '<script type="text/javascript">alert("Link send successfully"); </script>';
				  //  header("location:" .$link);
				}
			}
			
			}
	}
	

	/* -----------------------------------------------------
	      Function for View Faq
	   -----------------------------------------------------
	*/
	
	public function faqResponse(){
		if(isset($_POST) > 0){
	        require_once("../model/classes.faq.php");
		 $faqResponse=new faqResponse();
		 //$faqResponse->$this->setUsername($_SESSION['uname']);
		 $question=$faqResponse->viewFaq();
		 if($question){
		 	include("../view/faq_response.php");
		 	}
		 
		 else{
		 	echo "No view available";
		 }
	}
	}
	
	/* -----------------------------------------------------
	    Function for category
	   -----------------------------------------------------
	*/
	public function faq(){
		if(isset($_POST) > 0){
			require_once("../model/classes.sampleTest.php");
			$sampletest = new sampleTest();
			$get=$sampletest->category();
			if($get){
				include("../view/faq.php");
			}
			
				
		}
	}
	
       /* -----------------------------------------------------
	    Function for Sample Paper
	  --------------------------------------------------------
	*/
	
	public function fetchPaper(){
		if(isset($_POST) > 0){
			require_once("../model/classes.sampleTest.php");
			$sampletest = new sampleTest();
			$fetch=$sampletest->retrieveQuestion();
                        if($fetch){
				include("../view/samplepaper.php");
			}
		}
	}
	
	/* -----------------------------------------------------
	     Function for Teacher name
	   -----------------------------------------------------
	*/
	
	public function fetchTeacher(){
		
		if(isset($_POST) > 0){
			require_once("../model/classes.sampleTest.php");
			$sampletest = new sampleTest();
			$fetch=$sampletest->retrieveTeacher();
 			if($fetch){
 				include("../view/paper.php");
 			}
 			else{
 				echo "No paper Available";
 			}
 		}
	}
	
	/* -----------------------------------------------------
	    Function for viewing Sample Test
	   -----------------------------------------------------
	*/
	
	public function sampleTest(){
		if(isset($_POST) > 0){
			require_once("../model/classes.sampleTest.php");
			$sampletest = new sampleTest();
			$view=$sampletest->category();
			if($view){
				include("../view/sample.php");
			}
			else{
			  echo "No category available";
			}
		}
	}
	
	/* -----------------------------------------------------
	      Function for Viewing Uploaded paper by teacher
	   -----------------------------------------------------
	*/    
    
	public function findpaper(){
	if(isset($_POST) > 0){
	    require_once("../model/classes.uploadpaper.php");
	    $upload = new upload();
        $upload->setUserName($_SESSION['uname']);
	    $get = $upload->viewUploadPaper();
       
        if ($get) {
		include("../view/settest.php");
	    }
	    else{
		echo "No View Available";
	    }
	}
    }
    
    
    /* --------------------------------------------------
          Function for Uploading Paper by teacher
       --------------------------------------------------
    */    
    
    public function upload(){
    	
	     if(isset($_POST) > 0){
			require_once("../model/classes.uploadpaper.php");
			$upload = new upload();
			    
			
			///////////////////////
			if($_FILES['userfile']['type'] == "text/csv"){
				$count = 0;
				if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
				{
					$fileName = $_FILES['userfile']['name'];
					$tmpName  = $_FILES['userfile']['tmp_name'];
					$fileSize = $_FILES['userfile']['size'];
					$fileType = $_FILES['userfile']['type'];
					$chk_ext = explode(",",$fileName);
						
					$handle = fopen($tmpName, "r");
			
					if(!$handle){
						die ('Cannot open file for reading');
							
					}
					while (($data = fgetcsv($handle, 10000, ",")) !== FALSE){
						$upload->setQuestionName($data[0]);
						$upload->setQuessetid($nQuesSetId);
						$upload->setOption( array ($data[1],$data[2],$data[3],$data[4]) );
						$upload->setAnswer($data[5]);
						$count ++;
					}
			
				}
			}
			echo $count;
			////////////////////////////////////
			
			
			if($count+1 == $_REQUEST['numbers']){
			
				if ($nQuesSetId!="0"){
				if($_FILES['userfile']['type'] == "text/csv"){
		        if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
                       {
                        $fileName = $_FILES['userfile']['name'];
                        $tmpName  = $_FILES['userfile']['tmp_name'];
                        $fileSize = $_FILES['userfile']['size'];
                        $fileType = $_FILES['userfile']['type'];
                        $chk_ext = explode(",",$fileName);
                       
                       $handle = fopen($tmpName, "r");
                       
                         if(!$handle){
                          die ('Cannot open file for reading');
                        }      
                  while (($data = fgetcsv($handle, 10000, ",")) !== FALSE){
				    $upload->setQuestionName($data[0]);
				    $upload->setQuessetid($nQuesSetId);
				    $upload->setOption( array ($data[1],$data[2],$data[3],$data[4]) );
				    $upload->setAnswer($data[5]);
				    
				    			   			    
				    if($upload->uploadQuestionAnswer())
				    {
			               	    	    
				    }
				    else{
				    header("location:../view/view.php?flag=2&error='sorry'");
			       }
			       
				
			    }
			    header("location:../view/view.php?flag=2&msg='Uploaded'");
              
                        fclose($handle);                  
                    }
			   }
			   else{
			   	header("location:../view/view.php?flag=2&error='Sorry'");
			   }
			}
			else{
		         header("location:../view/view.php?flag=2&error='sorry'");
			}
			
			}
			else{
				header("location:../view/view.php?flag=2&upload=1");
			}
		    }
        }

    

/* -------------------------------------------------------------------------------
    Function for viewing profile called from header_student.php/header_teacher.php
   -------------------------------------------------------------------------------
 */
    
    public function update() {
        if (isset($_POST) > 0) {
            require_once("../model/classes.profileupdate.php");
            $obj = new ProfileUpdate();

        
            $obj->setUserName($_SESSION['uname']);
            
            $get = $obj->RetrieveInformation();
            if ($get) {
                include ( "../view/profile.php" );
            } 
            
            
    }
    }

    
/* ------------------------------------------------------------
    Function for updateprofile called from profile.php 
   ------------------------------------------------------------
*/
    
    public function updateProfile() {
    	if(isset ($_POST['submit'])){
            
            require_once("../model/classes.validation.php");
    		require_once("../model/classes.profileupdate.php");
    		$obj = new ProfileUpdate();
    		
                $Validation = new validate();
                //session_unset("msgErrors");
                $_SESSION["msgErrors"] = array();
            
        if($Validation->is_validName($_POST["f_name"]) && $Validation->is_validEmail($_POST["email"]) && $Validation->is_validPhone($_POST["phone"])){  
                $obj->setUserName($_SESSION['uname']);
    		$obj->setFirstName($_REQUEST['f_name']);
    		$obj->setLastName ($_REQUEST['l_name']);
    		$obj->setAddress ($_REQUEST['address']);
                $obj->setPhoneNo ($_REQUEST['phone']);
    		$obj->setEmail ($_REQUEST['email']);
    		$obj->setCollegeOrCompanyName($_REQUEST['cname']);
    		
    		$get = ($obj->UpdateProfile());
    		
    		if ($get) {
    			header("location:controller.php?method=update");
    		}
            }
                else {
                  header("location:controller.php?method=update");
    		}
    	}
    }

    
/* ------------------------------------------------------------
    Function for change password called from changepassword.php 
   ------------------------------------------------------------
*/
    
    public function changePassword() {
        if(isset ($_SESSION['uname'])) {
        	print_r($_SESSION['uname']);
            //echo "hi";die;
            require_once("../model/classes.validation.php");
            require_once("../model/classes.changepassword.php");
            
            $Validation = new validate();
            //session_unset("msgErrors");
            $_SESSION["msgErrors"] = array();
            
            $changePassword = new ChangePassword();
            
            $changePassword->setPassword($_POST["pwd"]);
            $changePassword->setUserName($_SESSION['uname']);
            $get = $changePassword->CheckCurrentPassword();
            if ($get) {
            	
              if($Validation->is_validPassword($_POST["new_pwd"])){

                 $changePassword->setPassword($_POST["new_pwd"]);
                 if ($changePassword->UpdatePassword()) {
                     header("location:../view/changepassword.php");
                 }
              }
               else{
               	header("location:../view/changepassword.php");
               }
            }
            else{
            	header("location:../view/changepassword.php?msg='Wrong Entry'");
            }
        } 
        
    }
    

/* ----------------------------------------------------------
    Function for sending feedback called from ** index.php **
   ----------------------------------------------------------
*/

public function feedback() {
       if (isset($_POST)) {
       	   require_once("../model/classes.validation.php");
           require_once("../model/classes.feedback.php");
           $feedback = new feedback();
           $Validation = new validate();
           
           session_unset("msgErrors");
           $_SESSION["msgErrors"] = array();
           if($Validation->is_validName($_POST["name"]) && $Validation->is_validEmail($_POST["email"])){
           
           $feedback->setFeedback($_POST["message"]);
           $feedback->setEmail($_POST["email"]);
           $feedback->setName($_POST["name"]);
         
           if (($feedback->AddFeedback())) {
              header("location:..?msg='Feedback Recorded'");
               }
           }
           else{
            header("location:..");
           }
       }
   }
   
    
/* -----------------------
    Function for login
   -----------------------
 */
    public function login() {
       
        if (isset($_POST) && count($_POST) > 0) {
            require_once ("../model/classes.login.php");
            $login = new logIn();
            $login->setUserName($_POST ["u_name"]);
            $login->setPassword($_POST ["pwd"]);

            if (($login->FindUsers())) {
                $_SESSION ['uname'] = $_POST ["u_name"];
                $result = array();
                $result = $login->resultlogin();
               
                if ($result [0]['user_type'] == 2 && $_POST ['user_type'] == "teacher") {
                  header("location:../view/view.php?flag=2");
                  } else if ($result [0]['user_type'] == 3 && $_POST ['user_type'] == "student") {
                    header("location:../view/view.php?flag=3");
                }
                else if ($result [0]['user_type'] == 3 && $_POST ['type'] == "test") {
                    header("location:../view/testInstructions.php");
                }
                else {
                    $header = header ( "location:../index.php" );
                }
            }
        } else {
            header ( "location:../index.php" );
        }
    }
/* --------------------------------------------------------------
    Function to check whether a username exixts or not
   --------------------------------------------------------------
 */
   
    public function checkUser() {
    	
        if (isset($_POST) && count($_POST) > 0) {
        	require_once("../model/classes.register.php");
            $check = new Register();
            $check->setUserName($_POST ["u_name"]);
            $get=$check->checkUnique();
           
            if($get){
                echo "User name already exists";
            }
            else{
                echo "<img src='../images/check.jpg' height='30px' width='30px'>";
            }
        
       }
   }
 
    
    
/* --------------------------------------------------------------
    Function for registering a new user called from register.html
   --------------------------------------------------------------
 */
   
    public function user_register() {
        if (isset($_POST) && count($_POST)) {
            
           require_once("../model/classes.validation.php");
           require_once("../model/classes.register.php");
//           $check = new Register();
//           
//            
//           $check->setUserName($_POST ["u_name"]);
//           
//           $get=$check->checkUnique();
//           
//            if($get){
//                echo "User name already exists";
//            }
//            else{
//             }
           
            
            $Validation = new validate();
            session_unset("msgErrors");
            
            $obj = new Register();
            $token = mt_rand();
            $_SESSION["msgErrors"] = array();
           
           if($Validation->is_validName($_POST["first"]) && $Validation->is_validEmail($_POST["email"]) && $Validation->is_validPhone($_POST["phone"])){
            $obj->setUserName($_POST ["u_name"]);
            $obj->setPassword($token);
            $obj->setFirstName($_POST ["first"]);
            $obj->setLastName($_POST ["last"]);
            $obj->setAddress($_POST ["address"]);
            $obj->setEmail($_POST ["email"]);
            $obj->setPhoneNo($_POST ["phone"]);
            $obj->setName($_POST ["cname"]);
            $obj->setGender($_POST ["gender"]);
            $obj->setUserType($_POST ["utype"]);
          
            if ($obj->RegisterUser() == TRUE) {
                $message = '';
                $message .= "Thank you for registering here is your userid and password" . "<br/>";
                $message .= "UserId :" .$_POST ["u_name"]."<br/>";
                $message .= "Password :" .$token;
                $to = $_POST ["email"];
                
                require("../model/class.phpmailer.php");
                $mail = new PHPMailer();  
                 
                $mail->IsSMTP();
                $mail->Mailer = "smtp";
                $mail->Host = "ssl://smtp.gmail.com";
                $mail->Port = 465;
                $mail->SMTPAuth = true;
                $mail->Username = "debanshuk@gmail.com";
                $mail->Password = "1234debanshu"; 
 
                $mail->From     = "Administrator";
                $mail->AddAddress($to);  
 
                $mail->Subject  = "Login Id and Password";
                $mail->Body     = $message;
  
 
                if($mail->Send()){
                   header("location:../index.php");
                 }
                 else{
                     echo "mail cant be send";
                 }
                 }
                 else{
                     header("location:../view/register.php?msg='Matching User Name'");
                 }
               
             }
                else{
                    header("location:../view/register.php");                   
                } 
             } 
        }    
    
    /* ------------------------------------
        Function to start test
       ------------------------------------
    */
    
        
    public function startTest(){
    	  
    	  require_once("../model/classes.starttest.php");
    	  $startTest=new starttest();
    	  $startTest->setTestId(base64_decode($_REQUEST['testid']));
    	 $b= $startTest->fetchTestInfo();
          
    	  $a=$startTest->sample_question();
          //print_r($b);
          $_SESSION['test']=$a;
          $_SESSION['test1']=$b;
        //  print_r($a);die;
          //$startTest->quesAns();
          $start=0;
    	  include('../view/studentInfo.php');
    	  
    }
       public function result(){
    	require_once("../model/classes.result.php");
    	$result=new result();
    	$a=$_SESSION['test1'];
        $result->setTest_id($_SESSION['test1']['id']);
        $result->setNoOfQuestions($_SESSION['test1']['no_of_questions']);
        $result->setStudent_id($_SESSION['uname']);
    
        $correctAnswers=array();
        $a=$_SESSION['test'];
     
foreach($a as $key=>$values)
    $correctAnswers[]=$a[$key]['answer'];
$result->setCorrectAns($correctAnswers);

if(!empty ($_POST['result']))
$chosenAnswers=explode(',', $_POST['result']);
else
    $chosenAnswers=array();
$result->setChosenAns($chosenAnswers);
$negativeMarking=$_SESSION['test1']['negative_marking'];
$result->calculatemarks($negativeMarking);
$result->saveResult();
include("../view/result.php");
    }



}

$request = "";
if (isset($_GET["method"])) {

    $request = $_GET["method"];
}

$obj = new MyClass();

if (!empty($request)) {
    $obj->$request();
}
?>
