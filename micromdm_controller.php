<?php 

/**
 * micromdm class
 *
 * @package munkireport
 * @author 
 **/
class micromdm_controller extends Module_controller
{
	
	/*** Protect methods with auth! ****/
	function __construct()
	{
		// Store module path
		$this->module_path = dirname(__FILE__);
	}
	
  /**
 * Get micromdm information for serial_number
 *
 * @param string $serial serial number
 **/
public function get_data($serial_number = '')
{
      $obj = new View();
      if( ! $this->authorized())
      {
          $obj->view('json', array('msg' => 'Not authorized'));
          return;
      }

      $micromdm = new micromdm_model($serial_number);
      $obj->view('json', array('msg' => $micromdm->rs));
}

} // END class default_module
