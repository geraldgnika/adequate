<?php
	class Helpers {
		// Display array data into formatted form
		public static function dump_data ($data) {
			echo '<pre>';
				var_dump($data);
			echo '</pre>';
			die();
		}

		public static function url_encode_error ($controller_name, $error, $id = null, $controller_method = 'index') {
			$controller_name = strtolower(strstr($controller_name, 'Controller', true));
			$error = rawurlencode($error);

			?>
			<script>location="<?php echo BASE . $controller_name .'/' . $controller_method . '/' . $id; ?>?error=<?php echo $error; ?>"</script>
			<?php
			die();
		}
	}
?>