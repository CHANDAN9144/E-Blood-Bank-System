<?php
include 'dbconfig.php';
try{
    $mid=0;
    $query="select member_id from member_details where user_name='".$_POST['uname']."' and password='".$_POST['password']."' and mem_status='Active'";
    
    foreach ($conn->query($query) as $itm){
        $mid=$itm['member_id'];
       
        }
   
    if($mid>0){
        $_SESSION['member_id']=$mid; 
         
//        $_SESSION['successmessge']="You have successfully Login";
//        session_write_close();
        header('Location:member/member_profile.php');
        exit;  
    }
    else
    {    
    $_SESSION['warningmessge']="Incorrect emailid or password";
    session_write_close();
    header('location:member_login.php');
    exit;
    }   
} catch (Exception $ex) {
    $_SESSION['errormessage']=$ex->getMessage();
    session_write_close();
    header('location:member_login.php');
    exit;
}


