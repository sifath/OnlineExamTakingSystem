
function login()
{	
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	

	requestToServer("php/ajaxRequestHandle.php",'login=true'+'&email='+email+'&password='+password);
	document.getElementById('error').InnerHTML = textHttpResponse;

}