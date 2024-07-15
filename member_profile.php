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
              
                    <form action="update_member.php" method="post" class="message" name="memberprofile" id="memberprofile" enctype="multipart/form-data" onSubmit="return validateMember();">
                         <?php
                                    $query = "select * from member_details where member_id='" . $_SESSION['member_id'] . "'";
                                    foreach ($conn->query($query) as $itm) {
                           ?> 
                           
                           <?php if($itm['mem_image']!=''){ ?>
                           <img src="../memberimage/<?php echo $itm['mem_image'] ?>" height="200px" width="200px" />
                           <?php } else { ?>
                            <img src="../memberimage/no-image.png" height="200px" width="200px" />
                           <?php } ?> <br>
                           
                     <label><b>State : </b></label>
                     <select name="statename" class="form-control" id="state_id">
                                <option value="">Select State</option>
                                <?php
									$query1="select * from state_details where state_status='Active'";
									foreach($conn->query($query1) as $data){
								?>
                                	<option value="<?php echo $data['state_id'] ?>" <?php echo ($data['state_id'] == $itm['state_id'] ? 'selected="selected"' : '') ?>><?php echo $data['state_name'] ?></option>
                                <?php  } ?>
                     </select>
                     
                     <label><b>District : </b></label>
                     <select name="distname" class="form-control" id="dist_id">
                                <option value="">Select District</option>
                                <?php
									$query2="select * from dist_details where dist_status='Active'";
									foreach($conn->query($query2) as $data2){
								?>
                                	<option value="<?php echo $data2['dist_id'] ?>" <?php echo ($data2['dist_id'] == $itm['dist_id'] ? 'selected="selected"' : '') ?>><?php echo $data2['district_name'] ?></option>
                                <?php  } ?>
                     </select>
                        
                       
                     <label><b>Name : </b></label>
                     <input type="text" class="form-control" name="name" placeholder="Enter Name"  value="<?php echo $itm['name'] ?>"/>
                     
                        <label><b>Address :  </b></label>
                        <textarea class="form-control" rows="3" id="address" name="address" placeholder="Enter Your Address"><?php echo $itm['address'] ?></textarea>
                       
                       <label><b>Gender :  </b></label>
                       <?php if($itm['gender']=='male') { ?>
                       	<input type="radio" name="gender" value="male" checked="true">Male
                                    <input type="radio" name="gender" value="female">Female
                       <?php } else { ?>
                       	<input type="radio" name="gender" value="male" >Male
                                    <input type="radio" name="gender" value="female" checked="true">Female
                       <?php } ?> <br>
                       
                       <label><b>Age : </b></label>
                     <input type="text" class="form-control" name="age" placeholder="Enter Age"  value="<?php echo $itm['age'] ?>"/>
                     
                     <label><b>Mobile No : </b></label>
                     <input type="text" class="form-control" name="mobileno" placeholder="Enter Mobile No"  maxlength="10" value="<?php echo $itm['mobileno'] ?>"/>
                     
                     <label><b>Email Id : </b></label>
                     <input type="text" class="form-control" name="emailid" placeholder="Enter Email Id"  value="<?php echo $itm['email_id'] ?>"/>
                       
                         <label><b>Blood Group :  </b></label>
                         <select name="bg" class="form-control">
                                <option value="">Select Blood Group</option>
                                <option value="A+ve" <?php echo ($itm["blood_group"]=='A+ve' ? 'selected="selected"' : '') ?>>A+ve</option>
                                <option value="A-ve" <?php echo ($itm["blood_group"]=='A-ve' ? 'selected="selected"' : '') ?>>A-ve</option>
                                <option value="B+ve" <?php echo ($itm["blood_group"]=='B+ve' ? 'selected="selected"' : '') ?>>B+ve</option>
                                <option value="B-ve" <?php echo ($itm["blood_group"]=='B-ve' ? 'selected="selected"' : '') ?>>B-ve</option>
                                <option value="O+ve" <?php echo ($itm["blood_group"]=='O+ve' ? 'selected="selected"' : '') ?>>O+ve</option>
                                <option value="O-ve" <?php echo ($itm["blood_group"]=='O-ve' ? 'selected="selected"' : '') ?>>O-ve</option>
                                <option value="AB+ve" <?php echo($itm["blood_group"]=='AB+ve' ? 'selected="selected"' : '') ?>>AB+ve</option>
                                <option value="AB-ve" <?php echo ($itm["blood_group"]=='AB-ve' ? 'selected="selected"' : '') ?>>AB-ve</option>
                                
                            </select>
                            
                            <label><b>User Name : </b></label>
                     <input type="text" class="form-control" name="name" placeholder="Enter User name" readonly="true" value="<?php echo $itm['user_name'] ?>"/>
                     
                     <label><b>Upload Image : </b></label>
                     <input type="file" class="form-control" name="uploadimage" />
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
    
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript">
            $(document).ready(function(){
                 
                $('#state_id').change(function(){
                 
                    $.ajax({
                        url:'fetchdist.php',
                        type:'post',
                        data:{state_id : $(this).val()},
                        datatype:'html',
                        
                        beforeSend:function(){
                                            // empty and show loading...
                                            $('#dist_id').empty().append('<option value="">Loading...</option>');
                                    },
                                    // what to do after getting data
                                    success:function(response){console.log(response);
									$('#dist_id').empty();
                                            $('#dist_id').empty().append(response);
                                    }
                     });
                 });
             });
        </script>
</body>
</html>

