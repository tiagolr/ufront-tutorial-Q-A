<?php

class sys_db_Object {
	public function __construct() {
		;
	}
	public $_locked;
	public $_manager;
	public function insert() {
		$this->_manager->doInsert($this);
	}
	public function update() {
		$this->_manager->doUpdate($this);
	}
	public function lock() {
		$this->_manager->doLock($this);
	}
	public function delete() {
		$this->_manager->doDelete($this);
	}
	public function toString() {
		return $this->_manager->objectToString($this);
	}
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->�dynamics[$m]) && is_callable($this->�dynamics[$m]))
			return call_user_func_array($this->�dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call �'.$m.'�');
	}
	function __toString() { return $this->toString(); }
}
