<?php

use munkireport\models\MRModel as Eloquent;

class Micromdm_model extends Eloquent
{
    protected $table = 'micromdm';

    protected $hidden = ['id', 'serial_number'];

    protected $fillable = [
      'serial_number',
      'mdm_enrollment_status',
      'dep_enrollment_status',
      'micromdm_version',

    ];
}
