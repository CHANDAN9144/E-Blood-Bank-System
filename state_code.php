<?php

include 'dbconfig.php';
try {
    $conn->beginTransaction();
    $count = 0;
    $query1 = "select count(*) as count from state_details where state_name='" . $_POST['statename'] . "'";
    foreach ($conn->query($query1) as $itm) {
        $count = $itm['count'];
    }
    if ($count == 0) {
        $query = "insert into state_details(state_id,state_name,state_status) values (?,?,?)";
        $res = $conn->prepare($query);
        $data = ['', $_POST['statename'], 'Active'];
        $success = $res->execute($data);

        if ($success) {
            $conn->commit();
            $_SESSION['successmessge'] = "Record Inserted successfully";
            session_write_close();
            header('Location:addstate.php');
            exit;
        } else {
            $conn->rollback();
            $_SESSION['warningmessge'] = "Failed to insert record.";
            session_write_close();
            header('Location:Login.php');
            exit;
        }
    } else {
        $_SESSION['warningmessge'] = "State name already exists.";
        session_write_close();
        header('Location:addstate.php');
        exit;
    }
} catch (Exception $ex) {
    $_SESSION['errormessge'] = $ex->getMessage();
    session_write_close();
    header('Location:addstate.php');
    exit;
}

