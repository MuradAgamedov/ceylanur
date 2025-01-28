<?php namespace Ceylanur\Modules\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurModules extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_modules_', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('section_title')->nullable();
            $table->text('section_subtitle_text')->nullable();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_modules_');
    }
}
