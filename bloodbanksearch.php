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
                        <h1 class="page-head-line">Blood Bank Search</h1>
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
                                Quick Search
                            </div>
                            <div class="panel-body">
                                <form name="stateform" id="stateform" method="get">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">State Name</label>
                                         <select name="statename" class="form-control" id="state_id">
                                            <option value="">Select State</option>
                                            <?php
                                                $query1="select * from state_details where state_status='Active'";
                                                foreach($conn->query($query1) as $data){
                                            ?>
                                                <option value="<?php echo $data['state_id'] ?>"><?php echo $data['state_name'] ?></option>
                                            <?php  } ?>
                     					 </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">District Name</label>
                                         <select name="distname" class="form-control" id="dist_id">
                                            <option value="">Select District</option>
                     					 </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blood Bank</label>
                                         <select name="bb" id="bloodbank" class="form-control">
                                            <option value="">Blood Bank</option>
                           			     </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary" onclick=" return validateState()" />Search</button>
                                    <button type="reset" class="btn btn-default">Reset</button>   

                                </form>
                                
                            </div>
                        </div>
                    </div>




<?php
									if(isset($_GET['statename']) && $_GET['statename']!='' && isset($_GET['distname']) && $_GET['distname']!='' && isset($_GET['bb']) && $_GET['bb']!=''){
									?>


<div class="row" style="margin-left:0.1%">
                    <div class="col-md-9">
                      <div class="notice-board">
                       <div class="panel panel-primary">
                            <div class="panel-heading">
                           Blood Bank Details
                                <div class="pull-right" >
                                    <div class="dropdown">
  
  
</div>
                                </div>
                            </div>
                            <div class="panel-body">
                               
                                <ul >
                                <?php
									$query="select * from bloodbank_details where bloodbank_id=".$_GET['bb']."";
									
									foreach($conn->query($query) as $itm){
								?>
                                     
                                    <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-comment  text-warning" ></span>  
                                          Blood Bank : 
                                          <span class="label label-success" ><?php echo $itm['bloodbank_name']; ?></span>
                                            </a>
                                    </li>
                                    
                                    <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-comment  text-warning" ></span>  
                                          Address : 
                                          <span class="label label-success" ><?php echo $itm['address']; ?></span>
                                            </a>
                                    </li>
                                    
                                    <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-comment  text-warning" ></span>  
                                          Contact No. : 
                                          <span class="label label-success" ><?php echo $itm['contact_no']; ?></span>
                                            </a>
                                    </li>
                                    
                                    
                                    
                                  
                                    
                                    <?php } ?>
                                </ul>
                            </div>
                           
                        </div>
                         <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Blood Group</th>
                                                <th>Quantity</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            $query = "select * from bloodgroup_details where bloodbank_id=".$_GET['bb']."";
                                            foreach ($conn->query($query) as $itm) {
                                                $i = $i + 1;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $itm['blood_group']; ?></td>
                                                    <td><?php echo $itm['quantity']; ?></td>
                                                </tr>
<?php } ?>
                                        </tbody>
                                    </table>
                    </div>
                  <!-- <a href="donorsearch.php" class="btn btn-danger">Back</a>-->
                   </div>
                </div>
                </div>

<?php } ?>


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
				 
				 
				 
				 
		$('#dist_id').change(function(){
                 
                    $.ajax({
                        url:'fetchbldbank.php',
                        type:'post',
                        data:{dist_id : $(this).val()},
                        datatype:'html',
                        
                        beforeSend:function(){
                                            // empty and show loading...
                                            $('#bloodbank').empty().append('<option value="">Loading...</option>');
                                    },
                                    // what to do after getting data
                                    success:function(response){console.log(response);
									$('#bloodbank').empty();
                                            $('#bloodbank').empty().append(response);
                                    }
                     });
                 });
             });
        </script>
    </body>
</html>
