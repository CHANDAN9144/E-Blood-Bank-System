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
                        <h1 class="page-head-line">Blood Bank Details</h1>
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
                               Edit Blood Bank Name
                            </div>
                            <div class="panel-body">
                                <form name="bloodbankform" id="bloodbankform" method="post" action="update_bloodbank.php"  >
                                    <?php
                                        $query1="select dist_details.district_name,state_details.state_name,bloodbank_details.* from dist_details inner join bloodbank_details on dist_details.dist_id=bloodbank_details.dist_id inner join state_details on bloodbank_details.state_id=state_details.state_id where bloodbank_id='".$_GET['id']."'";
                                        foreach($conn->query($query1) as $itm){
                                    ?>
                                  
                                    <div class="form-group">
                                        <label>Select State</label>
                                        <select class="form-control" name="state_id" id="state_id" >
                                            <option value="">Select</option>
                                            <?php
                                            $query = "select * from state_details";
                                            foreach ($conn->query($query) as $data) {
                                                ?>
                                                <option <?php echo ($data['state_id'] == $itm['state_id'] ? 'selected="selected"' : '') ?> value="<?php echo $data['state_id']; ?>"><?php echo $data['state_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="bloodbank_id" value="<?php echo $_GET['id']; ?>"></input>
                                        <label>Select District :</label>
                                        <select class="form-control" name="dist_id" id="dist_id" >
                                            <option value="">Select</option>
                                            <?php
                                                $query = "select * from dist_details";
                                                foreach ($conn->query($query) as $data) {
                                                    ?>
                                                    <option <?php echo ($data['dist_id'] == $itm['dist_id'] ? 'selected="selected"' : '') ?> value="<?php echo $data['dist_id']; ?>"><?php echo $data['district_name']; ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blood Bank Name :</label>
                                        <input type="text" class="form-control" id="bloodbank" name="bloodbank" value="<?php echo $itm['bloodbank_name'] ?>" placeholder="Enter Blood Bank Name" />
                                    </div>
                                    
                                    <div>
                                        <label for="exampleInputEmail1">Address :</label>
                                        <textarea class="form-control" rows="3" id="address" name="address"  placeholder="Enter Address"><?php echo $itm['address']?></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contact No. :</label>
                                        <input type="number" class="form-control" id="contactno" name="contactno"  value="<?php echo $itm['contact_no'] ?>"placeholder="Enter Contact No." />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email Id :</label>
                                        <input type="email" class="form-control" id="email" name="email"  value="<?php echo $itm['email_id'] ?>"placeholder="Enter Email Id" />
                                    </div>
                                    
                                   
                                    <?php } ?>
                                    <input type="submit" class="btn btn-primary" value="Update" onclick="return validateBloodBank();" />
                                    <button type="reset" class="btn btn-default" onclick="window.location.href='view_bloodbank.php'">Cancel</button>
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
        <script type="text/javascript" src="script.js"></script>
         <script type="text/javascript">
            $(document).ready(function(){
                $('#state_id').change(function(){
                  
                    $.ajax({
                        url:'fetchdist.php',
                        type:'post',
                        data:{stateid : $(this).val()},
                        datatype:'html',
                        
                        beforeSend:function(){
                                            // empty and show loading...
                                            $('#dist_id').empty().append('<option value="">Loading...</option>');
                                    },
                                    // what to do after getting data
                                    success:function(response){console.log(response);
                                            $('#dist_id').empty().append(response);
                                    }
                     });
                 });
             });
			 
			 function validateBloodBank()
            {
                var state=document.bloodbankform.state_id.value;
                var district=document.bloodbankform.dist_id.value;
                var bloodbank=document.bloodbankform.bloodbank.value;
                var address=document.bloodbankform.address.value;
                var contactno=document.bloodbankform.contactno.value;
                var email=document.bloodbankform.email.value;
                var password=document.bloodbankform.pwd.value;
                var confirmpwd=document.bloodbankform.conpwd.value;
                var status=false;
                if(state=="")
                {
                    alert("Please Select State Name");
                    return false;
                }
                if(district=="")
                {
                    alert("Please Select District Name");
                    return false;
                }
                if(bloodbank=="")
                {
                    alert("Please Enter Blood Bank");
                    return false;
                }
                if(address=="")
                {
                    alert("Please Enter Address");
                    return false;
                }
                if(contactno=="")
                {
                    alert("Please Enter Contact No");
                    return false;
                }
				
				if(contactno.length != 10)
				{
					alert("Contact Number Should have 10 numbers");
                    return false;
                }
				
                if(email=="")
                {
                    alert("Please Enter Email Id");
                    return false;
                }
				var emailpattern=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
				if(!emailpattern.test(email)){
					alert('Invalid Email Id');
					return false;
				}
                if(password=="")
                {
                    alert("Please Enter Password");
                    return false;
                }
                
                if(confirmpwd==""){
					alert('Please enter confirm password');
					return false;
				}
				
				if(password!=confirmpwd){
					alert('Password mismatch');
					return false;
				}
            }
        </script>
    </body>
</html>


