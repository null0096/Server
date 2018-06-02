<h1 class="text-center">
	Discs
</h1>
<?php
	if ( $data != NULL && $rowCount = $data->rowCount() ) {
		echo "<table class=\"table bg-dark text-white opacity-9 table-hover\">";
		$rows = $data->fetchAll();
		foreach($rows as $row) {
			echo 
				"<tr class=\"d-flex\">
					<td class=\"col\">
						<div class=\"dropdown\">
							<button class=\"btn btn-primary dropdown-toggle mr-3\" type=\"button\" data-toggle=\"dropdown\">Actions</button>
							<div class=\"dropdown-menu\">
								<a class=\"dropdown-item\" href=\"/show/disc/".$row['id']."\">Info</a>
								<div class=\"dropdown-divider\"></div>
								<a class=\"dropdown-item\" href=\"/add/add_music/".$row['id']."\">Add <b>Music</b></a>
								<a class=\"dropdown-item\" href=\"/add/add_movie/".$row['id']."\">Add <b>Movie</b></a>
							</div>"
							.$row['name'].
						"</div>
					</td>
				</tr>";
		}
		echo "</table>";
	} else {
		echo "Base is empty.";
	}