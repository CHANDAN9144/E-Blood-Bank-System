<?php
include 'dbconfig.php';
try{
    
    $count = 0;
    if ($count == 0) {
            $count1 = 0;
            $query2 = "select count(*) as count from member_details where email_id='" . $_POST['emailid'] . "' and member_id <> '".$_SESSION['member_id']."'";
            foreach ($conn->query($query2) as $itm2) {
                $count1 = $itm2['count'];
            }
            if($count1==0){
                $conn->beginTransaction();
				
				if(isset($_FILES['uploadimage']['name']) and !empty($_FILES['uploadimage']['name'])){
                    $nameArray = explode('.', $_FILES['uploadimage']['name']);
                    $newname = md5(microtime() . $_FILES['uploadimage']['name']) . '.' . end($nameArray);
                    $fileSuccess = move_uploaded_file($_FILES['uploadimage']['tmp_name'],'../memberimage/'.$newname);
					
					$query="update member_details set 								 
					state_id=?,
					dist_id=?,
					name=?,
					mem_image=?,
					address=?,
					gender=?,
					age=?,
					mobileno=?,
					email_id=?,
					blood_group=? 
					
					where member_id=?";
                    $res=$conn->prepare($query);
                    $data=array(
					$_POST['statename'],
					$_POST['distname'],
					$_POST['name'],
					$newname,
					
					$_POST['address'],
					$_POST['gender'],
					$_POST['age'],
					
					
					$_POST['mobileno'],
					$_POST['emailid'],
					$_POST['bg'],
					
					$_SESSION['member_id']
					);
                
                $success=$res->execute($data);
					
                }else{
				
					$query="update member_details set 								 
					state_id=?,
					dist_id=?,
					name=?,
					address=?,
					gender=?,
					age=?,
					mobileno=?,
					email_id=?,
					blood_group=? 
					
					where member_id=?";
                    $res=$conn->prepare($query);
                    $data=array(
					$_POST['statename'],
					$_POST['distname'],
					$_POST['name'],
					
					
					$_POST['address'],
					$_POST['gender'],
					$_POST['age'],
					
					
					$_POST['mobileno'],
					$_POST['emailid'],
					$_POST['bg'],
					
					$_SESSION['member_id']
					);
                
                $success=$res->execute($data);
				
				}

        if($success){
            $conn->commit();
            $_SESSION['successmessge']='Record update successfully.';
            session_write_close();
             header('Location:member_profile.php?id='.$_SESSION['member_id']);
        exit;
        }else{
            $conn->rollback();
            $_SESSION['warningmessge']='Failed to update record.';
            session_write_close();
            header('Location:member_profile.php?id='.$_SESSION['member_id']);
        exit;
        }
        
        }
        else{
                $_SESSION['warningmessge'] = "Email Id already exists.";
                session_write_close();
                header('Location:member_profile.php?id='.$_SESSION['member_id']);
                exit;
            }
    } 
        
} catch (Exception $ex) {
    $_SESSION['errormessge']=$ex->getMessage();
    session_write_close();
    header('Location:member_profile.php?id='.$_SESSION['member_id']);
    exit;
}


