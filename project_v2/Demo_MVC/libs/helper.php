<?php
if (!function_exists('base_url')) {
	function base_url($url = null) {
		$http = isSecure() ? 'https' : 'http';
		return $http . '://' . $_SERVER['HTTP_HOST'] .'/Demo_MVC';
	}
}

function isSecure() {
  return
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || $_SERVER['SERVER_PORT'] == 443;
}