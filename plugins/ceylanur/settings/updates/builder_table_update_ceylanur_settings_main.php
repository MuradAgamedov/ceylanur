<?php namespace Ceylanur\Settings\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurSettingsMain extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_settings_main', function($table)
        {
            $table->string('email')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_settings_main', function($table)
        {
            $table->dropColumn('email');
        });
    }
}
