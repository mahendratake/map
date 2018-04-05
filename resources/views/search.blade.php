<!DOCTYPE html>
<html>
<head>
	<title>Address Search on Map</title>
	<meta name="csrf-token" content="{{csrf_token()}}"/>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
	
	<script type="text/javascript">
		
		$(document).ready(function(){
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

			$("#search_btn").click(function(event) {
			$.ajax({
				url:   '/postajax',	
				type: 'POST',				
				data: {_token: CSRF_TOKEN, location:$("#address").val()},
				dataType: "html",			
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				success: function(data) {
					$('#map_canvas').html(data);					
				}

			});
		});

		});
	</script>
</head>
<body>
	Search Location Name on google Map : <br>
	<input type="text" name="location" id="address">
	<br><br>
	<input type="submit" name="submit" value="Search" id="search_btn">
<div id = 'map_canvas'>     
</div>


</body>
</html>>
