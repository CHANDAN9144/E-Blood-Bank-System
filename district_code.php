<?php
include 'dbconfig.php';
try{
    
    $count = 0;
    $query1 = "select count(*) as count from dist_details where district_name='" . $_POST['districtname'] . "'";
    foreach ($conn->query($query1) as $itm) {
        $count = $itm['count'];
    }
    
    if($count == 0){
        $conn->beginTransaction();
        $query="insert into dist_details (dist_id,state_id,district_name,dist_status) values (?,?,?,?)";
        $res=$conn->prepare($query);
        $data=array('',$_POST['state_id'],$_POST['districtname'],'Active');
        $success=$res->execute($data);

        if($success){
            $conn->commit();
            $_SESSION['successmessge']='Record inserted successfully.';
            session_write_close();
            header('Location:add_district.php');
            exit;
        }else{
             $conn->rollback();
             $_SESSION['warningmessge']='Failed to insert record.';
             session_write_close();
             header('Location:add_district.php');
             exit;
        }
    }else{
        $_SESSION['warningmessge']='District Name already exists.';
             session_write_close();
             header('Location:add_district.php');
             exit;
    }
} catch (Exception $ex) {
    $_SESSION['errormessge']=$ex->getMessage();
    session_write_close();
    header('Location:add_district.php');
    exit;
}


