
<!DOCTYPE>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>

$(document).ready(function() {
	$("button").click(function() {
		$searchType = $('#searchCategory').val();
		$searchValue = $('#searchTypeInput').val();

		 $.ajax({
		    type: "POST",
		    url: "getHistory.php",
		    data: 'value1=' + $searchType + '&value2=' + $searchValue,
		    dataType: "json", 
		    success: function (data) {

		    var parent = document.getElementById('searchHistory');
		    while (parent.hasChildNodes()) {
			    parent.removeChild(parent.lastChild);
			}
		    for(var i=0; i<data.length;) {
			    
		        var card = document.createElement('div');
		        card.setAttribute('class' , "card center");

		        var contain = document.createElement('div');
		        contain.setAttribute('class' , "contain");

		        var para = document.createElement('p');
		        var strong = document.createElement('strong');
		        strong.appendChild(document.createTextNode('HistoryId: '));
		        contain.appendChild(strong);
		        para.appendChild(document.createTextNode(data[i++])); 
		        contain.appendChild(para);
		        var para = document.createElement('p');
		        var strong = document.createElement('strong');
		        strong.appendChild(document.createTextNode('Date of Complaint: '));
		        contain.appendChild(strong);
		        para.appendChild(document.createTextNode(data[i++]));        
		        contain.appendChild(para);
		        var para = document.createElement('p');
		        var strong = document.createElement('strong');
		        strong.appendChild(document.createTextNode('Complaint: '));
		        contain.appendChild(strong);
		        para.appendChild(document.createTextNode(data[i++]));        
		        contain.appendChild(para);

		        card.appendChild(contain);
		        parent.appendChild(card);
		      }
		    }
		});
	});
});

</script>
		<h3 align="center">Search History</h3><hr>
		<form name="form" action="#" method="POST">

			<div class="container">
				<div class="row">
					<div class="col-sm-5">
		      		<label for="usr">Search By:</label>
					<select id="searchCategory" class="form-control size300" name="searchCategory" style="padding-right: 10px;" onchange="historySearch(this.value)">
						<option>Choose Option</option>
						<option>Customer Name</option>
						<option>Vehicle Number</option>
						<option>Mobile Number</option>
						<option>Aadhar Number</option>
					</select>
					</div>
					<div class="col-sm-5"> <div id="newInput"></div> </div>
					<div class="col-sm-2 bottom">
					<button type="button" name="button" id="button" class= "btn btn-info">Submit</button>
					</div>
				</div>
			</div>
		</form>
		<div id="searchHistory">
		</div>
		<div id="searchHistory1">
		</div>
		<div id="searchHistory2">
		</div>
</body>
</html>


