function validateBloodGroup()
{
	var obj=document.bloodgroup;
	var bloodgroup=obj.bloodgroup.value;
	var qty=obj.qty.value;
	var status=false;
	
	if(bloodgroup=="" || bloodgroup=="select")
	{
		alert("Please Select the Blood Group");
		return false;
	}
	 if(qty=="")
     {
       alert("Please Enter The Quantity");
       return false;
     }
	 if(isNaN(qty)){//returns true if the given value is string else false
		alert('Invalid Quantity');
		return false;
		}
}