<?php
	class View {
		
		function generate($content_view, $data = null, $template_view = "template_view.php") {
			include 'application/views/'.$template_view;
		}
	}