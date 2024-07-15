<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include 'dbconfig.php';
if(!isset($_SESSION['member_id']) && $_SESSION['member_id']==''){
    header('Location:../userlogin.php');
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
                    <div class="col-md-9">
                      <div class="notice-board">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                           Donor Details
                                <div class="pull-right" >
                                    <div class="dropdown">
  
  
</div>
                                </div>
                            </div>
                            <div class="panel-body">
                               
                                <ul >
                                <?php
									$query="select member_details.*,state_details.state_name,dist_details.district_name from member_details inner join state_details on member_details.state_id=state_details.state_id inner join dist_details on member_details.dist_id=dist_details.dist_id where member_id=".$_GET['mid']."";
									
									foreach($conn->query($query) as $itm){
								?>
                                     <li>
                                     
                                     <img src="../memberimage/<?php echo $itm['mem_image']; ?>" height="100px" width="100px" />
                                     
                                     </li>
                                   
                                     <li>
                                            <a href="#">
                                     <span class="glyphicon glyphicon-align-left text-success" ></span> 
                                                  State : 
                                                 <span class="label label-warning" > <?php echo $itm['state_name']; ?> </span>
                                            </a>
                                    </li>
                                     <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-info-sign text-danger" ></span>  
                                          District : 
                                          <span class="label label-info" > <?php echo $itm['district_name']; ?></span>
                                            </a>
                                    </li>
                                     <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-comment  text-warning" ></span>  
                                          Name : 
                                          <span class="label label-success" ><?php echo $itm['name']; ?> </span>
                                            </a>
                                    </li>
                                    
                                    <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-comment  text-warning" ></span>  
                                          Address : 
                                          <span class="label label-success" ><?php echo $itm['address']; ?> </span>
                                            </a>
                                    </li>
                                    
                                    <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-comment  text-warning" ></span>  
                                          Gender : 
                                          <span class="label label-success" ><?php echo $itm['gender']; ?></span>
                                            </a>
                                    </li>
                                    
                                    
                                    <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-comment  text-warning" ></span>  
                                          Age : 
                                          <span class="label label-success" ><?php echo $itm['age']; ?></span>
                                            </a>
                                    </li>
                                    
                                    <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-comment  text-warning" ></span>  
                                          Mobile No. : 
                                          <span class="label label-success" ><?php echo $itm['mobileno']; ?></span>
                                            </a>
                                    </li>
                                    
                                    <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-comment  text-warning" ></span>  
                                          Email Id : 
                                          <span class="label label-success" ><?php echo $itm['email_id']; ?></span>
                                            </a>
                                    </li>
                                    
                                    
                                    
                                    <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-edit  text-danger" ></span>  
                                         Blood Group :
                                          <span class="label label-success" ><?php echo $itm['blood_group']; ?> </span>
                                            </a>
                                    </li>
                                   </a>
                                    </li>
                                    
                                    <?php } ?>
                                </ul>
                            </div>
                           
                        </div>
                    </div>
                    
                   
                  <!-- <a href="donorsearch.php" class="btn btn-danger">Back</a>-->
                   
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
