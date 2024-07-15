<!DOCTYPE html>
<?php
include("dbconfig.php");
if(!isset($_SESSION['member_id']) && $_SESSION['member_id']==''){
    header('Location:../userlogin.php');
}else{
    
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Change Password</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    
    <script type="text/javascript">
        function validateConPassword()
        {
            var obj=document.changepwdform;
            var oldpwd=obj.oldpassword.value;
            var newpwd=obj.newpassword.value;
            var conpwd=obj.confirmpassword.value;
            
            if(oldpwd==""){
		alert('Please Enter your Old  Password');
		return false;
		}
		
            if(newpwd==""){
		alert('Please Enter New Password');
		return false;
		}
             if(conpwd==""){
		alert('Please Enter Confirm Password');
		return false;
		}
		
            if(newpwd!=conpwd){
		alert('password mismatch');
		return false;
		}
                else{
                    return true;
                }
            function goback()
            {
                window.history.back("bloodbank_login.php");
            }
            
        }
    </script>
</head>
<body>
   
    <?php include 'header.php'; ?>
        <!-- HEADER END-->
        <?php include 'logoheader.php'; ?>
        <!-- LOGO HEADER END-->
        <?php include 'menu.php'; ?>
        <!-- MENU SECTION END-->
    
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <?php if (isset($_SESSION['successmessge'])) { ?>
                        <div class="alert alert-success">
                        <?php
                            echo $_SESSION['successmessge'];
                            unset($_SESSION['successmessge']);
                        ?>
                    </div>
                    <?php } ?>
                    
                    
                    
<?php if (isset($_SESSION['warningmessge'])) { ?>
                        <div class="alert alert-warning">
                        <?php
                            echo $_SESSION['warningmessge'];
                            unset($_SESSION['warningmessge']);
                        ?>
                    </div>
<?php } ?>
<?php if (isset($_SESSION['errormessge'])) { ?>
                       <div class="alert alert-error">
                        <?php
                            echo $_SESSION['errormessge'];
                            unset($_SESSION['errormessge']);
                        ?>
                       </div>
<?php } ?>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Change Password</h4>

                </div>
                   </div>
            <div>
               
         </div>
            <div class="row">
                <div class="col-md-6">
              
                     <form  method="post" name="changepwdform" action="update_password.php">
                     <label><b>Old Password : </b></label>
                     <input type="password" class="form-control" name="oldpassword" placeholder="Old Password"/>
                        <label><b>New  Password :  </b></label>
                        <input type="password" class="form-control" name="newpassword" placeholder="New Password"/>
                         <label><b>Confirm Password :  </b></label>
                         <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Paassword"/>
                        <hr />
                        <input type="submit" class="btn btn-info" value="Update" onClick="return validateConPassword();"/>
                        <input type="submit" class="btn btn-info" value="Cancel" onClick="goback()"/>
                        <!--<a href="" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </a>&nbsp;-->
                     </form>
                </div>                 
                </div>
            </div>
        </div>
        
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    All Rights Reserved, Interface Software Services.
                    </div>

                </div>
            </div>
        </footer>
    <!-- CONTENT-WRAPPER SECTION END
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>

