<!DOCTYPE HTML>

<?php

include 'dbconfig.php';
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Member Login</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
        <script type="text/javascript" src="ValidateDonor.js" >
//        function validateDonor()
//        {
//            var obj=document.donorform;
//            var state=obj.state_id.value;
//            if(state=="")
//            {
//                alert("Please Enter the State");
//                return false
//            }
//        }
        
        </script>
</head>
<body>
	<div id="header">
		<div>
			<div class="logo">
<!--				<a href="">Blood Bank</a>-->
<img src="images/b2.jpg">
			</div>
			<?php                        include 'menu1.php'; ?>
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
    
	<div id="contents">
		<div class="section">
			<h1>Member Login</h1>
                        <form action="member_logincode.php" method="post" class="message" name="memberlogin" id="memberlogin" onsubmit="return validateDonor();">
                            
                             <input type="text"  name="uname" placeholder="Enter User Name" onFocus="this.select();" onMouseOut="javascript:return false;"/>
                             <input type="text"  name="password" placeholder="Enter Password" onFocus="this.select();" onMouseOut="javascript:return false;"/>  
                             <input type="submit" value="Submit" name="submit" />
                                &nbsp;
                                <input type="submit" value="Reset"/>
			</form>
		</div>
		<div class="section contact">
			<p>
				For Inquiries Please Call: <span>90-897-678-44</span>
                                <span>Email: info@yourdomain.com </span>
			</p>
			
		</div>
	</div>
                                        
	<div id="footer">
		<div class="clearfix">
			<div id="connect">
				<a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" class="facebook"></a><a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus"></a><a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter"></a><a href="http://www.freewebsitetemplates.com/misc/contact/" target="_blank" class="tumbler"></a>
			</div>
			<p>&copy; 2016 e-bloodbank Automation System</p>
		</div>
	</div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function(){
                 alert('a');
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
                                            $('#dist_id').empty().append(response);
                                    }
                     });
                 });
             });
        </script>
</body>
</html>
