<?php
	echo $data['str'];
	if ( array_key_exists('dicsId', $data) ) {
		echo '<br><br>';
		echo '<a href="/show/disc/'.$data['dicsId'].'" class="btn btn-primary btn-lg">Info</a>';
		echo '<br><br>';
		echo '<a href="/add/add_music/'.$data['dicsId'].'" class="btn btn-primary btn-lg">Add <b>music</b> to this disc</a>';
		echo '<br><br>';
		echo '<a href="/add/add_movie/'.$data['dicsId'].'" class="btn btn-primary btn-lg">Add <b>movie</b> to this disc</a>';
	}
?>
<br>
<br>
<a href="/" class="btn btn-primary btn-lg">Take Me Home</a>