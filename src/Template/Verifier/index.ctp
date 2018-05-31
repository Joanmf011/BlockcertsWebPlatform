<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Blockcerts | UPF</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

<div id="wrapper">
	<header>
		<div class="container">
			<div class='row'>
				<div class='col'>
					<img id='header-logo' src='img/logo.png' class='img-responsive' alt='Universitat Pompeu Fabra'>
				</div>
			</div>
		</div>
	</header>
	<div id='page'>
		<div class='container'>
			<div class='main-title'>
				<h2>UPLOAD YOUR FILE HERE</h2>
				<form class='form-inline' method='post' action="/Verifier/verify" enctype="multipart/form-data">
				<div style='margin:0 auto; width:auto'>
				  <div class="form-group mx-sm-3 mb-2">
				    <input type="file" class="form-control" name="json" placeholder="JSON File">
				  </div>
				  <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<footer>
		<div id="footer-content" class="container">
			<div id="sfooter" class="row bgdark justify-content-between">
				<span class="col">
					© Universitat Pompeu Fabra Barcelona
				</span>
			</div>
		</div>
	</footer>
</div>


</body>
</html>
