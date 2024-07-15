<?php
include 'dbconfig.php';
try{
    
    $count = 0;
    $query1 = "select count(*) as count from bloodbank_details where bloodbank_name='" . $_POST['bloodbank'] . "' and bloodbank_id <> '".$_POST['bloodbank_id']."'";
    foreach ($conn->query($query1) as $itm) {
        $count = $itm['count'];
    }
    if ($count == 0) {
            $count1 = 0;
            $query2 = "select count(*) as count from bloodbank_details where email_id='" . $_POST['email'] . "' and bloodbank_id <> '".$_POST['bloodbank_id']."'";
            foreach ($conn->query($query2) as $itm2) {
                $count1 = $itm2['count'];
            }
            if($count1==0){
        $conn->beginTransaction();
        $query="update bloodbank_details set bloodbank_name=?,state_id=?,dist_id=?,address=?,contact_no=?,email_id=? where bloodbank_id=?";
        $res=$conn->prepare($query);
        $data=array($_POST['bloodbank'],$_POST['state_id'],$_POST['dist_id'],$_POST['address'],$_POST['contactno'],$_POST['email'],$_POST['bloodbank_id']);
        $success=$res->execute($data);

        if($success){
            $conn->commit();
            $_SESSION['successmessge']='Record update successfully.';
            session_write_close();
             header('Location:view_bloodbank.php');
        exit;
        }else{
            $conn->rollback();
            $_SESSION['warningmessge']='Failed to update record.';
            session_write_close();
             header('Location:edit_bloodbank.php?id='.$_POST['bloodbank_id']);
        exit;
        }
         }else{
                $_SESSION['warningmessge'] = "Email Id already exists.";
                session_write_close();
                header('Location:edit_bloodbank.php?id='.$_POST['bloodbank_id']);
                exit;
            }
    } else {
        $_SESSION['warningmessge'] = "Bloodbank name already exists.";
        session_write_close();
        header('Location:edit_bloodbank.php?id='.$_POST['bloodbank_id']);
        exit;
    }
        
} catch (Exception $ex) {
    $_SESSION['errormessge']=$ex->getMessage();
    session_write_close();
    header('Location:edit_bloodbank.php?id='.$_POST['bloodbank_id']);
    exit;
}

