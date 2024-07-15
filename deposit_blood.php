
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
    <title>Deposit Blood</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../assets/css/style.css" rel="stylesheet" />   
    <script type="text/javascript" src="validatebg.js"></script>
 
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
                    <h4 class="page-head-line">Deposit Blood</h4>

                </div>
                   </div>
            <div>
               
         </div>
            <div class="row">
                <div class="col-md-6">
              
                    <form  method="post" name="bloodgroup" action="deposit_bloodgroup.php">
                     <div class="form-group">
                                            <label>Deposit Blood Group</label>
                                            <select class="form-control" name="bloodgroup" id="bloodgroup" >
                                                <option value="select">Select Blood Group</option>
                                                <option>A +ve</option>
                                                <option>A -ve</option>
                                                <option>B +ve</option>
                                                <option>B -ve</option>
                                                <option>O +ve</option>
                                                <option>O -ve</option>
                                            </select>
                                        </div>
                         <label><b>Quantity :  </b></label>
                         <input type="text" class="form-control" name="qty" placeholder="Enter the Quantity" value=""/>
                        <hr />
                        <input type="submit" class="btn btn-info" value="Deposit" onClick="return validateBloodGroup();"/>
                        <input type="submit" class="btn btn-info" value="Reset"/>
                       
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
    <script src="../assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>



