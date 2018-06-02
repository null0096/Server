<?php
	class Model_add extends Model {

		public function save_disc() {
			if ( $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) ) {

				try {
					$db = new PDO("mysql:host=localhost;dbname=mydiscs", 'root', '1234', array(PDO::ATTR_PERSISTENT => true));

					try {
						$db->beginTransaction();
						$query = $db->prepare("INSERT INTO `discs` VALUES(NULL,:name)");
						$query->execute(['name' => $_POST["name"]]);
						$insertId = $db->lastInsertId();
						$db->commit();

						return [
							'str' => 'Dics "'.$_POST["name"].'" was added to the DB!',
							'dicsId' => $insertId
						];
					}
					catch(PDOException $e) {
						$db->rollBack();
						throw $e;
					}
				}
				catch(PDOException $e) {
					return [ 'str' => $e->getMessage() ];
				}

			} else {
				return [ 'str' => "Bad request :/" ];
			}	
		}

		public function save_music() {
			if ( $_SERVER["REQUEST_METHOD"] == "POST" 
				&& isset($_POST["name"]) 		&& !empty($_POST["name"])
				&& isset($_POST["genres"]) 		&& !empty($_POST["genres"])
				&& isset($_POST["performers"]) 	&& !empty($_POST["performers"])
				&& isset($_POST["discId"]) 		&& !empty($_POST["discId"])
				&& isset($_POST["releases"]) 
				&& isset($_POST["albums"])
			) {

				try {
					$db = new PDO("mysql:host=localhost;dbname=mydiscs", 'root', '1234', array(PDO::ATTR_PERSISTENT => true));

					try {

						$isDuplicate = $this->isMusicDuplicate($db);
						if ( $isDuplicate ) {
							$db->beginTransaction();
							$query = $db->prepare("INSERT INTO `disc_music` VALUES(?,?)");
							$query->execute([$_POST["discId"], $isDuplicate['id']]);
							$db->commit();

							return [
								'str' => 'Music "'.$_POST["name"].'" was added to the DB!',
								'dicsId' => $_POST["discId"]
							];
						}

						$db->beginTransaction();

						$query = $db->prepare("INSERT INTO `music` VALUES(NULL,:name)");
						$query->execute(['name' => $_POST["name"]]);

						$musicId = $db->lastInsertId();
						$query = $db->prepare("INSERT INTO `disc_music` VALUES(?,?)");
						$query->execute([$_POST["discId"], $musicId]);


						$genres = preg_split('/[\n\r]+/', $_POST["genres"]);
						foreach($genres as $genre) {
							$query = $db->prepare("INSERT INTO `music_genres` VALUES(NULL,:genre)");
							$query->execute(['genre' => $genre]);

							$genreId = $db->lastInsertId();
							$query = $db->prepare("INSERT INTO `music_genre` VALUES(?,?)");
							$query->execute([$musicId, $genreId]);
						}


						for ($i = 0; $i < count($_POST["albums"]); $i++) {
							$query = $db->prepare("INSERT INTO `albums` VALUES(NULL,:album,:release)");
							$query->execute(['album' => $_POST["albums"][$i], 'release' => $_POST["releases"][$i]]);

							$albumId = $db->lastInsertId();
							$query = $db->prepare("INSERT INTO `music_album` VALUES(?,?)");
							$query->execute([$musicId, $albumId]);
						}

						$performers = preg_split('/[\n\r]+/', $_POST["performers"]);
						foreach($performers as $performer) {
							$query = $db->prepare("INSERT INTO `people` VALUES(NULL,:performer)");
							$query->execute(['performer' => $performer]);

							$performerId = $db->lastInsertId();
							$query = $db->prepare("INSERT INTO `music_performer` VALUES(?,?)");
							$query->execute([$musicId, $performerId]);
						}


						$db->commit();

						return [
							'str' => 'Music "'.$_POST["name"].'" was added to the DB!',
							'dicsId' => $_POST["discId"]
						];
					}
					catch(PDOException $e) {
						$db->rollBack();
						throw $e;
					}
				}
				catch(PDOException $e) {
					return [ 'str' => $e->getMessage() ];
				}

			} else {
				return [ 'str' => "Bad request :/" ];
			}	
		}

		public function save_movie() {
			if ( $_SERVER["REQUEST_METHOD"] == "POST" 
				&& isset($_POST["name"]) 		&& !empty($_POST["name"])
				&& isset($_POST["genres"]) 		&& !empty($_POST["genres"])
				&& isset($_POST["discId"]) 		&& !empty($_POST["discId"])
				&& isset($_POST["actors"])		&& !empty($_POST["actors"])
				&& isset($_POST["producers"])	&& !empty($_POST["producers"])
			) {
				try {
					$db = new PDO("mysql:host=localhost;dbname=mydiscs", 'root', '1234', array(PDO::ATTR_PERSISTENT => true));

					try {

						$isDuplicate = $this->isMovieDuplicate($db);
						if ( $isDuplicate ) {
							$db->beginTransaction();
							$query = $db->prepare("INSERT INTO `disc_movie` VALUES(?,?)");
							$query->execute([$_POST["discId"], $isDuplicate['id']]);
							$db->commit();

							return [
								'str' => 'Movie "'.$_POST["name"].'" was added to the DB!',
								'dicsId' => $_POST["discId"]
							];
						}

						$db->beginTransaction();  

						$query = $db->prepare("INSERT INTO `movies` VALUES(NULL,:name)");
						$query->execute(['name' => $_POST["name"]]);

						$movieId = $db->lastInsertId();
						$query = $db->prepare("INSERT INTO `disc_movie` VALUES(?,?)");
						$query->execute([$_POST["discId"], $movieId]);


						$genres = preg_split('/[\n\r]+/', $_POST["genres"]);
						foreach($genres as $genre) {
							$query = $db->prepare("INSERT INTO `movie_genres` VALUES(NULL,:genre)");
							$query->execute(['genre' => $genre]);

							$genreId = $db->lastInsertId();
							$query = $db->prepare("INSERT INTO `movie_genre` VALUES(?,?)");
							$query->execute([$movieId, $genreId]);
						}

						$actors = preg_split('/[\n\r]+/', $_POST["actors"]);
						foreach($actors as $actor) {
							$query = $db->prepare("INSERT INTO `people` VALUES(NULL,:actor)");
							$query->execute(['actor' => $actor]);

							$actorId = $db->lastInsertId();
							$query = $db->prepare("INSERT INTO `movie_actor` VALUES(?,?)");
							$query->execute([$movieId, $actorId]);
						}

						$producers = preg_split('/[\n\r]+/', $_POST["producers"]);
						foreach($producers as $producer) {
							$query = $db->prepare("INSERT INTO `people` VALUES(NULL,:producer)");
							$query->execute(['producer' => $producer]);

							$producerId = $db->lastInsertId();
							$query = $db->prepare("INSERT INTO `movie_producer` VALUES(?,?)");
							$query->execute([$movieId, $producerId]);
						}

						$db->commit();

						return [
							'str' => 'Movie "'.$_POST["name"].'" was added to the DB!',
							'dicsId' => $_POST["discId"]
						];
					}
					catch(PDOException $e) {
						$db->rollBack();
						throw $e;
					}

				}
				catch(PDOException $e) {
					return [ 'str' => $e->getMessage() ];
				}
			} else {
				return [ 'str' => "Bad request :/" ];
			}
		}
	}