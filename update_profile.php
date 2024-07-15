<?php
include 'dbconfig.php';
try{
    
    $count = 0;
        if($count==0){
        $conn->beginTransaction();
        $query="update bloodbank_details set bloodbank_name=?,address=?,contact_no=? where bloodbank_id=? ";
        $res=$conn->prepare($query);
        $data=array($_POST['bloodbank'],$_POST['address'],$_POST['contactno'],$_SESSION['bloodbank_id']);
        $success=$res->execute($data);
        


        if($success){
            $conn->commit();
            $_SESSION['successmessge']='Record update successfully.';
            session_write_close();
             header('Location:edit_profile.php');
        exit;
        }else{
            $conn->rollback();
            $_SESSION['warningmessge']='Failed to update record.';
            session_write_close();
            header('Location:edit_profile.php?id='.$_SESSION['bloodbank_id']);
        exit;
        }
        }
        
} catch (Exception $ex) {
    $_SESSION['errormessge']=$ex->getMessage();
    session_write_close();
    header('Location:edit_profile.php?id='.$_SESSION['bloodbank_id']);
    exit;
}


