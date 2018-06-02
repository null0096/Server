<div class="container-fluid">
	<div class="row top-buffer">
		<div class="col-md-8 offset-md-2">
			<?php
				if ( $data != NULL && $rowCount = $data->rowCount() ) {
					echo "<table class=\"table table-dark table-bordered table-hover\"><tr><th>Disc name</th></tr>";
					$rows = $data->fetchAll();
					foreach($rows as $row) {
						echo "<tr><td>".$row['name']."</td></tr>";
					}
					echo "</table>";
				} else {
					echo "Base is empty.";
				}
			?>
		</div>
	</div>
</div>