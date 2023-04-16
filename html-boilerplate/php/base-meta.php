<?php 

class baseMeta {
	protected $_description;

	public function __construct($description) {
		$this-> _description = $description;
	}

	public function renderDescription() {
		return "<meta name='description' content='{$this->_description}'>";
	}
}



