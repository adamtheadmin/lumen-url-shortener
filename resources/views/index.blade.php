<!doctype html>
<html>
	<head>
		<title>URL Shortener</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="/app.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<br />
					<br />
					<h2>URL Shortener</h2>
					<form class="form-group" id="shorten">
						<div class="alert alert-danger" role="alert" style="display:none;">
						  <strong>Oh snap!</strong>
						  <span id="error">Change a few things up and try submitting again.</span>
						</div>
						<label>Enter a URL to Shorten:</label>
						<input class="form-control url" type="text" value="" />
						<button class="btn btn-block btn-success">Shorten URL</button>
						<div class="alert alert-success" role="alert" style="display:none;">
						  <strong>Success</strong>
						  <span id="success"><a>Link Here!</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>