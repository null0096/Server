<?php
	class Controller_show extends Controller {

		function __construct() {
			parent::__construct();
			$this->model = new Model_show();
		}

		public function action_index() {
			$this->action_discs();
		}

		public function action_discs() {
			$data = $this->model->get_discs();
			$this->view->generate('show_discs_view.php', $data);
		}

		public function action_disc() {
			$routes	= explode('/', $_SERVER['REQUEST_URI']);
			$data = $this->model->get_disc(isset($routes[3]) ? $routes[3] : 0);
			$this->view->generate('show_disc_view.php', $data);
		}

	}