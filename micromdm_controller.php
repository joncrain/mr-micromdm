<?php 

/**
 * Micromdm_controller class
 *
 * @package munkireport
 * @author 
 **/
class Micromdm_controller extends Module_controller
{

    /*** Protect methods with auth! ****/
    function __construct()
    {
        // Store module path
        $this->module_path = dirname(__FILE__);
    }
    
    /**
     * Default method
     *
     * @author avb
     **/
    function index()
    {
        echo "You've loaded the micromdm module!";
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

    /**
     * RestartDevice Command
     *
     * @return void
     * @author Jon Crain
     **/
    public function restart_computer_micromdm($serial = '')
    {
        {
            // Authenticate
            if (! $this->authorized()) {
                die('Authenticate first.'); // Todo: return json?
            }
            if (authorized_for_serial($serial)) {
                $micromdm = new micromdm_model($serial);
                $machine = new Machine_model($serial);
                $platform_UUID = $machine->platform_UUID;
                $command = 'RestartDevice';
                //$micromdm->get_micromdm_command($force=TRUE);
                $micromdm->run_micromdm_command($platform_UUID, $command);
            }
            redirect("clients/detail/$serial#tab_micromdm-tab");
        }
    }

} // END class Micromdm_controller
