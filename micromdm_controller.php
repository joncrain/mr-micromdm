<?php 

/**
 * Micromdm_controller class
 *
 * @package munkireport
 * @author Jon Crain
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
                $request_type = 'RestartDevice';
                //$micromdm->get_micromdm_command($force=TRUE);
                $micromdm->run_micromdm_command($platform_UUID, $request_type);
            }
            redirect("clients/detail/$serial#tab_micromdm-tab");
        }
    }

    /**
     * SecurityInfo Command
     *
     * @return void
     * @author Jon Crain
     **/
    public function security_info_micromdm($serial = '')
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
                $request_type = 'SecurityInfo';
                //$micromdm->get_micromdm_command($force=TRUE);
                $micromdm->run_micromdm_command($platform_UUID, $request_type);
            }
            redirect("clients/detail/$serial#tab_micromdm-tab");
        }
    }

    /**
     * AvailableOSUpdates Command
     *
     * @return void
     * @author Jon Crain
     **/
    public function available_os_updates_micromdm($serial = '')
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
                $request_type = 'AvailableOSUpdates';
                //$micromdm->get_micromdm_command($force=TRUE);
                $micromdm->run_micromdm_command($platform_UUID, $request_type);
            }
            redirect("clients/detail/$serial#tab_micromdm-tab");
        }
    }

    /**
     * CertificateList Command
     *
     * @return void
     * @author Jon Crain
     **/
    public function certificate_list_micromdm($serial = '')
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
                $request_type = 'CertificateList';
                //$micromdm->get_micromdm_command($force=TRUE);
                $micromdm->run_micromdm_command($platform_UUID, $request_type);
            }
            redirect("clients/detail/$serial#tab_micromdm-tab");
        }
    }

    /**
     * InstalledApplicationList Command
     *
     * @return void
     * @author Jon Crain
     **/
    public function installed_application_list_micromdm($serial = '')
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
                $request_type = 'InstalledApplicationList';
                //$micromdm->get_micromdm_command($force=TRUE);
                $micromdm->run_micromdm_command($platform_UUID, $request_type);
            }
            redirect("clients/detail/$serial#tab_micromdm-tab");
        }
    }

    /**
     * OSUpdateStatus Command
     *
     * @return void
     * @author Jon Crain
     **/
    public function os_update_status_micromdm($serial = '')
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
                $request_type = 'OSUpdateStatus';
                //$micromdm->get_micromdm_command($force=TRUE);
                $micromdm->run_micromdm_command($platform_UUID, $request_type);
            }
            redirect("clients/detail/$serial#tab_micromdm-tab");
        }
    }

    /**
     * ProfileList Command
     *
     * @return void
     * @author Jon Crain
     **/
    public function profile_list_micromdm($serial = '')
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
                $request_type = 'ProfileList';
                //$micromdm->get_micromdm_command($force=TRUE);
                $micromdm->run_micromdm_command($platform_UUID, $request_type);
            }
            redirect("clients/detail/$serial#tab_micromdm-tab");
        }
    }

    /**
     * ProvisioningProfileList Command
     *
     * @return void
     * @author Jon Crain
     **/
    public function provisioning_profile_list_micromdm($serial = '')
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
                $request_type = 'ProvisioningProfileList';
                //$micromdm->get_micromdm_command($force=TRUE);
                $micromdm->run_micromdm_command($platform_UUID, $request_type);
            }
            redirect("clients/detail/$serial#tab_micromdm-tab");
        }
    }

    /**
     * ShutDownDevice Command
     *
     * @return void
     * @author Jon Crain
     **/
    public function shutdown_device_micromdm($serial = '')
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
                $request_type = 'ShutDownDevice';
                //$micromdm->get_micromdm_command($force=TRUE);
                $micromdm->run_micromdm_command($platform_UUID, $request_type);
            }
            redirect("clients/detail/$serial#tab_micromdm-tab");
        }
    }



} // END class Micromdm_controller
