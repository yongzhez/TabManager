<?php

require 'smarty3/Smarty.class.php';

/**
* Class SmartyWrapper
*/

class SmartyWrapper extends Smarty{

	function __construct() {
		parent::__construct();
		$this->smartySettings();
	}
	function smartySettings() {
		$this->force_compile = false;
		$this->caching = false; #TODO: Set true for production
		$this->merge_compiled_includes = true;
		$this->compile_check = true; #TODO: Set false for production
	}
		
	/**
	 * @param string $file
	 */
	public function display_temp($file, $cache_id = null, $compile_id = null) {
		if (!isset($compile_id)){
            $this->compile_id = "en";
            parent::display($file, $cache_id, $this->compile_id, NULL);
        }else{
            $this->compile_id = $compile_id;
            parent::display($file, $cache_id, $this->compile_id, NULL);
        }
	}

	/**
	*@param string $name
	*@param mixed $var
	*@param bool $nochache
	*/
	public function assign_var($name, $var = NULL, $nocache = true){
		parent::assign($name, $var, $nocache);

	}
}
