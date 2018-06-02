<?php if ( $data ): ?>
	<h1 class="text-center">
		Add Movie
	</h1>
	<form method="post" action="/add/save_movie/">
		<div class="form-group">
			<label>Name</label>
			<input class="form-control" type="text" name="name">
		</div>
		<div class="form-group">
			<label>Genres</label>
			<textarea class="form-control" rows="3" name="genres"></textarea>
			<small class="form-text text-muted">One per line</small>
		</div>
		<div class="form-group">
			<label>Producers</label>
			<textarea class="form-control" rows="3" name="producers"></textarea>
			<small class="form-text text-muted">One per line</small>
		</div>
		<div class="form-group">
			<label>Actors</label>
			<textarea class="form-control" rows="3" name="actors"></textarea>
			<small class="form-text text-muted">One per line</small>
		</div>
		<?php
			echo "<input type=\"hidden\" name=\"discId\" value=\"".$data['id']."\">";
		?>
		<div class="form-group">
			<div>
				<input type="submit" class="btn btn-success" value="Add movie">
			</div>
		</div>
	</form>
<?php else: ?>
	Bad request :/
<?php endif ?>