function validasi()
	{
		var firstname=document.form1.firstname.value;
		var lastname=document.form1.lastname.value;
		var email=document.form1.email.value;
		var npassword=document.form1.npassword.value;
		var rpassword=document.form1.rpassword.value;
		var gender=document.form1.gender;
		if (firstname=="")
		{	
			alert("Field First Name Belum Diisi,Harus Diisi!");
		}	if (lastname=="")
		{	
			alert("Field Last Name Belum Diisi,Harus Diisi!");
		}
		if (email=="")
		{	
			alert("Field Email Belum Diisi,Harus Diisi!");
		}
		if (npassword=="")
		{	
			alert("Field New Password Belum Diisi,Harus Diisi!");
		}
		if (rpassword=="")
		{	
			alert("Field Re-enter Password Belum Diisi,Harus Diisi!");
		}
		if (gender=="")
		{	
			alert("Field Gender Belum Diisi,Harus Diisi!");
		}
		else
		{
			if(email.match(polaemail))
			{
				if(npassword.length>6)
				{
					alert("Pengisian Data Success");
				}
				else
				{
					alert("Panjang Password Minimal 6 Karakter");
				}
			}
			else 
			{
				if(npassword.length>6)
				{
					alert("Alamat Email yang Diisikan Tidak Valid");
				}
				else
				{
					alert("Alamat Email yang Diisikan Tidak Valid");
					alert("Panjang Password Minimal 6 Karakter");
				}
				
			}
		}
	
		
	}