
<!DOCTYPE html>
<?php
include("dbconfig.php");
if(!isset($_SESSION['bloodbank_id']) && $_SESSION['bloodbank_id']==''){
    header('Location:../bloodbank_login.php');
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
    <title>Edit Profile</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    
    <script type="text/javascript" src="validateprof.js">   </script>
        
 
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
                    <h4 class="page-head-line">Edit Profile</h4>

                </div>
                   </div>
            <div>
               
         </div>
            <div class="row">
                <div class="col-md-6">
              
                    <form  method="post" name="editprofile" action="update_profile.php">
                         <?php
                                    $query = "select bloodbank_name,address,contact_no from bloodbank_details where bloodbank_id='" . $_SESSION['bloodbank_id'] . "'";
                                    foreach ($conn->query($query) as $itm) {
                                        ?>
                        
                       
                     <label><b>Blood Bank : </b></label>
                     <input type="text" class="form-control" name="bloodbank" placeholder="bloodbank" readonly="true" value="<?php echo $itm['bloodbank_name'] ?>"/>
                     <!--<input type="hidden" name="bloodbank_id" value=""></input>-->
                        <label><b>Address :  </b></label>
                        <textarea class="form-control" rows="3" id="address" name="address" placeholder="Enter Your Address"><?php echo $itm['address'] ?></textarea>
                        <!--<input type="password" class="form-control" name="newpassword" placeholder="New Password"/>-->
                         <label><b>Contact No. :  </b></label>
                         <input type="text" class="form-control" name="contactno" placeholder="Enter Your Contact No" value="<?php echo $itm['contact_no']?>"/>
                        <hr />
                        <input type="submit" class="btn btn-info" value="Update" onClick="return validateProfile();"/>
                        <input type="submit" class="btn btn-info" value="Cancel" onClick="window.location.href='bloodbank_login.php'"/>
                                    <?php }?>
                        <!--<a href="" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </a>&nbsp;-->
                       
                     </form>
                </div>                 
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

