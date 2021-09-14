<?php
    class Assets {
        public static function get($asset) {
            $html = BASE . PUBLIC_PATH . $asset;
            return $html;
        }
    }
?>