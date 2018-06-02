<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Discs</title>
		<link href="/images/_logo.ico" rel="shortcut icon" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="/css/mycss.css"/>
		<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css"/>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
		<script src="/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-2 px-1" id="sticky-sidebar">
					<div class="py-2 sticky-top">
						<div class="nav flex-column">
							<h5 class="text-center">Menu</h5>
							<a href="/show/discs" class="nav-link">Show all discs</a>
							<a href="/add/add_disc/" class="nav-link">Add disc</a>
						</div>
					</div>
				</div>
				<div class="col-8 pt-2" id="main">
					<?php
						include 'application/views/'.$content_view;
					?>
				</div>
			</div>
		</div>
	</body>
</html>