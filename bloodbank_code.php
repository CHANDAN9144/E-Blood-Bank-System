<?php

include 'dbconfig.php';
try {
    $conn->beginTransaction();
    $count = 0;
    $query1 = "select count(*) as count from bloodbank_details where bloodbank_name='" . $_POST['bloodbank'] . "'";
    foreach ($conn->query($query1) as $itm) {
        $count = $itm['count'];
    }
    if ($count == 0) {
            $count1 = 0;
            $query2 = "select count(*) as count from bloodbank_details where email_id='" . $_POST['email'] . "'";
            foreach ($conn->query($query2) as $itm2) {
                $count1 = $itm2['count'];
            }
            if($count1==0){
                    $query = "insert into bloodbank_details(bloodbank_id,bloodbank_name,state_id,dist_id,address,contact_no,email_id,password,bloodbank_status,regd_date) values (?,?,?,?,?,?,?,?,?,?)";
                    $res = $conn->prepare($query);
                    
                    date_default_timezone_set('Asia/Calcutta');
                    $my_date = date("Y-m-d");
                    
                    $data = ['', $_POST['bloodbank'],$_POST['state_id'],$_POST['dist_id'], $_POST['address'],$_POST['contactno'],$_POST['email'],$_POST['pwd'],'Active',$my_date];
                    $success = $res->execute($data);
                   

                    if ($success) {
                        $conn->commit();
                        $_SESSION['successmessge'] = "Record Inserted successfully";
                        session_write_close();
                        header('Location:add_bloodbank.php');
                        exit;
                    } else {
                        $conn->rollback();
                        $_SESSION['warningmessge'] = "Failed to insert record.";
                        session_write_close();
                        header('Location:add_bloodbank.php');
                        exit;
                    }
            }else{
                $_SESSION['warningmessge'] = "Email Id already exists.";
                session_write_close();
                header('Location:add_bloodbank.php');
                exit;
            }
    } else {
        $_SESSION['warningmessge'] = "Bloodbank name already exists.";
        session_write_close();
        header('Location:add_bloodbank.php');
        exit;
    }
} catch (Exception $ex) {
    $_SESSION['errormessge'] = $ex->getMessage();
    session_write_close();
    header('Location:add_bloodbank.php');

    exit;
}


