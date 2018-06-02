<?php
	if ( $data ) {

		echo "<h1 class=\"text-center\">" . $data['discName'] . "</h1>";

		if ( count($data['movies']) ) {

			echo "<h2>Movies</h2>
			<table class=\"table bg-dark text-white opacity-9 table-bordered\">
				<tr class=\"d-flex\">
					<th class=\"col-sm-4\">Name</th>
					<th class=\"col-sm-3\">Actors</th>
					<th class=\"col-sm-3\">Producers</th>
					<th class=\"col-sm-2\">Genres</th>
				</tr>";

			foreach($data['movies'] as $movie) {

				echo "<tr class=\"d-flex\">
					<td class=\"col-sm-4\">
						<p>".$movie['name']."</p>
					</td>
					<td class=\"col-sm-3\">";

				foreach($movie['actors'] as $actor) {
					echo "<p>".$actor['name']."</p>";
				}
				echo "</td>";

				echo "<td class=\"col-sm-3\">";
				foreach($movie['producers'] as $producer) {
					echo "<p>".$producer['name']."</p>";
				}
				echo "</td>";

				echo "<td class=\"col-sm-2\">";
				foreach($movie['genres'] as $genre) {
					echo "<p>".$genre['name']."</p>";
				}
				echo "</td></tr>";

			}

			echo "</table>";
		} else {
			echo "<h4>No movies on the disc</h4>";
		}
		
		echo "<br>";

		if ( count($data['music']) ) {

			echo "<h2>Music</h2>
				<table class=\"table bg-dark text-white opacity-9 table-bordered\">
					<tr class=\"d-flex\">
						<th class=\"col-sm-4\">Name</th>
						<th class=\"col-sm-3\">Performers</th>
						<th class=\"col-sm-3\">Albums</th>
						<th class=\"col-sm-2\">Genres</th>
					</tr>";

			foreach($data['music'] as $music) {

				echo "<tr class=\"d-flex\">
					<td class=\"col-sm-4\">
						<p>".$music['name']."</p>
					</td>
					<td class=\"col-sm-3\">";

				foreach($music['performers'] as $performer) {
					echo "<p>".$performer['name']."</p>";
				}
				echo "</td>";

				echo "<td class=\"col-sm-3\">";
				foreach($music['albums'] as $album) {
					echo "<p>".$album['name']."(".$album['release_date'].")</p>";
				}
				echo "</td>";

				echo "<td class=\"col-sm-2\">";
				foreach($music['genres'] as $genre) {
					echo "<p>".$genre['name']."</p>";
				}
				echo "</td></tr>";

			}
		} else {
			echo "<h4>No music on the disc</h4>";
		}

	} else {
		echo "There is no disk";
	}