<?php
try{
    include 'dbconfig.php';
    $conn->beginTransaction();
    $query='delete from bloodbank_details where bloodbank_id=?';
    $res=$conn->prepare($query);
    $data=array($_GET["id"]);
    $success=$res->execute($data);
    
    if($success){
        $conn->commit();
        $_SESSION['successmessge']="Record deleted successfully.";
        session_write_close();
        header('Location:add_bloodbank.php');
        exit;
    }
    else{
        $conn->rollback();
        $_SESSION['warningmessage']="Failed to delete";
        session_write_close();
        header('Location:add_bloodbank.php');
        exit;
    }
    
} catch (Exception $ex) {
        $_SESSION['errormessage']=$ex->getMessage();
        session_write_close();
        header('Location:add_bloodbank.php');
        exit;
}


