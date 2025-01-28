<?php namespace Ceylanur\Modules\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurModulesHomePageFifthSection extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_modules_home_page_fifth_section', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_modules_home_page_fifth_section');
    }
}
