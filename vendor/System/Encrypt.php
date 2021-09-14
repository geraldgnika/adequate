<?php
class Encrypt {
	/**
	 * @param string $algorithm: The algorithm used for encrypting
	 * @param string $plain: The text to be encoded
	 * @param string $salt: The salt string
	 * @return string
	 */
	public static function encryptData($algorithm = 'sha256', $plain, $salt) {
		$hash_context = hash_init($algorithm, HASH_HMAC, $salt);
		hash_update($hash_context, $plain);

		return hash_final($hash_context);
	}
}
?>