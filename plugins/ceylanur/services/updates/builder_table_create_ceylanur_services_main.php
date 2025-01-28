<?php namespace Ceylanur\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurServicesMain extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_services_main', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_services_main');
    }
}
