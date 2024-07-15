<?php
include 'dbconfig.php';
try{
    $uid=0;
    $query="select user_id from admin_login where email_id='".$_POST['emailid']."' and password='".$_POST['upass']."'";
    foreach ($conn->query($query) as $itm){
        $uid=$itm['user_id'];
    }
    if($uid>0){
        $_SESSION['user_id']=$uid;
        session_write_close();
        header('Location:change_password.php');
        exit;  
    }
    else{
        
    $_SESSION['warningmessge']="Incorrect emailid or password";
    session_write_close();
    header('location:Login.php');
    exit;
    }   
} catch (Exception $ex) {
    $_SESSION['errormessage']=$ex->getMessage();
    session_write_close();
    header('location:Login.php');
    exit;
}
