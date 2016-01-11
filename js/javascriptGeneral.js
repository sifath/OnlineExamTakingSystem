

var year = document.getElementById("year");
var month = document.getElementById("month");
var day = document.getElementById("day");
var durationHoure = document.getElementById("durationHour");
var durationMinute = document.getElementById("durationMinute");
var currentYear = parseInt(new Date().getFullYear());
var currentMonth = parseInt(new Date().getMonth())+1;
var currentDate = parseInt(new Date().getDate());

var hour = document.getElementById("hour");
var minute = document.getElementById("minute");

var currentHour = parseInt(new Date().getHours());
var currentMinute = parseInt(new Date().getMinutes());




function enableSave()
{
	if(document.getElementById("examName").value)
	{
		document.getElementById("saveExam").disabled = false;
		document.getElementById("mes").style.visibility = "hidden";
	}
	else
	{
		document.getElementById("saveExam").disabled = true;
		document.getElementById("mes").style.visibility = "visible";
		document.getElementById("mes").innerHTML = "Fill up the Exam Title to enable this button";
	}
	
}
function yearChanged()
{

	document.getElementById("saveExam").disabled = true;
	document.getElementById("mes").innerHTML = "Fill up the complete start time to enable the save button";
	document.getElementById("mes").style.visibility = "visible";



	for(var x=month.length-1; x>0; x--)
	{
		month.remove(x);
	}

	for(var x=day.length-1; x>0; x--)
	{
		day.remove(x);
	}

	for(var x=hour.length-1; x>0; x--)
	{
		hour.remove(x);
	}

	for(var x=minute.length-1; x>0; x--)
	{
		minute.remove(x);
	}

	if(year.options[year.selectedIndex].text == "Year")
	{
		document.getElementById("saveExam").disabled = false;
		document.getElementById("mes").style.visibility = "hidden";

		month.disabled = true;
		day.disabled = true;
		hour.disabled = true;
		minute.disabled = true;
		return;
	}

	year.disabled = false;
	month.disabled = false;
	day.disabled = true;
	hour.disabled = true;
	minute.disabled = true;



	if(year.value == currentYear)
	{
		for(var m = currentMonth; m<= 12; m++)
		{
			var option = document.createElement("option");
			option.text = m;
			month.add(option);
		}
	}
	else
	{

		for(var m = 1; m<= 12; m++)
		{
			var option = document.createElement("option");
			option.text = m;
			month.add(option);
		}

	}
}

// ------------End of YearChange()-------------------

function monthChanged()
{
	for(var x=day.length-1; x>0; x--)
	{
		day.remove(x);
	}

	for(var x=hour.length-1; x>0; x--)
	{
		hour.remove(x);
	}

	for(var x=minute.length-1; x>0; x--)
	{
		minute.remove(x);
	}	



	if(month.options[month.selectedIndex].text == "Month")
	{
		document.getElementById("saveExam").disabled = true;
		document.getElementById("mes").style.visibility = "visible";
		document.getElementById("mes").innerHTML = "Fill up the complete start time to enable the save button";
		day.disabled = true;
		hour.disabled = true;
		minute.disabled = true;
		return;
	}


	year.disabled = false;
	month.disabled = false;
	day.disabled = false;
	hour.disabled = true;
	minute.disabled = true;


	var daysOfTheMonth = new Date(parseInt(year.value), parseInt(month.value), 0).getDate();

	if(year.value == currentYear && month.value == currentMonth)
	{


		for(var d = currentDate; d <= daysOfTheMonth; d++)
		{
			var option = document.createElement("option");
			option.text = d;
			day.add(option);
		}
		
	}
	else
	{

		for(var d = 1; d<= daysOfTheMonth; d++)
		{
			var option = document.createElement("option");
			option.text = d;
			day.add(option);
		}
	}


}
// ------------End of monthChange()-------------------



function dayChanged()
{
	for(var x=hour.length-1; x>0; x--)
	{
		hour.remove(x);
	}

	for(var x=minute.length-1; x>0; x--)
	{
		minute.remove(x);
	}	

	if(day.options[day.selectedIndex].text == "Day")
	{
		document.getElementById("saveExam").disabled = true;
		document.getElementById("mes").style.visibility = "visible";
		document.getElementById("mes").innerHTML = "Fill up the complete start time to enable the save button";
		hour.disabled = true;
		minute.disabled = true;
		return;
	}


	year.disabled = false;
	month.disabled = false;
	day.disabled = false;
	hour.disabled = false;
	minute.disabled = true;


	if(year.value == currentYear && month.value == currentMonth && day.value == currentDate)
	{

			for(var h = currentHour; h<= 23; h++)
			{
				var option = document.createElement("option");
				option.text = h;
				hour.add(option);
			}

	}
	else
	{
			for(var h = 0; h<= 23; h++)
			{
				var option = document.createElement("option");
				option.text = h;
				hour.add(option);
			}		
	}
		
}
// ------------End of dayChange()-------------------


function hourChanged()
{
	for(var x=minute.length-1; x>0; x--)
	{
		minute.remove(x);
	}	




	if(hour.options[hour.selectedIndex].text == "Hour")
	{
		document.getElementById("saveExam").disabled = true;
		document.getElementById("mes").style.visibility = "visible";
		document.getElementById("mes").innerHTML = "Fill up the complete start time to enable the save button";
		
		minute.disabled = true;
		return;
	}


	year.disabled = false;
	month.disabled = false;
	day.disabled = false;
	hour.disabled = false;
	minute.disabled = false;



	if(year.value == currentYear && month.value == currentMonth && day.value == currentDate && hour.value == currentHour)
		{
			
			for(var m = currentMinute; m<= 59; m++)
			{
				var option = document.createElement("option");
				option.text = m;
				minute.add(option);
			}
		}
		else
		{

			for(var m = 0; m<= 59; m++)
			{
				var option = document.createElement("option");
				option.text = m;
				minute.add(option);
			}
		}
}


function minuteChange()
{
	
	if(minute.options[minute.selectedIndex].text == "Minute")
	{
		document.getElementById("saveExam").disabled = true;
		document.getElementById("mes").style.visibility = "visible";
		document.getElementById("mes").innerHTML = "Fill up the complete start time to enable the save button";
		return;
	}

	if(document.getElementById("examName").value)
	{
		document.getElementById("saveExam").disabled = false;
		document.getElementById("mes").style.visibility = "hidden";
	}
	else
	{
		document.getElementById("saveExam").disabled = true;
		document.getElementById("mes").innerHTML= "Fill up the Exam Title to enable this button";
	}
	
}
// ------------End of hourChange()-------------------

//------------------------------------------------------------------------------------------------



function addNewOption()
{
	
	var options = document.getElementsByClassName("option");

	var flag = 0;

	for(var index = 0; index<options.length; index++)
	{
		if(!options[index].value.trim())
		{
			flag = 1;
			break;
		}
	}

	if(flag)
	{
		return null;
	}

	var check = document.createElement("input");
	check.setAttribute("type", "checkbox");
	check.setAttribute("class","optionCheck");
	var div = document.createElement("div");
	div.setAttribute("class","optionGroup");
	div.appendChild(check);


	var textArea = document.createElement("textarea");
	textArea.setAttribute("class","option form-control");
	textArea.addEventListener("keyup", addNewOption);
	div.appendChild(textArea);

	var fieldset = document.getElementById("allOptions");
	var br = document.createElement("br");
	fieldset.appendChild(br);	
	fieldset.appendChild(div);


}






function resetMessege()
{
	document.getElementById("mess").innerHTML ="";
}


function startExamValidation()
{
	
	var error= "";
	if(!document.getElementById("examId").value)
	{
		error = "Please Enter an Exam Id<br>";
	}

	if(!document.getElementById("institutionId").value)
	{
		error = "Please Enter Your Institution Id. In case you don't have one just use your name here<br>";
	}

	if(error)
	{
		document.getElementById("joinExamError").innerHTML = error;
		document.getElementById("startExamBtn").disabled = true;
	}
	else
	{
		document.getElementById("startExamBtn").disabled = false;
		document.getElementById("joinExamError").innerHTML ="";
	}
}