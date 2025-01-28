<?php namespace Ceylanur\Copywrite\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurCopywrite extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_copywrite_', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_copywrite_');
    }
}
