<?php
include 'dbconfig.php';

$query="select dist_id,district_name from dist_details where state_id='".$_POST['state_id']."' and dist_status='Active'";
echo '<option value="">Select</option>';
foreach ($conn->query($query) as $itm){
    ?>
<option value="<?php echo $itm['dist_id'] ?>"><?php echo $itm['district_name']; ?></option>
<?php
}
?>

