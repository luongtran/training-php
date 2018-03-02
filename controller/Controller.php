<?php
class Controller {

	public function setView($viewName, $data) {
		include_once 'view/'.$viewName;
	}
}