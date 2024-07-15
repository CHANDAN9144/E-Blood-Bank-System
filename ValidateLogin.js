function validateLogin()
{
    var obj=document.loginform;
    var email=obj.emailid.value;
    var password=obj.upass.value;
    var emailpattern=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    
    if(email=="")
    {
        alert("Please Enter Email Id");
        return false;
    }
    if(!emailpattern.test(email))
    {
        alert('Invalid Email Id');
        return false;
    }
    if(password=="")
    {
        alert('Please Enter Your Password');
	return false;
    }else
    {
        return true;
    }
}


