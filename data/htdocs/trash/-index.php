<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-5 offset-md-1">
					<form method="post">
						<div class="input-group">
							<div class=input-group-prepend>
								<span class="input-group-text">Disk name</span>
							</div>
							<input class="form-control" type="text" name="diskName">
						</div>
						Music:
						<div class="input-group">
							<div class=input-group-prepend>
								<span class="input-group-text">Performers</span>
							</div>
							<textarea class="form-control" name="performers"></textarea>
						</div>
						
						<div>
							<input type="submit" class="btn btn-success" value="Add disc">
						</div>
						
					</form>
				</div>
			</div>
		</div>
		<?php
/*			require_once 'connection.php';

			$link 		= mysqli_connect($host, $user, $password, $database) or die('Error ' . mysqli_error($link));
			$query 		= "SELECT * FROM discs";
			$result 	= mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

			if ( $result ) {
				$rows = mysqli_num_rows($result);

				echo "<table><tr><th>disc_id</th><th>disc_name</th></tr>";
				for ( $i = 0; $i < $rows; $i++ ) {
					$row = mysqli_fetch_row($result);

					echo "<tr>";
					for ( $j = 0; $j < 2; $j++ )
						echo "<td>$row[$j]</td>";
					echo "</tr>";
				}
			}

			mysqli_close($link);*/
		?>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>