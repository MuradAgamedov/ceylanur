<?php namespace Ceylanur\Modules\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurModulesHomePageSecondSection extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_modules_home_page_second_section', function($table)
        {
            $table->string('title')->nullable();
            $table->text('text')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_modules_home_page_second_section', function($table)
        {
            $table->dropColumn('title');
            $table->dropColumn('text');
        });
    }
}
