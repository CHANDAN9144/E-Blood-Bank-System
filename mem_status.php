
<?php
try{
    include 'dbconfig.php';
    $conn->beginTransaction();
    $status1=$_GET['status'];

    if($status1=='Active'){
        
        $query="update member_details set mem_status=? where member_id=?";
        $res=$conn->prepare($query);
        $data=array('InActive',$_GET['id']);
        
        $success=$res->execute($data);
        if ($success) {
            $conn->commit();
            $_SESSION['successmessge'] = "Status changed successfully.";
            session_write_close();
            header('Location:view_donor.php');
            exit;
        } else {
            $conn->rollback();
            $_SESSION['warningmessge'] = "Failed to change satus.";
            session_write_close();
            header('Location:view_donor.php');
            exit;
        }
    }else{
         $query="update member_details set mem_status=? where member_id=?";
        $res=$conn->prepare($query);
        $data=array('Active',$_GET['id']);
        $success=$res->execute($data);
        if ($success) {
            $conn->commit();
            $_SESSION['successmessge'] = "Status changed successfully.";
            session_write_close();
            header('Location:view_donor.php');
            exit;
        } else {
            $conn->rollback();
            $_SESSION['warningmessge'] = "Failed to change satus.";
            session_write_close();
            header('Location:view_donor.php');
            exit;
        }
    }
    
}  catch (Exception $ex){
    $_SESSION['errormessage']=$ex->getMessage();
    session_write_close();
    header("Location:addstate.php");
    exit;
}


