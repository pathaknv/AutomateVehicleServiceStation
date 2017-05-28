counter = 1;
lCounter = 1;

function readyVehicle(macId) {

	var status = 2;
	$.post('sendData.php', {status:status,macId:macId});
}
function addList(macId) {
	
	var status = 1;
	var parent = document.getElementById('partNumberContent').childElementCount;
	if(parent == 2) {

		var partNumber = document.getElementById('partNumberContent');
		var input = document.createElement('input');
		input.setAttribute('name' , "partNumber"+counter);
		input.setAttribute('id' , "partNumber"+counter);
		
		partNumber.appendChild(input);
		partNumber.appendChild(document.createElement('hr'));

		var partDescription = document.getElementById('partDescriptionContent');
		var input = document.createElement('input');
		input.setAttribute('name' , "partDescription"+counter);
		input.setAttribute('id' , "partDescription"+counter);
		partDescription.appendChild(input);
		partDescription.appendChild(document.createElement('hr'));

		var qty = document.getElementById('qtyContent');
		var input = document.createElement('input');
		input.setAttribute('name' , "qty"+counter);
		input.setAttribute('id' , "qty"+counter);
		qty.appendChild(input);
		qty.appendChild(document.createElement('hr'));

		counter++;

	}
	else {

		var partNumber = document.getElementById('partNumber'+(counter-1));
		var partDescription = document.getElementById('partDescription'+(counter-1));
		var qty = document.getElementById('qty'+(counter-1));

		if(partNumber.value != '' && partDescription.value != '' && qty.value != '') {

			//window.location.href = "sendData.php?partNumber=" + partNumber +"&partDescription=" + partDescription + "&qty=" + qty;
			$.post('sendData.php', {macId: macId,status:status,partNumber:partNumber.value,partDescription:partDescription.value,qty:qty.value});

			var partNumber = document.getElementById('partNumberContent');
			var input = document.createElement('input');
			input.setAttribute('name' , "partNumber"+counter);
			input.setAttribute('id' , "partNumber"+counter);
			partNumber.appendChild(input);
			partNumber.appendChild(document.createElement('hr'));

			var partDescription = document.getElementById('partDescriptionContent');
			var input = document.createElement('input');
			input.setAttribute('name' , "partDescription"+counter);
			input.setAttribute('id' , "partDescription"+counter);
			partDescription.appendChild(input);
			partDescription.appendChild(document.createElement('hr'));

			var qty = document.getElementById('qtyContent');
			var input = document.createElement('input');
			input.setAttribute('name' , "qty"+counter);
			input.setAttribute('id' , "qty"+counter);
			qty.appendChild(input);
			qty.appendChild(document.createElement('hr'));


			counter++;
		}
		else {
			alert("Fill Up the Form");
		}
	}
	
}

function addLabour(macId) {

	var status = 0;
	var parent = document.getElementById('serialNumberContent').childElementCount;
	if(parent == 2) {

		var partNumber = document.getElementById('serialNumberContent');		
		partNumber.appendChild(document.createTextNode(lCounter));
		partNumber.appendChild(document.createElement('hr'));

		var partDescription = document.getElementById('jobDescriptionContent');
		var input = document.createElement('input');
		input.setAttribute('name' , "jobDescription"+lCounter);
		input.setAttribute('id' , "jobDescription"+lCounter);
		partDescription.appendChild(input);
		partDescription.appendChild(document.createElement('hr'));

		var qty = document.getElementById('frtContent');
		var input = document.createElement('input');
		input.setAttribute('name' , "frt"+lCounter);
		input.setAttribute('id' , "frt"+lCounter);
		var x = "frt"+lCounter;
		input.setAttribute('onchange' , suggestion(x));
		qty.appendChild(input);
		qty.appendChild(document.createElement('hr'));

		lCounter++;

	}
	else {

		var jobDescription = document.getElementById('jobDescription'+(lCounter-1));
		var frt = document.getElementById('frt'+(lCounter-1));

		if(jobDescription.value != '' && frt.value != '') {

			//window.location.href = "sendData.php?partNumber=" + partNumber +"&partDescription=" + partDescription + "&qty=" + qty;
			$.post('sendData.php', {macId: macId,status:status,jobDescription:jobDescription.value,frt:frt.value});

			var serialNumber = document.getElementById('serialNumberContent');
			serialNumber.appendChild(document.createTextNode(lCounter));
			serialNumber.appendChild(document.createElement('hr'));

			var jobDescription = document.getElementById('jobDescriptionContent');
			var input = document.createElement('input');
			input.setAttribute('name' , "jobDescription"+lCounter);
			input.setAttribute('id' , "jobDescription"+lCounter);
			jobDescription.appendChild(input);
			jobDescription.appendChild(document.createElement('hr'));

			var frt = document.getElementById('frtContent');
			var input = document.createElement('input');
			input.setAttribute('name' , "frt"+lCounter);
			input.setAttribute('id' , "frt"+lCounter);
			var x = "frt"+lCounter;
			input.setAttribute('onchange' , suggestion(x));
			frt.appendChild(input);
			frt.appendChild(document.createElement('hr'));

		}
		else {
			alert("Fill Up the Form");
		}
	}
}


function historySearch(type) {
	
	var parent = document.getElementById('newInput');
	var input = document.createElement('input');
	input.setAttribute('id' , "searchTypeInput");
	input.setAttribute('name' , "searchTypeInputBox");
	input.setAttribute('class' ,"form-control size300");
	input.setAttribute('placeholder' , 'Enter '+type);
	var label = document.createElement('label');
	label.setAttribute('for' , "usr");
	var text = document.createTextNode('Enter '+type+' : ');
	label.appendChild(text);
	parent.appendChild(label);
	parent.appendChild(input);
	parent.appendChild(document.createElement('br'));
}
function showHistory() {
	
	var selectValue = document.getElementById('searchCategory');
	var searchValue = document.getElementById('searchTypeInput');
	$(function () 
	  {

	    $.ajax({                                      
	      url: 'getHistory.php',                   
	      data: "",                        
	      dataType: 'json',                      
	      success: function(data)          
	      {
	        var historyId = data[0];              
	        var complaintArea = data[2];          
	        var dateOfComplaint = data[3]; 


	        $('#searchHistory').html("<b>id: </b>"+historyId+"<b> name: </b>"+complaintArea);
	      } 
	    });
	  }); 
}

function suggestion(id) {

	alert("Something"+id.value);
}