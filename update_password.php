<?php
include 'dbconfig.php';
try{
    $oldpwd='';
    $query="select password from member_details where member_id='".$_SESSION['member_id']."'";
    foreach ($conn->query($query) as $itm){
        $oldpwd=$itm['password'];  
    }
    if($oldpwd == $_POST['oldpassword']){
        $conn->beginTransaction();
        $query1="update member_details set password=? where member_id=?";
        $res=$conn->prepare($query1);
        $data=array($_POST['newpassword'],$_SESSION['member_id']);
        $success=$res->execute($data);
        
        if($success){
            $conn->commit();
            $_SESSION['successmessge']="Your password has been changed successfully";
            session_write_close();
            header('location:change_password.php');
        exit;
        }else{
            $conn->rollback();
            $_SESSION['warningmessge']="Failed to change password";
            session_write_close();
        header('location:change_password.php');
        exit;
        }
    }else{
         $_SESSION['warningmessge']="The old password you have entered is incorrect";
         session_write_close();
        header('location:change_password.php');
        exit;
    }
} catch (Exception $ex) {
 $_SESSION['errormessge']=$ex->getMessage();
 session_write_close();
    header('location:change_password.php');
    exit;
}



