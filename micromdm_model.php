<?php
class Micromdm_model extends \Model {

    protected $restricted;

    function __construct($serial='')
    {
        parent::__construct('id', 'micromdm'); //primary key, tablename
        $this->rs['id'] = 0;
        $this->rs['serial_number'] = $serial;
        $this->rs['enrollment_status'] = '';
        $this->rs['latestresponse'] = '';
        $this->rs['device_lock_pin'] = '';
        $this->rs['erase_device_pin'] = '';

        // Array with fields that can't be set by process
        $this->restricted = array('id', 'serial_number');

        if ($serial){
            $this->retrieveOne('serial_number=?', $serial);
        }

        $this->serial = $serial;
    }

    // ------------------------------------------------------------------------

    /**
    * Process data sent by postflight
    *
    * @param string data
    *
    **/
    function process($data)
    {

        // This array will hold fields that can be populated
        $fillable = array();

        //clear any previous data we had
        foreach($this->rs as $field => $value) {
            if( ! in_array($field, $this->restricted)){
                $fillable[] = $field;
                $this->$field = '';
            }
        }
        // Parse data
        $sep = ' = ';
        foreach(explode("\n", $data) as $line) {
            echo $line;
            list($key, $val) = explode($sep, $line);

            if( in_array($key, $fillable)){
                $this->$key = $val;
            }

        } //end foreach explode lines

        $this->save();
    }
    
    /**
     * Run Command via MicroMDM
     *
     * @return void
     * @author Jon Crain
     **/
    //function get_micromdm_command($force = FALSE)
    public function run_micromdm_command($platform_UUID, $request_type)
    {
        $ch = curl_init();
        $micromdmapi_url = conf('micromdmapi_url') . '/v1/commands';
        $micromdmapi_key = conf('micromdmapi_key');
        $micromdmapi_username = conf('micromdmapi_username');
        $json_data = "{\"udid\":\"$platform_UUID\",\"request_type\":\"$request_type\"}";
        # need to add in optional json data here in the future
        curl_setopt($ch, CURLOPT_URL, "$micromdmapi_url");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERPWD, "$micromdmapi_username:$micromdmapi_key");

        $headers = array();
        $headers[] = "Content-Type: application/json";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);
    }
}