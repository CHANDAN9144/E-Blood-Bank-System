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
                    alert("Please Enter The State Name");
                    return false;
                }
                if(district=="")
                {
                    alert("Please Enter The District Name");
                    return false;
                }
                if(bloodbank=="")
                {
                    alert("Please Enter The Blood Bank");
                    return false;
                }
                if(address=="")
                {
                    alert("Please Enter The Address");
                    return false;
                }
                if(contactno=="")
                {
                    alert("Please Enter The Contact No");
                    return false;
                }
				if(contactno.length<=10)
				{
					alert("Contact Number Should have 10 numbers");
                    return false;
                }
                if(email=="")
                {
                    alert("Please Enter The Email");
                    return false;
                }
                return true;
            }