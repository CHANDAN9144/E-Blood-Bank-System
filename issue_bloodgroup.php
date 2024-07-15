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
         $_SESSION['successmessge'] = "The blood group does not exist";
                    session_write_close();
                    header('Location:deposit_blood.php');
                    exit;
    }
    else 
    {
        $qty=0;
        $newqty=0;
        $query1="select quantity from bloodgroup_details where bloodbank_id='".$_SESSION['bloodbank_id']."' and blood_group='".$_POST['bloodgroup']."'";
        foreach ($conn->query($query1) as $itm1) {
        $qty = $itm1['quantity'];
        $newqty=$_POST['qty'];
        }
        
        if($newqty < $qty)
        {
        $query3="update bloodgroup_details set quantity=?   where bloodbank_id=? and blood_group=?";
        $res=$conn->prepare($query3);
        $givenqty=$_POST['qty'];
        $newqty=$qty-$givenqty;
        $data=array($newqty,$_SESSION['bloodbank_id'],$_POST['bloodgroup']);
        $success=$res->execute($data);
       
       if($success)
                {
                    $conn->commit();
                    $_SESSION['successmessge'] = "Blood Group Issued successfully";
                    session_write_close();
                    header('Location:issue_blood.php');
                    exit;
                }
                 else 
                {
                    $conn->rollback();
                    $_SESSION['warningmessge'] = "Failed to issue Blood Group.";
                    session_write_close();
                    header('Location:issue_blood.php');
                    exit;
                }
    }
    else {
         $_SESSION['successmessge'] = "Sorry !!!!!";
                    session_write_close();
                    header('Location:issue_blood.php');
                    exit;
    }
        
    }            
    } catch (Exception $ex) {
    $_SESSION['errormessge'] = $ex->getMessage();
    session_write_close();
    header('Location:issue_blood.php');
    exit;
}



