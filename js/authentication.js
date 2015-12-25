
function login()
{	
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	
	var httpResponse = requestToServer("php/ajaxRequestHandle.php",'login=true'+'&email='+email+'&password='+password);
	
	if(httpResponse == "successful")
	{
		location.reload(true);
	}
	else
	{
		document.getElementById('error').InnerHTML = textHttpResponse;
	}
	
}



function signup()
{	
	var inputEmail = document.getElementById('inputEmail').value;
	var name = document.getElementById('name').value;
	var inputPassword = document.getElementById('inputPassword').value;
	var retypePassword = document.getElementById('retypePassword').value;
	var institutionName = document.getElementById('institutionName').value;
	
	requestToServer("php/ajaxRequestHandle.php",'signup=true'+'&inputEmail='+inputEmail+'&name='+name+'&inputPassword='+inputPassword+'&retypePassword='+retypePassword+'&institutionName='+institutionName);
	document.getElementById('error').InnerHTML = textHttpResponse;

}
