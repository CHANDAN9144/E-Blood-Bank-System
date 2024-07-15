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
        <title>District</title>
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />
        <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <link href="../assets/css/style.css" rel="stylesheet" />
        <script type="text/javascript">
            function districtValidate()
            {
                var state=document.districtform.state_id.value;
                var district=document.districtform.districtname.value;
                var status= false;
                if(state=="")
                {
                    alert("Please Select State");
                    return false;
                }
                else
                if(district=="")
                  {
                    alert("Please Enter  District");
                    return false;
                  }
                {
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
                        <h1 class="page-head-line">District Details</h1>
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
                                Create District
                            </div>
                            <div class="panel-body">
                                <form name="districtform" id="districtform" method="post" action="district_code.php" >

                                    <div class="form-group">
                                        <label>Select State</label>
                                        <select class="form-control" name="state_id" id="state_id" >
                                            <option value="">Select</option>
                                            <?php
                                            $query = "select * from state_details where state_status='Active'";
                                            foreach ($conn->query($query) as $data) {
                                                ?>
                                                <option value="<?php echo $data['state_id']; ?>"><?php echo $data['state_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">District Name</label>
                                        <input type="text" class="form-control" id="districtname" name="districtname" placeholder="Enter District Name" />
                                    </div>

                                    <button type="submit" class="btn btn-primary" onclick="return districtValidate(); "/>Submit</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!--    Hover Rows  -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                View District
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>State Name</th>
                                                <th>District Name</th>
                                                <th>District Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            $query1 = "select state_details.state_name,dist_details.district_name,dist_details.dist_id,dist_details.dist_status from state_details inner join dist_details on state_details.state_id=dist_details.state_id" ;
                                            foreach ($conn->query($query1) as $itm) {
                                                $i = $i + 1;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $itm['state_name']; ?></td>
                                                    <td><?php echo $itm['district_name']; ?></td>
                                                    <td>
                                                        <?php if($itm['dist_status']=='Active') {?>
                                                        <a style="color:green"  href="dist_status.php?status=<?php echo $itm['dist_status']; ?>&id=<?php echo $itm['dist_id'];?>"><?php echo $itm['dist_status']; ?></a>
                                                        <?php } else { ?>
                                                        <a style="color:red"  href="dist_status.php?status=<?php echo $itm['dist_status']; ?>&id=<?php echo $itm['dist_id'];?>"><?php echo $itm['dist_status']; ?></a>
                                                        <?php } ?>
                                                    </td>
                                                    <td><a class="btn btn-success" href="edit_dist.php?id=<?php echo $itm['dist_id']; ?>">Edit</a></td>
                                                    <td><a onclick="return confirm('Are you sure want to delete the data?')" class="btn btn-danger" href="delete_district.php?id=<?php echo $itm['dist_id']; ?>">Delete</a></td>
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

