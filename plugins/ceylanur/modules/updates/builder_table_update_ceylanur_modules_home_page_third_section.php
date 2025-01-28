<?php namespace Ceylanur\Modules\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurModulesHomePageThirdSection extends Migration
{
    public function up()
    {
        Schema::rename('ceylanur_modules_', 'ceylanur_modules_home_page_third_section');
    }
    
    public function down()
    {
        Schema::rename('ceylanur_modules_home_page_third_section', 'ceylanur_modules_');
    }
}
