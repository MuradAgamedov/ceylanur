<?php namespace Ceylanur\About\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurAboutMain extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_about_main', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('first_title')->nullable();
            $table->text('first_text')->nullable();
            $table->string('second_title')->nullable();
            $table->text('second_desc')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_about_main');
    }
}
