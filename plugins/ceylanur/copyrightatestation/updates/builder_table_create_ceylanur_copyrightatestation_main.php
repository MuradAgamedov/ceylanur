<?php namespace Ceylanur\Copyrightatestation\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurCopyrightatestationMain extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_copyrightatestation_main', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('ip')->nullable();
            $table->string('time')->nullable();
            $table->string('platform_info')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_copyrightatestation_main');
    }
}
