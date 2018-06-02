<?php
	class Controller_add extends Controller {

		function __construct() {
			parent::__construct();
			$this->model = new Model_add();
		}

		public function action_index() {
			$this->action_add_disc();
		}

		public function action_add_disc() {
			$this->view->generate('add_disc_view.php');
		}

		public function action_save_disc() {
			$data = $this->model->save_disc();
			$this->view->generate('save_disc_view.php', $data);
		}

		public function action_add_music() {
			$routes	= explode('/', $_SERVER['REQUEST_URI']);
			$data	= $this->model->getDisc(isset($routes[3]) ? $routes[3] : 0);
			$this->view->generate('add_music_view.php', $data);
		}

		public function action_save_music() {
			$data = $this->model->save_music();
			$this->view->generate('save_music_view.php', $data);
		}

		public function action_add_movie() {
			$routes	= explode('/', $_SERVER['REQUEST_URI']);
			$data	= $this->model->getDisc(isset($routes[3]) ? $routes[3] : 0);
			$this->view->generate('add_movie_view.php', $data);
		}

		public function action_save_movie() {
			$data = $this->model->save_movie();
			$this->view->generate('save_movie_view.php', $data);
		}

	}