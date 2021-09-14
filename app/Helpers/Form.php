<?php
	class Form {
		// Construct a form open
		public static function init ($action, $method, $ia = []) {
			$dia = self::da($ia);
			$html = '<form action="' . BASE . $action . '" method="' . $method . '"' . $dia . '>';

			return $html;
		}

		// Construct a form close
		public static function end () {
			$html = '</form>';

			return $html;
		}
		
		// Construct a HTML input field
		// dia: Defragmented input attributes
		// dia: Defragmented other attributes
		// da: Defragment attributes
		// ia: Input attributes
		// oa: Other attributes
		public static function input ($type, $name, $value = '', $ia = [], $oa = []) {
			$dia = self::da($ia);
			$doa = self::da($oa);

			$html = $doa;
			$html .= '<input type="' . $type . '" id="' . $name . '" name="' . $name . '" value=""' . $dia . '>';

			return $html;
		}
		
		// Construct a submit button
		public static function submit ($btnText, $name, $ia = []) {
			$dia = self::da($ia);
			$html = '<input type="submit" name="' . $name . '" value="' . $btnText . '"' . $dia . '>';

			return $html;
		}

		// attrs: Attributes
		// la: Listed attributes
		public static function da ($attrs) {
			$la = '';
		
			foreach ($attrs as $key => $value) {
				$la .= ' ' . $key . '="' . $value . '"';
			}

			return $la;
		}

		// Generate a random 32bit (64bit encoded) token
		public static function generate_token () {
			$token32 = openssl_random_pseudo_bytes(32);
			$token = base64_encode($token32);
			Session::set('csrf_token', $token);

			return $token;
		}

		// Check if token is the same as the one stored in the session value
		public static function check_token ($token) {
			return (Session::exists('csrf_token') && Session::get('csrf_token') == $token);
		}

		// Construct a hidden input for the token value
		public static function csrf_input () {
			return '<input type="hidden" name="csrf_token" id="csrf_token" value="' . self::generate_token() . '">';
		}
	}
?>