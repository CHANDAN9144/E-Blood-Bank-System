function validateMember()
{
			var obj=document.memberprofile;
            var name=obj.name.value;
			var upload=obj.upload.value;
			var address=obj.address.value;
			var age=obj.age.value;
			var contact=obj.contact.value;
			var email=obj.email,value;
			var bg=obj.bg.value;
			var uname=obj.uname.value;
			
            if(name=="")
            {
                alert("Please Enter the name");
                return false;
            }
			if(upload=="")
            {
                alert("Please Choose the Image");
                return false;
			}
			if(address=="")
            {
                alert("Please Enter the address");
                return false;
            }
			
			if(obj.gender[0].checked==false && obj.gender[1].checked==false)
			{
				alert('please choose Gender');
				return false;
			}
			if(age=="")
            {
                alert("Please Enter the age");
                return false;
            }
			if(contact=="")
            {
                alert("Please Enter the contact");
                return false;
            }
			if(isNaN(contact))
			{
				alert('invalid phone no');
				return false;
			}
			if(contact.length !=10)
			{
				alert('Phone no. should be 10');
				return false;
			}
			if(email=="")
			{
				alert('Please Enter EmailId');
				return false;
			}
		
		//	var emailpattern=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
		//	if(!emailpattern.test(email))
		//	{
		//		alert('Invalid Email Id');
		//		return false;
		//	}//
			if(bg=="")
			{
				alert("Please Choose the Blood Group");
				return false;
			}
			if(uname=="")
			{
				alert("Please Enter the User Name");
				return false;
			}
}