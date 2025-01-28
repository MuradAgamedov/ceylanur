<?php namespace Ceylanur\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurServicesMain6 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_services_main', function($table)
        {
            $table->integer('reversed')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_services_main', function($table)
        {
            $table->dropColumn('reversed');
        });
    }
}
