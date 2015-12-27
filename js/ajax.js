
var xmlHttp = creteXMLHttpRequestObject();
//var xmlHttpResponse = "";
//var textHttpResponse = "";

function creteXMLHttpRequestObject(){
	var xmlHttp;
	if(window.ActiveXObject)
	{
		try
		{
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			xmlHttp = false;
		}
	}
	else
	{
		try
		{
			xmlHttp = new XMLHttpRequest();
		}
		catch(e)
		{
			xmlHttp = false;
		}
	}

	if(!xmlHttp)
		alert("Can't use xmlHttp");
	else
		return xmlHttp;
}

//-------------AJax FunctionDemo---------------------------
//********************************************************


/*


function AJAXDEMO()
{
	
	var data = "";
	var url = "";

	//write your logic here


	if(xmlHttp)
	{
		try
		{
			xmlHttp.open("POST",url,true);
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlHttp.onreadystatechange = function() 
			{
  				if (xmlHttp.readyState == 4 && xmlHttp.status == 200) 
  				{
    				
    				var response = xmlHttp.responseText;
    				//or var response = xmlHttp.responseXML;

    				//write your logic here which will work after getting response from server 
    				
   			 	}
  			};

			xmlHttp.send(data);

		}catch(e)
		{
			alert(e.toString());
		}
	}

}



*/

function login()
{
	
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var url = "php/ajaxRequestHandle.php";
	var data = 'login=true'+'&email='+email+'&password='+password;
	if(xmlHttp)
	{
		try
		{
			xmlHttp.open("POST",url,true);
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlHttp.onreadystatechange = function() 
			{
  				if (xmlHttp.readyState == 4 && xmlHttp.status == 200) 
  				{
    				
    				var response = xmlHttp.responseText;
    				
    				if(response.trim() == "successful")
					{	
						window.location.replace(".");
					}
					else
					{
						document.getElementById('loginError').innerHTML = response.trim();
					}
   			 	}
  			};

			xmlHttp.send(data);

		}catch(e)
		{
			alert(e.toString());
		}
	}

}
//---------------End Login() -------------------


function signup()
{	
	var inputEmail = document.getElementById('inputEmail').value;
	var name = document.getElementById('name').value;
	var inputPassword = document.getElementById('inputPassword').value;
	var retypePassword = document.getElementById('retypePassword').value;
	var institutionName = document.getElementById('institutionName').value;
	
	
	if(inputPassword != retypePassword)
	{
		document.getElementById('signUpError').innerHTML = "Password and Retype password don't match";
		return null;
	}


	if(!inputEmail)
	{
		document.getElementById('inputEmail').style.borderColor  = "red";
		document.getElementById('signUpError').innerHTML = "Red colored Field is Required !";
		return null;
	}
	
	if(!name)
	{
		document.getElementById('name').style.borderColor  = "red";
		document.getElementById('signUpError').innerHTML = "Red colored Field is Required !";
		return null;
	}
	
	if(!inputPassword)
	{
		document.getElementById('inputPassword').style.borderColor  = "red";
		document.getElementById('signUpError').innerHTML = "Red colored Field is Required !";
		return null;
	}
	
	if(!retypePassword)
	{
		document.getElementById('retypePassword').style.borderColor  = "red";
		document.getElementById('signUpError').innerHTML = "Red colored Field is Required !";
		return null;
	}
	
	var url = "php/ajaxRequestHandle.php";
	var data = 'signup=true'+'&inputEmail='+inputEmail+'&name='+name+'&inputPassword='+inputPassword+'&retypePassword='+retypePassword+'&institutionName='+institutionName;
	


	if(xmlHttp)
	{
		try
		{
			xmlHttp.open("POST",url,true);
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlHttp.onreadystatechange = function() 
			{
  				if (xmlHttp.readyState == 4 && xmlHttp.status == 200) 
  				{
    				var response = xmlHttp.responseText;
    				
    				if(response.trim() == "successful")
					{	
						window.location.replace(".");
					}
					else
					{
						document.getElementById('signUpError').innerHTML = response.trim();
					}
   			 	}
  			};

			xmlHttp.send(data);

		}catch(e)
		{
			alert(e.toString());
		}
	}
}
//---------------------End of signup()----------------------



function saveTheExam()
{
	var examName = document.getElementById('examName').value;
	var year = document.getElementById('year').value;
	var month = document.getElementById('month').value;
	var day = document.getElementById('day').value;
	var hour = document.getElementById('hour').value;
	var minute = document.getElementById('minute').value;
	var amPm = document.getElementById('amPm').value;
	var durationHour = document.getElementById('durationHour').value;
	var durationMinute = document.getElementById('durationMinute').value;
	
	if(!examName)
	{
		document.getElementById('saveExamError').innerHTML = "Red colored Field is Required !";
		return null;
	}
	
	if((!year)||(year < 2001)||(year >2020))
	{
		document.getElementById('saveExamError').innerHTML = "Please enter a valid year !";
		return null;
	}
	
	if((!month)||(month < 1)||(month >12))
	{
		document.getElementById('saveExamError').innerHTML = "Please enter a valid month !";
		return null;
	}
	
	if((!day)||(day < 1)||(day >31))
	{
		document.getElementById('saveExamError').innerHTML = "Please enter a valid day !";
		return null;
	}
	
	if((!hour)||(hour < 1)||(hour >12))
	{
		document.getElementById('saveExamError').innerHTML = "Please enter an valid hour !";
		return null;
	}
	
	if((!minute)||(minute < 1)||(minute >59))
	{
		document.getElementById('saveExamError').innerHTML = "Please enter a valid minute !";
		return null;
	}
	
	if((!durationHour)||(durationHour < 1)||(durationHour >5))
	{
		document.getElementById('saveExamError').innerHTML = "Your exam hour duration is not valid !";
		return null;
	}
	
	if((!durationMinute)||(durationMinute < 1)||(durationHour >59))
	{
		document.getElementById('saveExamError').innerHTML = "Your exam minute duration is not valid !";
		return null;
	}
		
	var url = "php/ajaxRequestHandle.php";
	var data = 'saveTheExam=true'+'&examName='+examName+'&year='+year+'&month='+month+'&day='+day+'&hour='+hour+'&minute='+minute+'&amPm='+amPm+'&durationHour='+durationHour+'&durationMinute='+durationMinute;
	


	if(xmlHttp)
	{
		try
		{
			xmlHttp.open("POST",url,true);
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlHttp.onreadystatechange = function() 
			{
  				if (xmlHttp.readyState == 4 && xmlHttp.status == 200) 
  				{
    				var response = xmlHttp.responseText;
    				
    				if(response.trim() == "successful")
					{	
						window.location.replace(".");
					}
					else
					{
						document.getElementById('signUpError').innerHTML = response.trim();
					}
   			 	}
  			};

			xmlHttp.send(data);

		}catch(e)
		{
			alert(e.toString());
		}
	}
}
