
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
    				
    				if(response.indexOf("successful") != -1)
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
    				
    				if(response.indexOf("successful") != -1)
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
    				//alert("response: "+response);
    				if(response.indexOf("successful") != -1)
					{	
						window.location.replace("examCreationSuccess.php");
					}
					else
					{
						document.getElementById('mes').innerHTML = response.trim();
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



function addQuestion()
{

	var defaultMarks=document.getElementById("defaultMarks");
	var domain=document.getElementById("domain");
	var topics=document.getElementById("topics");
	var question=document.getElementById("question");
	var mess = document.getElementById("mess");
	var options = document.getElementsByClassName("option");
	var correctOption = document.getElementsByClassName("optionCheck");
	var examId = document.getElementById("examId");
	var optionGroup = document.getElementsByClassName("optionGroup");

	


	var error="";

	if(!domain.value.trim())
	{
		error += "Please give the Domain Name <br>";
	}


	if(!question.value.trim())
	{
		error += "You have to fill up the question field<br>";
	}



	var op ="";
	var checked="";
	var flag = 0;
	for(var index = 0; index<optionGroup.length; index++)
	{
		var textarea = optionGroup[index].getElementsByTagName("textarea")[0];

		if(textarea.value.trim())
		{
			if(!op)
			{
				op += textarea.value;
			}
			else
			{
				op += "#"+textarea.value;
			}

			flag++;

			var checkbox = optionGroup[index].getElementsByTagName("input")[0];
			if(checkbox.checked)
			{
				if(!checked)
				{
					checked += textarea.value;
				}
				else
				{
					checked += "#"+textarea.value;
				}
			}
		}
	}


	if(flag < 2)
	{
		error += "MCQ Should have at least two option<br>";
	}

	if(!checked)
	{
		error += "Please select the correct answers<br>";
	}

	


	if(error)
	{
		mess.innerHTML = error;
		return null;
	}
	else
	{
		mess.innerHTML = "";
	}


	var data = "";
	var url = "php/ajaxRequestHandle.php";
	if(topics.value.trim())
	{
		data = data + "addQuestion=true&examId="+
				examId.innerHTML+"&marks="+defaultMarks.value+"&domain="+domain.value+"&topics="+
				topics.value+"&question="+question.value+"&options="+op+"&correctOptions="+checked;
	}
	else
	{
		data = data + "addQuestion=true&examId="+
				examId.innerHTML+"&marks="+defaultMarks.value+"&question="+question.value
				+"&options="+op+"&correctOptions="+checked;
	}
	

	

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
    				if(response.indexOf("successful") != -1)
    				{
    					document.getElementById("questionGroup").reset();
    					document.getElementById("mess").innerHTML = "Successfully added<br>Now you can add another question";   					
    				}	
   			 	}
  			};

			xmlHttp.send(data);
		}
		catch(e)
		{
			alert(e.toString());
		}
	}

}

// --------- EndOf addQuestion() ------------------------


function startExam()
{
	var examId = document.getElementById("examId");
	var institutionId = document.getElementById("institutionId");


	var data = "startExam=true&examId="+examId.value+"&institutionId="+institutionId.value;
	var url = "php/ajaxRequestHandle.php";

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
    				if(response.indexOf("successful") != -1)
    				{
    					window.location.replace("exam.php?examId="+examId.value);
    				}
    				else{
    					document.getElementById("joinExamError").innerHTML = response.trim()+"<br>";
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

//-------------End of startExam() ------------------------


function submitAnswer()
{

	if(event.target.getAttribute("class").trim() == "clickOptions")
	{	

		var examId = document.getElementById("examId").innerHTML.trim();
		var questionId = event.target.getAttribute("name").trim();
		var answer = event.target.getAttribute("value").trim();
		var check = event.target.checked;
		//alert(event.target.getAttribute("name")+" : "+answer+" : "+check);
		//alert(examId);
		var data = "submitAnswer=true&examId="+examId+"&questionId="+questionId+"&answer="+answer+"&check="+check;
		var url = "php/ajaxRequestHandle.php";

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
    					//alert(response);
    					if(response.indexOf("successful") != -1)
    					{
    						//window.location.replace("exam.php?examId="+examId.value);
    					}
    					else{
    						//document.getElementById("joinExamError").innerHTML = response.trim()+"<br>";
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
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    //alert(d);
    var expires = "expires="+d;
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}




var	timerVar;
function myTimer(examTime)
{
    var currentTime = new Date();
    var startTime = new Date(examTime.startTime);
    var duration = examTime.duration.split(":");
    var endTime = new Date(startTime.getFullYear(),
    						startTime.getMonth(),
    						startTime.getDate(),
    						startTime.getHours()+parseInt(duration[0]),
    						startTime.getMinutes()+parseInt(duration[1]),
    						startTime.getSeconds()+parseInt(duration[2]),
    						startTime.getMilliseconds()
    						);


    var remainingTime = endTime - currentTime;

    if(remainingTime<=0)
    {
    	clearInterval(timerVar);
    	window.location.replace("examEnd.php");

    }

    var remainder;
    var hour = parseInt(remainingTime / (60*60*1000));
    remainder = remainingTime % (60*60*1000);
    var minute = parseInt(remainder / (60*1000));
    remainder = remainder % (60*1000);
    var second = parseInt(remainder / 1000);

    if(hour.toString().length ==1)
    {
    	hour = '0'+hour;
    }

    if(minute.toString().length ==1)
    {
    	minute = '0'+minute;
    }
    
    if(second.toString().length ==1)
    {
    	second = '0'+second;
    }

    var timer = hour+":"+minute+":"+second;
    setCookie("remainingTime", timer.trim(), 2);
    document.getElementById("countdown").innerHTML = timer;

}



function countdown()
{
	
	var examId = document.getElementById("examId").innerHTML.trim();

	var data = "countdown=true&examId="+examId;
	var url = "php/ajaxRequestHandle.php";

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
    			
    				var examTime = JSON.parse(xmlHttp.responseText);
    				//alert(xmlHttp.responseText);
    				if(examTime.duration.trim())
    				{
    					if(getCookie("remainingTime")=="")
    					{
    						setCookie("remainingTime", examTime.duration.trim(), 2);
    					}
    					else
    					{
    						examTime.duration = getCookie("remainingTime").trim();
    					}

    					timerVar = setInterval(function(){ myTimer(examTime) }, 1000);
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