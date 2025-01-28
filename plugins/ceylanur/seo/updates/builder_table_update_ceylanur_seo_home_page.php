<?php namespace Ceylanur\Seo\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurSeoHomePage extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_seo_home_page', function($table)
        {
            $table->text('scripts')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_seo_home_page', function($table)
        {
            $table->dropColumn('scripts');
        });
    }
}
