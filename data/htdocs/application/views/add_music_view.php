<?php if ( $data != NULL): ?>
	<h1 class="text-center">
		Add Music
	</h1>
	<form method="post" action="/add/save_music/">
		<div class="form-group">
			<label>Name</label>
			<input class="form-control" type="text" name="name">
		</div>
		<div class="form-row">
			<div class="col-10">
				<label>Album</label>
				<input class="form-control" type="text" name="albums[]">
			</div>
			<div class="col-2">
				<label>Release Date</label>
				<input class="form-control" type="number" name="releases[]">
				<small class="form-text text-muted">1901 to 2155</small>
			</div>
		</div>
		<div id="albumsList"></div>
		<div class="form-group">
			<input type="button" class="btn btn-info" onclick="addbutton()" value="Add album">
			<input type="button" class="btn btn-info" onclick="delbutton()" value="Delete album">
		</div>
		<div class="form-group">
			<label>Genres</label>
			<textarea class="form-control" rows="2" name="genres"></textarea>
			<small class="form-text text-muted">One per line</small>
		</div>
		<div class="form-group">
			<label>Performers</label>
			<textarea class="form-control" rows="2" name="performers"></textarea>
			<small class="form-text text-muted">One per line</small>
		</div>
		<?php
			echo "<input type=\"hidden\" name=\"discId\" value=\"".$data['id']."\">";
		?>
		<div class="form-group">
			<div>
				<input type="submit" class="btn btn-success" value="Add music">
			</div>
		</div>
	</form>
	<script>
		var i = 1;
		function addbutton() {
			var p 			= document.createElement('p');
			var mydiv 		= document.createElement('div');
			var albomsDiv 	= document.createElement('div');
			var releaseDiv 	= document.createElement('div');
			var albomInp	= document.createElement('input');
			var releaseInp	= document.createElement('input');

			albomInp.type 	= 'text';
			albomInp.name 	= 'albums[]';
			albomInp.setAttribute('class', 'form-control');

			releaseInp.type = 'number';
			releaseInp.name = 'releases[]';
			releaseInp.setAttribute('class', 'form-control');

			albomsDiv.setAttribute('class', 'col-10');
			albomsDiv.appendChild(albomInp);

			releaseDiv.setAttribute('class', 'col-2');
			releaseDiv.appendChild(releaseInp);

			mydiv.setAttribute('class', 'form-row');
			mydiv.appendChild(albomsDiv);
			mydiv.appendChild(releaseDiv);

			p.setAttribute('id', 'album' + i);
			p.appendChild(mydiv);

			document.querySelector('#albumsList').appendChild(p);
			i++;
		}

		function delbutton() {
			var inputToRemove = document.getElementById('album' + (i - 1));
			if (inputToRemove) {
				document.querySelector('#albumsList').removeChild(inputToRemove);
				i--;
			}
		}
	</script>
<?php else: ?>
	Bad request :/
<?php endif ?>