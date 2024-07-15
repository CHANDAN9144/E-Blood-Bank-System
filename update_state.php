
<?php
try{
    include 'dbconfig.php';
    
    $count = 0;
    $query1 = "select count(*) as count from state_details where state_name='" . $_POST['state_name'] . "' and state_id <> '".$_POST['state_id']."'";
    foreach ($conn->query($query1) as $itm) {
        $count = $itm['count'];
    }
    
    if($count == 0){
        $conn->beginTransaction();
        $query="update state_details set state_name=? where state_id=?";
        $res=$conn->prepare($query);
        $data=array($_POST['state_name'],$_POST['state_id']);
        $success=$res->execute($data);

        if($success){

            $conn->commit();
            $_SESSION['successmessge']="Record updated successfully.";
            session_write_close();
            header('Location:addstate.php');
            exit;
        }else{
            $conn->rollback();
            $_SESSION['warningmessge']="Failed to Update";
            session_write_close();
            header("Location:edit_state.php?id=".$_POST['state_id']);
            exit;
        }
    }else{
        $_SESSION['warningmessge']="State Name already exists.";
            session_write_close();
            header("Location:edit_state.php?id=".$_POST['state_id']);
            exit;
    }
}  catch (Exception $ex){
    $_SESSION['errormessge']=$ex->getMessage();
    session_write_close();
    header("Location:edit_state.php?id=".$_POST['state_id']);
        exit;
}

