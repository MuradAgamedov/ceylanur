<?php namespace Ceylanur\Settings\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurSettingsMain2 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_settings_main', function($table)
        {
            $table->string('tiktok_link')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_settings_main', function($table)
        {
            $table->dropColumn('tiktok_link');
        });
    }
}
