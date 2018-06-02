<?php
	class Model {
		public function getDisc($discId) {
			try {
				$db = new PDO("mysql:host=localhost;dbname=mydiscs", 'root', '1234', array(PDO::ATTR_PERSISTENT => true));
				$disc = $db->query("
					SELECT * 
					FROM discs 
					WHERE id = " . $db->quote($discId)
				);
				$fetchDisc = $disc->fetchAll();
				foreach($fetchDisc as $disc) {
					return $disc;
				}
				return false;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function getMusics($db, $discId) {
			return $db->query("
				SELECT id, name 
				FROM `disc_music` a 
				INNER JOIN `music` b 
				ON a.music_id = b.id and a.disc_id = " . $db->quote($discId)
			);
		}

		public function getAlbums($db, $music) {
			return $db->query("
				SELECT id, name, release_date 
				FROM `music_album` a 
				INNER JOIN `albums` b 
				ON a.album_id = b.id and a.music_id = " . $db->quote($music['id'])
			);
		}

		public function getPerformers($db, $music) {
			return $db->query("
				SELECT id, name 
				FROM `music_performer` a 
				INNER JOIN `people` b 
				ON a.performer_id = b.id and a.music_id = " . $db->quote($music['id'])
			);
		}

		public function getMusicGenres($db, $music) {
			return $db->query("
				SELECT id, name 
				FROM `music_genre` a 
				INNER JOIN `music_genres` b 
				ON a.genre_id = b.id and a.music_id = " . $db->quote($music['id'])
			);
		}

		public function getMovies($db, $discId) {
			return $db->query("
				SELECT id, name 
				FROM `disc_movie` a 
				INNER JOIN `movies` b 
				ON a.movie_id = b.id and a.disc_id = " . $db->quote($discId)
			);
		}

		public function getActors($db, $movie) {
			return $db->query("
				SELECT id, name 
				FROM `movie_actor` a 
				INNER JOIN `people` b 
				ON a.actor_id = b.id and a.movie_id = " . $db->quote($movie['id'])
			);
		}

		public function getProducers($db, $movie) {
			return $db->query("
				SELECT id, name 
				FROM `movie_producer` a 
				INNER JOIN `people` b 
				ON a.producer_id = b.id and a.movie_id = " . $db->quote($movie['id'])
			);
		}

		public function getMovieGenres($db, $movie) {
			return $db->query("
				SELECT id, name 
				FROM `movie_genre` a 
				INNER JOIN `movie_genres` b 
				ON a.genre_id = b.id and a.movie_id = " . $db->quote($movie['id'])
			);
		}

		public function isMovieDuplicate($db) {
			$movies = $db->query("SELECT * FROM `movies` WHERE name = " . $db->quote($_POST["name"]));
			if ( !$movies->rowCount() ) return false;
			foreach($movies->fetchAll() as $m) {
				$movie = $m;
				break;
			}

			$producers 		= $this->getProducers($db, $movie);
			$producersToAdd = preg_split('/[\n\r]+/', $_POST["producers"]);
			if ( $producers->rowCount() != count($producersToAdd) ) return false;
			$fetchProducers	= $producers->fetchAll();
			foreach($fetchProducers as $producer) {
				if ( array_search($producer['name'], $producersToAdd) === false) return false;
			}

			return $movie;
		}

		public function isMusicDuplicate($db) {
			$musics = $db->query("SELECT * FROM `music` WHERE name = " . $db->quote($_POST["name"]));
			if ( !$musics->rowCount() ) return false;
			foreach($musics->fetchAll() as $m) {
				$music = $m;
				break;
			}

			$performers 		= $this->getPerformers($db, $music);
			$performersToAdd 	= preg_split('/[\n\r]+/', $_POST["performers"]);
			if ( $performers->rowCount() != count($performersToAdd) ) return false;
			$fetchPerformers	= $performers->fetchAll();
			foreach($fetchPerformers as $performer) {
				if ( array_search($performer['name'], $performersToAdd) === false) return false;
			}

			return $music;
		}

	}