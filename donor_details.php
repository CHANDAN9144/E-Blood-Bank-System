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
        <title>Donor Details</title>
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />
        <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <link href="../assets/css/style.css" rel="stylesheet" />
        <script type="text/javascript" src="validateEditBloodBank.js"></script>
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
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                               View Donor Details
                            </div>
                            <div class="panel-body">
                                <form name="donordetailsform" id="donordetailsform" method="post" >
                                    <?php
                                        $query1="select dist_details.district_name,state_details.state_name,member_details.name,member_details.address,member_details.gender,member_details.mem_image,member_details.age,member_details.mobileno,member_details.email_id,member_details.blood_group from dist_details inner join member_details on dist_details.dist_id=member_details.dist_id inner join state_details on member_details.state_id =state_details.state_id where member_id='".$_GET['id']."'";
                                        foreach($conn->query($query1) as $itm){
                                    ?>
                                    <center>
                                    <table border="1" height="100" width="100">
                                        <td><img src="../memberimage/<?php echo $itm['mem_image'] ?>" height="100" width="100"/></td>
                                    </table>
                                    </center>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">State :</label>
                                        <input type="text" class="form-control" id="state_id" name="state_id" value="<?php echo $itm['state_name'] ?> " readonly="true" />
                                    </div>

                                        <input type="hidden" name="member_id" value="<?php echo $_GET['id']; ?>"></input>
                                        
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">District :</label>
                                        <input type="text" class="form-control" id="dist_id" name="dist_id" value="<?php echo $itm['district_name'] ?>" readonly="true" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name :</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $itm['name'] ?>" readonly="true"/>
                                    </div>
                                    
                                    <div>
                                        <label for="exampleInputEmail1">Address :</label>
                                        <textarea class="form-control" rows="3" id="address" name="address" readonly="true" ><?php echo $itm['address']?></textarea>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gender :</label>
                                        <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $itm['gender'] ?>" placeholder="Enter Blood Bank Name" readonly="true"/>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Age :</label>
                                        <input type="text" class="form-control" id="age" name="age" value="<?php echo $itm['age'] ?>" readonly="true" />
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contact No. :</label>
                                        <input type="text" class="form-control" id="contactno" name="contactno"  value="<?php echo $itm['mobileno'] ?>" readonly="true" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email Id :</label>
                                        <input type="email" class="form-control" id="email" name="email"  value="<?php echo $itm['email_id'] ?>"readonly="true"/>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blood Group :</label>
                                        <input type="text" class="form-control" id="bg" name="bg"  value="<?php echo $itm['blood_group'] ?>" readonly="true" />
                                    </div>
                                    
                                   <?php } ?>
                                    
                                    <!--<button type="submit" class="btn btn-primary" onsubmit="return validateBloodBank()"/>Update</button>-->
                                    <center><button type="reset" class="btn btn-default" onclick="window.location.href='view_donor.php'">Back</button></center>
                                    </form>
                                
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
    </body>
</html>


