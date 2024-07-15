<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include 'dbconfig.php';
if(!isset($_SESSION['user_id']) && $_SESSION['user_id']==''){
    header('Location:../admin_login.php');
}else{
    
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>state</title>
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />
        <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <link href="../assets/css/style.css" rel="stylesheet" />
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
                    <div class="col-md-12">
                        <h1 class="page-head-line">State Details</h1>
                    </div>
                </div>
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
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Edit State
                            </div>
                            <div class="panel-body">
                                <form role="form" name="stateform" method="post" action="update_state.php">
                                    <?php
                                    $query = "select state_name from state_details where state_id='" . $_GET['id'] . "'";
                                    foreach ($conn->query($query) as $itm) {
                                        ?>
                                        <div class="form-group">
                                            <label>State Name</label>
                                            <input type="hidden" name="state_id" value="<?php echo $_GET['id']; ?>"></input>
                                            <input class="form-control" placeholder="Enter State Details" name="state_name" value="<?php echo $itm['state_name'] ?>">
                                        </div>
                                    <button type="submit" class="btn btn-primary" onclick="return validateState();">Update</button>
                                        <button type="reset" class="btn btn-default" onclick="window.location.href='addstate.php'">Cancel</button>
<?php } ?>
                                    <!--<button type="submit" class="btn btn-primary"/>Edit</button>
                                        <button type="reset" class="btn btn-default">Reset</button> -->  

                                </form>

                            </div>
                        </div>
                    </div>

                </div>

                
                    </div>
                </div>
            </div>
        </div>


        <!-- CONTENT-WRAPPER SECTION END-->
       <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    All Rights Reserved, Interface Software Services.
                    </div>

                </div>
            </div>
        </footer>
        <!-- FOOTER SECTION END-->
        <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY SCRIPTS -->
        <script src="../assets/js/jquery-1.11.1.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="../assets/js/bootstrap.js"></script>
         <script type="text/javascript">
            function validateState()
            {
                var state=document.stateform.state_name.value;
                var status=false;
                if(state=="")
                {
                    //document.getElementById('statename').innerHtML="Please Enter the State Name";
                    alert("Please Enter State Name");
                   // document.getElementById("statename").innerHTML = "Please Enter The State";
                    return false;
                }
                else{
                    return true;
                }
            }
        </script>
    </body>
</html>

