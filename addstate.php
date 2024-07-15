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
        
        <script type="text/javascript">
            function validateState()
            {
                var state=document.stateform.statename.value;
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
                                Create State
                            </div>
                            <div class="panel-body">
                                <form name="stateform" id="stateform" method="post" action="state_code.php"  >
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">State Name</label>
                                        <input type="text" class="form-control" id="statename" name="statename" placeholder="Enter State Name" />
                                    </div>

                                    <button type="submit" class="btn btn-primary" onclick=" return validateState()" />Submit</button>
                                    <button type="reset" class="btn btn-default">Reset</button>   

                                </form>
                                
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!--    Hover Rows  -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                View State
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>State Name</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            $query = "select * from state_details order by state_name asc";
                                            foreach ($conn->query($query) as $itm) {
                                                $i = $i + 1;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $itm['state_name']; ?></td>
                                                    <td>
                                                        <?php if($itm['state_status']=='Active') {?>
                                                        <a style="color:green"  href="update_status.php?status=<?php echo $itm['state_status']; ?>&id=<?php echo $itm['state_id'];?>"><?php echo $itm['state_status']; ?></a>
                                                        <?php } else { ?>
                                                        <a style="color:red"  href="update_status.php?status=<?php echo $itm['state_status']; ?>&id=<?php echo $itm['state_id'];?>"><?php echo $itm['state_status']; ?></a>
                                                        <?php } ?>
                                                    </td>
                                                    <td><a class="btn btn-success" href="edit_state.php?id=<?php echo $itm['state_id']; ?>">Edit</a></td>
                                                    <td><a onclick="return confirm('Are you sure want to delete the data?')" class="btn btn-danger" href="delete_state.php?id=<?php echo $itm['state_id']; ?>">Delete</a></td>
                                                </tr>
<?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End  Hover Rows  -->
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
    </body>
</html>
