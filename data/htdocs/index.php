<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="./images/_logo.ico" rel="shortcut icon" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-5 offset-md-1">
					<?php
						require "controller.php";
					?>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>