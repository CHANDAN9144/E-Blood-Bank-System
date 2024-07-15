<?php
include 'dbconfig.php';

$query="select bloodbank_id,bloodbank_name from bloodbank_details where dist_id='".$_POST['dist_id']."' and bloodbank_status='Active'";
echo '<option value="">Select</option>';
foreach ($conn->query($query) as $itm){
    ?>
<option value="<?php echo $itm['bloodbank_id'] ?>"><?php echo $itm['bloodbank_name']; ?></option>
<?php
}
?>

