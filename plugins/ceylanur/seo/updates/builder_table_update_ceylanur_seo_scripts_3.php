<?php namespace Ceylanur\Seo\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurSeoScripts3 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_seo_scripts', function($table)
        {
            $table->integer('status')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_seo_scripts', function($table)
        {
            $table->dropColumn('status');
        });
    }
}
