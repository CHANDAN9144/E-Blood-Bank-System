<?php
include 'dbconfig.php';
try{
    
    $count = 0;
    $query1 = "select count(*) as count from dist_details where district_name='" . $_POST['districtname'] . "' and dist_id <> '".$_POST['dist_id']."'";
    foreach ($conn->query($query1) as $itm) {
        $count = $itm['count'];
    }
    
    if($count == 0){
        $conn->beginTransaction();
        $query="update dist_details set district_name=?,state_id=? where dist_id=?";
        $res=$conn->prepare($query);
        $data=array($_POST['districtname'],$_POST['state_id'],$_POST['dist_id']);
        $success=$res->execute($data);



        if($success){
            $conn->commit();
            $_SESSION['successmessge']='Record update successfully.';
            session_write_close();
             header('Location:add_district.php');
        exit;
        }else{
            $conn->rollback();
            $_SESSION['warningmessge']='Failed to update record.';
            session_write_close();
             header('Location:edit_dist.php?id='.$_POST['dist_id']);
        exit;
        }
    }else{
         $_SESSION['warningmessge']='District Name already exists.';
            session_write_close();
             header('Location:edit_dist.php?id='.$_POST['dist_id']);
        exit;
    }
} catch (Exception $ex) {
    $_SESSION['errormessge']=$ex->getMessage();
    session_write_close();
    header('Location:edit_dist.php?id='.$_POST['dist_id']);
    exit;
}

