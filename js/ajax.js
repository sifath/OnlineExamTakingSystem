
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
						document.getElementById('error').innerHTML = response.trim();
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


	if(inputEmail == "")
	{
		document.getElementById('inputPassword').style.borderColor  = "red";
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



