<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planet Information Web App</title>
    <script src="jquery.min.js"></script>
    <script type="text/javascript">
        function getPlanetDetails() {			
			$.ajax({
				url : "http://localhost/planet-ajax/server.php",
				type : "POST",
				data : "planet_name="+$('#planet_name').val(),
				dataType : "json",
				success : function (response, status, http) {
					console.log(response);
					var new_suggestions = '';
					$.each(response, function (index, item) {
						new_suggestions = new_suggestions + ' Name:' + item.name + '<br>';
						new_suggestions = new_suggestions + ' No. of Days in a year:' + item.no_of_days_in_year + '<br>';
						new_suggestions = new_suggestions + ' Planet Order No.: ' + item.order_no + '<br>';
					});
					$('#suggestion_box').html(new_suggestions);

				},
				error : function (http, status, error) {
					alert('ERROR: '+error);
				}
			});
		}
    </script>
</head>
<body>
    <div>
    Planet Name : <input type="text" name="planet_name" id="planet_name" onkeyup="getPlanetDetails();">
    </div>
    <div>
    <p style="color:blue;">Suggestion List : </p>
    <p id="suggestion_box" name="suggestion">here u see the planet info</p>
    </div>
</body>
</html>