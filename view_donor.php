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
        <title>Blood Bank</title>
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />
        <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <link href="../assets/css/style.css" rel="stylesheet" />
        <!--<script type="text/javascript" src="validateBloodBank.js"></script>-->
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
                        <h1 class="page-head-line">Donor Details</h1>
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
                        <!--    Hover Rows  -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                View Donor
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Member Name</th>
                                                <th>Gender</th>
                                                <th>Contact No.</th>
                                                <th>Blood Group</th>
                                                <th>Regd. Date</th>
                                                <th>Status</th>
                                                <th>View</th>
<!--                                                <th>Edit</th>
                                                <th>Delete</th>   -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            $query = "select member_id,name,gender,mobileno,blood_group,mem_status,regd_date from member_details";
                                            foreach ($conn->query($query) as $itm) {
                                                $i = $i + 1;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $itm['name']; ?></td>
                                                    <td><?php echo $itm['gender']; ?></td>
                                                    <td><?php echo $itm['mobileno']; ?></td>
                                                    <td><?php echo $itm['blood_group']; ?></td>
                                                    <td>
                                                        <?php echo $itm['regd_date']; ?>
                                                        <?php /*print date("d/m/y");*/?>     
                                                    </td>
                                                    <td>
                                                        <?php if($itm['mem_status']=='Active') {?>
                                                        <a style="color:green"  href="mem_status.php?status=<?php echo $itm['mem_status']; ?>&id=<?php echo $itm['member_id'];?>"><?php echo $itm['mem_status']; ?></a>
                                                        <?php } else { ?>
                                                        <a style="color:red"  href="mem_status.php?status=<?php echo $itm['mem_status']; ?>&id=<?php echo $itm['member_id'];?>"><?php echo $itm['mem_status']; ?></a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a  href="donor_details.php?id=<?php echo $itm['member_id']; ?>">View</a>
                                                    </td>
                                                    <!--<td><a class="btn btn-success" href="edit_bloodbank.php?id=<?php echo $itm['bloodbank_id']; ?>">Edit</a></td>-->
                                                    <!--<td><a class="btn btn-danger" onclick="return confirm('Are you sure want to delete the data?')" href="delete_bloodbank.php?id=<?php echo $itm['bloodbank_id']; ?>">Delete</a></td>-->
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


