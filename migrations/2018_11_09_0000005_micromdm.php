<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;
class micromdm extends Migration
{
    public function up()
    {
        $capsule = new Capsule();
        $capsule::schema()->create('micromdm', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number')->unique();
            $table->string('machine_udid');
            $table->string('latestresponse');
        });
    }
    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->dropIfExists('micromdm');
    }
}