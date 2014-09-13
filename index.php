<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>jSON Encoder</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php
	// define variables and set to empty values
	$result = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$input = $_POST["comment"];
		$input = str_replace(array("\n","\r","\t"), '', $input); // remove unwanted spaces
		$result = json_encode($input);
	}
?>
	<div class="container">
		<h1>jSON Encoder</h1>
		<br>
		<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
			<div class="form-group">
				<label for="comment">Input:</label>
				<textarea name="comment" class="form-control" rows="5" cols="100" placeholder="Enter some text to encode"></textarea>
			</div>
		   <button type="submit" class="btn btn-default">Submit</button>
		</form>
		<br><hr><br>
		<div class="form-group">
			<label for="output">Output:</label>
			<textarea id="json_data" name="output" class="form-control" rows="5" cols="100"><?php echo $result; ?></textarea>
		</div>			
			<button id="copy-button" class="btn btn-default"  data-clipboard-target="json_data" title="Copy">Copy</button>
		
	</div>	
	
	 <script src="js/ZeroClipboard.min.js"></script>
	 <script>
	    var client = new ZeroClipboard( document.getElementById("copy-button") );

		client.on( "ready", function( readyEvent ) {

		  client.on( "aftercopy", function( event ) {
			event.target.innerHTML = "Copied";

		  } );
		} );
	 </script>
</body>
</html>