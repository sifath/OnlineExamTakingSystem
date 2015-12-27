

var year = document.getElementById("year");
var month = document.getElementById("month");
var day = document.getElementById("day");
var currentYear = parseInt(new Date().getFullYear());
var currentMonth = parseInt(new Date().getMonth())+1;
var currentDate = parseInt(new Date().getDate());

var hour = document.getElementById("hour");
var minute = document.getElementById("minute");

var currentHour = parseInt(new Date().getHours());
var currentMinute = parseInt(new Date().getMinutes());


function yearChanged()
{


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

	year.disabled = false;
	month.disabled = false;
	day.disabled = false;
	hour.disabled = false;
	minute.disabled = false;


	if(hour.value == currentHour)
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
// ------------End of hourChange()-------------------
