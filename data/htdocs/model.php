<?php 
	class Model {
		private $host;
		private $user;
		private $password;
		private $database;

		public function __construct() {
			$this->host 		= 'localhost';
			$this->user 		= 'root';
			$this->password 	= '1234';
			$this->database 	= 'mydiscs';
		}

		public function getAllDiscs() {
			$link 			= mysqli_connect($this->host, $this->user, $this->password, $this->database) or die('Error ' . mysqli_error($link));
			$query 			= "SELECT * FROM discs";
			$queryResult	= mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
			mysqli_close($link);

			if ( $queryResult ) {
				$rows = mysqli_num_rows($queryResult);

				echo "<table class=\"table\"><tr><th>disc_id</th><th>disc_name</th></tr>";
				for ( $i = 0; $i < $rows; $i++ ) {
					$row = mysqli_fetch_row($queryResult);

					echo  "<tr>";
					for ( $j = 0; $j < 2; $j++ )
						echo  "<td>$row[$j]</td>";
					echo  "</tr>";
				}
			}
			echo "</table>";
		}
	}
?>