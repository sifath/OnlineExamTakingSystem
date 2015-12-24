
var xmlHttp = creteXMLHttpRequestObject();
var xmlHttpResponse = "";
var textHttpResponse = "";

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




function requestToServer(url,data)
{
	
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
    				//request code go here code 
    				textHttpResponse = xmlHttp.responseText;
    				xmlHttpResponse = xmlHttp.responseXML;
   			 	}
  			};

			xmlHttp.send(data);

		}catch(e)
		{
			alert(e.toString());
		}
	}
}


