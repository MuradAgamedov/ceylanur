<?php namespace Ceylanur\Modules\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurModulesHomePageSecondSection extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_modules_home_page_second_section', function($table)
        {
            $table->increments('id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_modules_home_page_second_section');
    }
}
