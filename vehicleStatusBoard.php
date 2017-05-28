
<!DOCTYPE html>
<html>
	<head>
		<title>Vehicle Staus Board</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	</head>
	<body>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script>
		
		setInterval(function() {
			
			$(document).ready(function() {

                $.ajax({
				    type: "POST",
				    url: "check.php",
				    data: " ",
				    dataType: "json", 
				    success: function (data) {
				    	
				    	var i;

				    	var lalit = document.getElementById('Lalit');
				    	while (lalit.hasChildNodes()) {
						    lalit.removeChild(lalit.lastChild);
						}
						var suraj = document.getElementById('Suraj');
				    	while (suraj.hasChildNodes()) {
						    suraj.removeChild(suraj.lastChild);
						}
						var saransh = document.getElementById('Saransh');
				    	while (saransh.hasChildNodes()) {
						    saransh.removeChild(saransh.lastChild);
						} 
						var flg = 'lalit';
				    	for(i=0; i<data.length-1;) {

				    		if(flg == 'No')
				    			break;
				    		if(flg == 'lalit' && data[i] == "Next Advisor") {
				    			flg = 'suraj';
				    			i++;
				    		}
				    		if(flg == 'suraj' && data[i] == "Next Advisor") {
				    			flg = 'saransh';
				    			i++;
				    		}

				    		if(flg === 'lalit') {
				    			
						    	var tr = document.createElement('tr');
						    	var td = document.createElement('td');
						    	td.appendChild(document.createTextNode(data[i++]));
						    	tr.appendChild(td);
						    	var td = document.createElement('td');
						    	if(data[i++] == '1')
						    		td.appendChild(document.createTextNode('R'));
						    	else
						    		td.appendChild(document.createTextNode('W'));
						    	tr.appendChild(td);
						    	
						    	lalit.appendChild(tr);
					    	}
					    	if(flg === 'suraj') {
					    			
							    var tr = document.createElement('tr');
							    var td = document.createElement('td');
							    td.appendChild(document.createTextNode(data[i++]));
							    tr.appendChild(td);
							    var td = document.createElement('td');
						    	if(data[i++] == 1)
						    		td.appendChild(document.createTextNode('R'));
						    	else
						    		td.appendChild(document.createTextNode('W'));
						    	tr.appendChild(td);
							    suraj.appendChild(tr);
					    	}

					    	if(flg === 'saransh') {
						    			
							   	var tr = document.createElement('tr');
						    	var td = document.createElement('td');
						    	td.appendChild(document.createTextNode(data[i++]));
						    	tr.appendChild(td);
						    	var td = document.createElement('td');
						    	if(data[i++] == '1')
						    		td.appendChild(document.createTextNode('R'));
						    	else
						    		td.appendChild(document.createTextNode('W'));
						    	tr.appendChild(td);
						    	saransh.appendChild(tr);
			    			}
				    	}

					}
				});
            });

		}, 2000);

    </script>

		<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197" style="color:white;">
			<h1 class="text-center">Pattanshetti Honda Sangli</h1>
			<h3 class="small text-center">Pattanshetti Landmark, Bypass, Madhavnagar Road, Sangli</h3>
		</nav>

		<div class="container-fluid">

			<h4 class="text-center" style="text-align:center; text-decoration: underline;"><b>Vehicle Status Board</b></h4><hr>
			<p class="text-left"><b>Date: <?php echo date("d-m-Y"); ?></b></p>
			<p class="text-right"><b>R: Ready</b><br><b>W: Working</b></p>
			<div class="container-fluid">
			<table class="table table-bordered">

				<thead>
					<th>Service Advisor: Lalit Malani</th>
      				<th>Service Advisor: Suraj Patil</th>
      				<th>Service Advisor: Saransh Khandelwal</th>
				</thead>
				<tbody>
					<tr>
						<td><table class="table table-bordered">
							<thead>
								<th>Vehicle Number</th>
			      				<th>Status</th>
							</thead>
							<tbody id="Lalit">
								
							</tbody>
							</table>
						</td>
						<td><table class="table table-bordered">
							<thead>
								<th>Vehicle Number</th>
			      				<th>Status</th>
							</thead>
							<tbody id="Suraj">
								
							</tbody>
							</table>
						</td>
						<td><table class="table table-bordered">
							<thead>
								<th>Vehicle Number</th>
			      				<th>Status</th>
							</thead>
							<tbody id="Saransh">
								
							</tbody>
							</table>
						</td>
					</tr>
				</tbody>

			</table>
			</div>
		</div>

	</body>
</html