<?php
	class Model_show extends Model {

		public function get_discs() {
			try {
				$db = new PDO("mysql:host=localhost;dbname=mydiscs", 'root', '1234', array(PDO::ATTR_PERSISTENT => true));
				return $db->query("SELECT * FROM discs");
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function get_disc($discId) {
			try {
				$db = new PDO("mysql:host=localhost;dbname=mydiscs", 'root', '1234', array(PDO::ATTR_PERSISTENT => true));
				// result[] -> movies[] -> movie[] -> name, actors[], performers[], genres[]
				$disc = $this->getDisc($discId);

				if ( !$disc ) return false;

				$result = [
					'movies' 	=> [],
					'music'		=> [],
					'dicsId' 	=> $discId,
					'discName'	=> $disc['name']
				];

				$movies 		= $this->getMovies($db, $discId);
				$fetchMovies 	= $movies->fetchAll();

				foreach($fetchMovies as $movie) {
					$result['movies'][] = [
						'name'		=> $movie['name'],
						'actors'	=> [],
						'genres'	=> [],
						'producers'	=> []
					];

					$actors 		= $this->getActors($db, $movie);
					$fetchActors 	= $actors->fetchAll();
					foreach($fetchActors as $actor) 
						$result['movies'][count($result['movies']) - 1]['actors'][] = $actor;

					$producers 		= $this->getProducers($db, $movie);
					$fetchProducers = $producers->fetchAll();
					foreach($fetchProducers as $producer) {
						$result['movies'][count($result['movies']) - 1]['producers'][] = $producer;
					}

					$genres 		= $this->getMovieGenres($db, $movie);
					$fetchGenres 	= $genres->fetchAll();
					foreach($fetchGenres as $genre) {
						$result['movies'][count($result['movies']) - 1]['genres'][] = $genre;
					}

				}

				$musics = $this->getMusics($db, $discId);
				$fetchMusic = $musics->fetchAll();

				foreach($fetchMusic as $music) {
					$result['music'][] = [
						'name'			=> $music['name'],
						'albums'		=> [],
						'performers'	=> [],
						'genres'		=> []
					];

					$albums = $this->getAlbums($db, $music);
					$fetchAlbums = $albums->fetchAll();
					foreach($fetchAlbums as $album) {
						$result['music'][count($result['music']) - 1]['albums'][] = $album;
					}

					$performers = $this->getPerformers($db, $music);
					$fetchPerformers = $performers->fetchAll();
					foreach($fetchPerformers as $performer) {
						$result['music'][count($result['music']) - 1]['performers'][] = $performer;
					}

					$genres = $this->getMusicGenres($db, $music);
					$fetchGenres = $genres->fetchAll();
					foreach($fetchGenres as $genre) {
						$result['music'][count($result['music']) - 1]['genres'][] = $genre;
					}
				}

				return $result;

			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

	}