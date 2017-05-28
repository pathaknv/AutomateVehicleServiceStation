<!DOCTYPE>
<html>

	<head>
		<title>New Vehicle List</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>

		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script>


			setInterval(function() {
			
			$(document).ready(function() {

                $.ajax({
				    type: "POST",
				    url: "checkMAC.php",
				    data: 'value=1' ,
				    dataType: "json", 
				    success: function (data) {
				    	
				    	var i=0;
				    	var parent = document.getElementById('fetchMac');
				    	while (parent.hasChildNodes()) {
						    parent.removeChild(parent.lastChild);
						}
				    	for(i=0; i<data.length;) {

				    		var tr = document.createElement('tr');
				    		var td = document.createElement('td');
				    		td.appendChild(document.createTextNode(data[i++]));
				    		tr.appendChild(td);

				    		var td = document.createElement('td');
				    		td.appendChild(document.createTextNode(data[i++]));
				    		tr.appendChild(td);

				    		var td = document.createElement('td');
				    		var a = document.createElement('a');
							a.setAttribute('href', "fillinfo.php?macId="+data[i++]);
							a.setAttribute('target' , "_blank");
				    		var btn = document.createElement('input');
					    	btn.setAttribute('type' , "submit");
					    	btn.setAttribute('name' , "submit");

					    	btn.setAttribute('class' , "btn btn-primary");
					    	btn.setAttribute('value' , "Service Request");
					    	a.appendChild(btn);
				    		td.appendChild(a);
				    		tr.appendChild(td);

				    		parent.appendChild(tr);

					    }
					}
				});
            });

		}, 2000);


		</script>

		
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="color:white;">
			<h2 class="text-center">Arrived Vehicle List</h2>
 
		</nav> 
		<div class="container">
		<table class="table" style="margin-top: 150px;">
			<thead>
				<th>Customer Name</th>
				<th>Vehicle Number</th>
				<th>Report</th>
			</thead>
			<tbody id= "fetchMac">

			</tbody>
		</table>
		</div>
	</body>
</html>