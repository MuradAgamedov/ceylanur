<?php namespace Ceylanur\Modules\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurModulesHomePageFirstSection extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_modules_home_page_first_section', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->text('text');
            $table->string('image_title');
            $table->text('image_short_description');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_modules_home_page_first_section');
    }
}
