function validateProfile()
{
	var obj=document.editprofile;
	var address=obj.address.value;
	var contactno=obj.contactno.value;
	var status=false;
	
	 if(address=="")
	 {
		alert("Please Enter the address");
		return false;
	 }
	 if(contactno=="")
     {
       alert("Please Enter The Contact No");
       return false;
     }	
	 if(isNaN(contactno))
	 {//returns true if the given value is string else false
		alert('Invalid phone no');
		return false;
	 }
	 if(contactno.length !=10)
	 {
		alert('Invalid phone no.');
		return false;
	 }
}