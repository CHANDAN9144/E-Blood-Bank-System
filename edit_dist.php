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
                var state=document.distform.state_id.value;
                var district=document.distform.districtname.value;
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
                                Edit District
                            </div>
                            <div class="panel-body">
                                <form name="distform" id="distform" method="post" action="update_dist.php" >
                                    <?php
                                        $query1="select state_details.state_name,dist_details.* from state_details inner join dist_details on state_details.state_id=dist_details.state_id where dist_id='".$_GET['id']."'";
                                        foreach($conn->query($query1) as $itm){
                                        ?> 
                                    <div class="form-group">
                                       
                                        <label>Select State</label>
                                      <input type="hidden" name="dist_id" value="<?php echo $_GET['id']; ?>"></input>
                                            <select class="form-control" name="state_id" id="state_id" >
                                                <option value="">Select</option>
                                                <?php
                                                $query = "select * from state_details";
                                                foreach ($conn->query($query) as $data) {
                                                    ?>
                                                    <option <?php echo ($data['state_id']==$itm['state_id']?'selected="selected"' : '') ?> value="<?php echo $data['state_id']; ?>"><?php echo $data['state_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                         
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">District Name</label>
                                            <input type="text" class="form-control" id="districtname" name="districtname" placeholder="Enter District Name" value="<?php echo $itm['district_name']; ?>"/>
                                        </div>
                                            <?php } ?>
                                    <button type="submit" class="btn btn-primary" onclick="return districtValidate();">Update</button>
                                <button type="reset" class="btn btn-default" onclick="window.location.href='add_district.php'">Cancel</button>
                               
                                        </form>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                        <!-- End  Hover Rows  -->
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


