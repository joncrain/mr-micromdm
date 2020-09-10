<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class MicromdmInit extends Migration
{
    public function up()
    {
        $capsule = new Capsule();
        $capsule::schema()->create('micromdm', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number');
            $table->string('mdm_enrollment_status');
            $table->boolean('dep_enrollment_status')->nullable();
            $table->bigInteger('micromdm_version')->nullable();

            $table->unique('serial_number');
            $table->index('mdm_enrollment_status');
            $table->index('micromdm_version');

        });
    }
    
    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->dropIfExists('micromdm');
    }
}
