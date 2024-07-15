<?php
include 'dbconfig.php';
try {
    $conn->beginTransaction();
    $count = 0;
    
    
    $query = "select count(*) as count from bloodgroup_details where blood_group='".$_POST['bloodgroup']."' and bloodbank_id='".$_SESSION['bloodbank_id']."'";
    foreach ($conn->query($query) as $itm) {
        $count = $itm['count']; 
    }            
    
    if($count==0)
    {
        $query2="insert into bloodgroup_details(stock_id,bloodbank_id,blood_group,quantity) values (?,?,?,?)";
        $res=$conn->prepare($query2);
        $data=['',$_SESSION['bloodbank_id'],$_POST['bloodgroup'],$_POST['qty']];
        
        $success=$res->execute($data);  
        if($success)
                {
                    $conn->commit();
                    $_SESSION['successmessge'] = "Blood Group Deposited successfully";
                    session_write_close();
                    header('Location:deposit_blood.php');
                    exit;
                }
                 else 
                {
                    $conn->rollback();
                    $_SESSION['warningmessge'] = "Failed to insert record.";
                    session_write_close();
                    header('Location:deposit_blood.php');
                    exit;
                }
    }
    else 
    {
        $qty=0;
        $query1="select quantity from bloodgroup_details where bloodbank_id='".$_SESSION['bloodbank_id']."' and blood_group='".$_POST['bloodgroup']."'";
        foreach ($conn->query($query1) as $itm1) {
        $qty = $itm1['quantity'];
        }
       
        $query3="update bloodgroup_details set quantity=?   where bloodbank_id=? and blood_group=?";
        $res=$conn->prepare($query3);
        $givenqty=$_POST['qty'];
        $newqty=$qty+$givenqty;
        $data=array($newqty,$_SESSION['bloodbank_id'],$_POST['bloodgroup']);
       
        $success=$res->execute($data);
       
       if($success)
                {
                    $conn->commit();
                    $_SESSION['successmessge'] = "Blood Group Deposited successfully";
                    session_write_close();
                    header('Location:deposit_blood.php');
                    exit;
                }
                 else 
                {
                    $conn->rollback();
                    $_SESSION['warningmessge'] = "Failed to insert record.";
                    session_write_close();
                    header('Location:deposit_blood.php');
                    exit;
                }
    }
        
                 
    } catch (Exception $ex) {
    $_SESSION['errormessge'] = $ex->getMessage();
    session_write_close();
    header('Location:deposit_blood.php');
    exit;
}



