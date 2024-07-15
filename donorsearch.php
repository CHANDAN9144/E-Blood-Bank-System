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
                        <h1 class="page-head-line">Donor Search</h1>
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
                                        <label for="exampleInputEmail1">Blood Group</label>
                                         <select name="bg" class="form-control">
                                            <option value="">Select Blood Group</option>
                                            <option value="A+ve">A+ve</option>
                                            <option value="A-ve">A-ve</option>
                                            <option value="B+ve">B+ve</option>
                                            <option value="B-ve">B-ve</option>
                                            <option value="O+ve">O+ve</option>
                                            <option value="O-ve">O-ve</option>
                                            <option value="AB+ve">AB+ve</option>
                                            <option value="AB-ve">AB-ve</option>
                           			 </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary" onclick=" return validateState()" />Search</button>
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
                                View Members
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                 <?php
									if(isset($_GET['statename']) && $_GET['statename']!='' && isset($_GET['distname']) && $_GET['distname']!='' && isset($_GET['bg']) && $_GET['bg']!=''){
									?>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Age</th>
                                                <th>Mobile No.</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            $query = "select * from member_details where state_id=".$_GET['statename']." and dist_id=".$_GET['distname']." and blood_group='".$_GET['bg']."' and mem_status='Active'";
                                            foreach ($conn->query($query) as $itm) {
                                                $i = $i + 1;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $itm['name']; ?></td>
                                                    <td><?php echo $itm['address']; ?></td>
                                                    <td><?php echo $itm['age']; ?></td>
                                                    <td><?php echo $itm['mobileno']; ?></td>
                                                    <td><a href="donordetailsview.php?mid=<?php echo $itm['member_id']; ?>" target="_blank" class="btn-info">View</a></td>
                                                </tr>
<?php } ?>
                                        </tbody>
                                    </table>
                                    <?php } ?>
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
