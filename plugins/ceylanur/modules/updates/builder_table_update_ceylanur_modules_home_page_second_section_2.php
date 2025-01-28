<?php namespace Ceylanur\Modules\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurModulesHomePageSecondSection2 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_modules_home_page_second_section', function($table)
        {
            $table->string('image_title')->nullable();
            $table->string('image_short_description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_modules_home_page_second_section', function($table)
        {
            $table->dropColumn('image_title');
            $table->dropColumn('image_short_description');
        });
    }
}
