
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
	
	var examName = document.getElementById('examName');
	var year = document.getElementById('year');
	var month = document.getElementById('month');
	var day = document.getElementById('day');
	var hour = document.getElementById('hour');
	var minute = document.getElementById('minute');
	var durationHour = document.getElementById('durationHour');
	var durationMinute = document.getElementById('durationMinute');
	
	var errorMessage = "";
	var data = 'saveTheExam=true'+'&examName='+examName.value;

	
	if(year.options[year.selectedIndex].text != "Year")
	{
		data = data + '&year='+year.options[year.selectedIndex].text+'&month='
				+month.options[month.selectedIndex].text+'&day='+day.options[day.selectedIndex].text+'&hour='+hour.options[hour.selectedIndex].text+'&minute='
				+minute.options[minute.selectedIndex].text;
	}


	if(durationHour.value)
	{
		if(parseInt(durationHour.value) != "NaN" && parseInt(durationHour.value) >=0)
		{
			data = data + '&durationHour='+durationHour.value+'&durationMinute='+durationMinute.options[durationMinute.selectedIndex].text;
		}
		else
		{
			document.getElementById("mes").innerHTML = "Duration is not a valid time";
			document.getElementById("mes").style.visibility = "visible";
			return null;
		}
	}
	else
	if(durationMinute.options[durationMinute.selectedIndex].text != '0')
	{
		data = data + '&durationHour=0'+'&durationMinute='+durationMinute.options[durationMinute.selectedIndex].text;
	}

	var url = "php/ajaxRequestHandle.php";
			
	//alert(data);
	

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
    				alert("response: "+response);
    				if(response.trim() == "successful")
					{	
						window.location.replace("examCreationSuccess.php");
					}
					else
					{
						//document.getElementById('signUpError').innerHTML = response.trim();
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


//-----------------End of saveTheExam()------------------------------