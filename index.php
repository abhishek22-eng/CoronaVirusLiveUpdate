<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body onload="fetch();">


	<section class="corona_update">
		<div class="mb-3">
			<h3 class="text-center text-uppercase mt-5">covid 19 Live Updates Of the World</h3>
		</div>

       <div class="table-responsive">
       	 <table class="table table-bordered table-striped text-center" id="tval">

	       	 	<tr>
	       	 		<th>Country</th>
	       	 		<th>TotalConfirmed</th>
	       	 		<th>TotalRecoverd</th>
	       	 		<th>TotalDeaths</th>
	       	 		<th>NewRecovered</th>
	       	 		<th>NewDeaths</th>
	       	 	</tr>

	       	 	<?php

                 $data = file_get_contents('https://api.covid19api.com/summary');

                 $coronalive = json_decode($data,true);

                 
                 
	       	 	?>
	       	 	<script type="text/javascript">
	       	 		function fetch(){
	       	 			$.get('https://api.covid19api.com/summary',
                            
                             function (data){
                             	// console.log(data['Countries'].length)
                             	var tval = document.getElementById('tval');
                             	for(var i=1;i<(data['Countries'].length);i++){
                             		var x = tval.insertRow();
                             		x.insertCell(0);

                             		tval.rows[i].cells[0].innerHTML = data['Countries'][i-1]['Country'];
                             		tval.rows[i].cells[0].style.background = "#e91e63";
                             		tval.rows[i].cells[0].style.color = "#fff";

                             		x.insertCell(1);
                             		tval.rows[i].cells[1].innerHTML = data['Countries'][i-1]['TotalConfirmed'];
                             		tval.rows[i].cells[1].style.background = "#4bb7d8";

                             		x.insertCell(2);
                             		tval.rows[i].cells[2].innerHTML = data['Countries'][i-1]['TotalRecovered'];
                             		tval.rows[i].cells[2].style.background = "#f36e23";


                             			x.insertCell(3);
                             		tval.rows[i].cells[3].innerHTML = data['Countries'][i-1]['TotalDeaths'];
                             		tval.rows[i].cells[3].style.background = "purple";

                             			x.insertCell(4);
                             		tval.rows[i].cells[4].innerHTML = data['Countries'][i-1]['NewRecovered'];
                             		tval.rows[i].cells[4].style.background = "#ffc107";

                             			x.insertCell(5);
                             		tval.rows[i].cells[5].innerHTML = data['Countries'][i-1]['NewDeaths'];
                             		tval.rows[i].cells[5].style.background = "#343a40";
                             		tval.rows[i].cells[5].style.color = "#fff";

                             	}
                             }
                            
	       	 				)
	       	 		}
	       	 	</script>
       	 </table>
       </div>

	</section>



</body>
</html>